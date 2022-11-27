<?php

namespace App\Services;

use App\Helpers\Format;
use App\Models\DetailKelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KelasDetail;
use App\Models\siswa;
use App\Models\Spp;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class SppService
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function getKelas()
    {
        $kelas = Kelas::with('guru', 'detailKelas', 'detailKelas.siswa')->get();

        $status = true;
        $message = 'Data berhasil diambil';
        $data = $kelas;

        $result = [
            'status' => $status,
            'message' => $message,
            'kelas' => $kelas,
        ];

        return $result;
    }

    public function getSpp($data)
    {
        $spp = Spp::with('siswa', 'guru', 'user')->where('kelas_id', $data)->get();
        $siswa = siswa::get();
        $guru = Guru::get();

        $status = true;
        $message = 'Data spp berhasil diambil';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $spp,
            'siswa' => $siswa,
            'guru' => $guru,
            'title' => 'Data spp',
        ];

        return $result;
    }

    public function detailKelas($data)
    {
        $siswa = Siswa::with('kelasDetail')->whereRelation('kelasDetail', 'kelas_id', $data)->where('status_siswa', 'Aktif')->get();

        $status = true;
        $message = 'Data siswa berhasil diambil';

        $result = [
            'status' => $status,
            'message' => $message,
            'siswa' => $siswa,
        ];

        return $result;
    }

    public function detailSiswa($kelas_id, $siswa_id)
    {
        $spp = Spp::with('siswa', 'guru', 'user')->where('kelas_id', $kelas_id)->where('siswa_id', $siswa_id)->get();

        // dd($spp);
        $siswa = siswa::get();
        $guru = Guru::get();

        $status = true;
        $message = 'Data spp berhasil diambil';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $spp,
            'siswa' => $siswa,
            'guru' => $guru,
        ];

        return $result;
    }

    public function generate($kelas_id)
    {
        // dd($kelas_id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        // $month = 3;
        $siswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('status_siswa', 'Aktif')->get();
        // dd($siswa);
        DB::beginTransaction();
        try {

            $spp = Spp::where('siswa_id', $siswa[0]->id)->where('kelas_id', $kelas_id)->whereMonth('tanggal', $month)->whereYear('tanggal', $year)->get();
            $count = Spp::where('siswa_id', $siswa[0]->id)->where('kelas_id', $kelas_id)->orderBy('created_at', 'DESC')->first();

            // dd($count);

            // dd($count == null ? 1 : $count->semester + 1);
            // $count == null ? dd("satu") : dd($count->semester + 1);

            // dd($count);
            if ($count != NULL && $count->semester >= 8) {
                siswa::where('id', $siswa[0]->id)->update([
                    'status_siswa' => 'Alumni',
                ]);
                DB::commit();
                $status = true;
                $message = 'Status siswa telah diubah menjadi Alumni';

                $result = [
                    'status' => $status,
                    'message' => $message,
                ];
                return $result;
            }

            if ($spp->isEmpty()) {


                if ($month >= 2 && $month <= 7) {
                    for ($i = 1; $i <= 7; $i++) {
                        # code...
                        $date = Carbon::now()->month($i)->day(1);
                        foreach ($siswa as $key => $value) {
                            // 
                            Spp::create([
                                'kelas_id'          => $kelas_id,
                                'siswa_id'          => $value->id,
                                'tanggal'           => $date,
                                'semester'          => $count == null ? 1 : ($count->semester + 1),
                                'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                            ]);
                        }
                    }

                    DB::commit();

                    $status = true;
                    $message = 'Data spp berhasil ditambahkan';

                    $result = [
                        'status' => $status,
                        'message' => $message,
                    ];
                    return $result;
                } else {
                    for ($i = 7; $i <= 12; $i++) {
                        # code...
                        $date = Carbon::now()->month($i)->day(1);
                        foreach ($siswa as $key => $value) {
                            // 
                            Spp::create([
                                'kelas_id'          => $kelas_id,
                                'siswa_id'          => $value->id,
                                'tanggal'           => $date,
                                'semester'          => $count == null ? 1 : ($count->semester + 1),
                                'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                            ]);
                        }
                        // if ($i <= 12) {
                        //     # code...
                        // } else {
                        //     $date = Carbon::now()->month(1)->day(1)->addYear(1);
                        //     // dd($date);
                        //     foreach ($siswa as $key => $value) {
                        //         // 
                        //         Spp::create([
                        //             'kelas_id'          => $kelas_id,
                        //             'siswa_id'          => $value->id,
                        //             'tanggal'           => $date,
                        //             'semester'          => $count == null ? 1 : ($count->semester + 1),
                        //             'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                        //         ]);
                        //     }
                        // }
                    }
                }


                DB::commit();

                $status = true;
                $message = 'Data spp berhasil ditambahkan';

                $result = [
                    'status' => $status,
                    'message' => $message,
                ];
                return $result;
            } else {
                $status = false;
                $message = 'Data spp sudah ada';

                $result = [
                    'status' => $status,
                    'message' => $message,
                ];
                return $result;
            }


            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            $status = false;
            $message = 'Data spp gagal ditambahkan';

            dd($th);
            return [
                'status' => $status,
                'message' => $message,
            ];
        }
    }

    public function store($data)
    {
        // dd($data);

        DB::beginTransaction();

        try {
            $siswa = DetailKelas::with('siswa', 'kelas')->where('siswa_id', $data['siswa_id'])->first();
            // dd($siswa);

            $dataSpp = Spp::where('siswa_id', $data['siswa_id'])
                ->whereIn('status_pembayaran', ['Lunas', 'Belum Bayar'])
                ->whereMonth('tanggal', Carbon::now()->month)
                ->first();

            if ($dataSpp != null) {
                $result = [
                    'status' => false,
                    'message' => 'Siswa ini sudah memiliki spp bulan ini',
                ];

                return $result;
            }

            $nominal_sisa = $siswa->kelas->nominal - $data['nominal_dibayar'];


            // dd($data);
            Spp::create([
                'siswa_id'          => $data['siswa_id'],
                'guru_id'           => Auth::user()->id,
                'guru_piket_id'     => $data['guru_piket_id'],
                'guru_penerima_id'  => $data['guru_penerima_id'],
                'bendahara_id'      => Auth::user()->id, // Bendahara ID
                'tanggal'           => Carbon::now(),
                'nominal_bayar'     => $data['nominal_spp'],
                'sisa_bayar'        => $nominal_sisa,
                'nominal_bayar'     => $data['nominal_dibayar'],
                'keterangan'        => $data['keterangan'],
                'status_pembayaran' => $nominal_sisa == 0 ? 'Lunas' : 'Belum Bayar',
            ]);

            $this->smsService->sendSms(
                'Kepada b4p4k/1bu siswa ' . $siswa->siswa->nama_siswa . ', p3mbyr44n SPP pada bulan Aug telah kami terima pada t4ngg4l ' . Carbon::now()->format('d') . '' . Format::formatBulan(Carbon::now()->format('m')) . '' . Carbon::now()->format('Y') . ', Terima kasih',
                $siswa->siswa->telpon_ortu_siswa
            );

            DB::commit();

            $result = [
                'status' => true,
                'message' => 'Data spp berhasil ditambahkan',
            ];

            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            //            dd($th);
            $result = [
                'status' => false,
                'message' => 'Data spp gagal ditambahkan',
            ];

            return $result;
        }
    }

    public function apiSpp($spp_id)
    {
        $spp = Spp::with('siswa', 'guru', 'kelas')->where('id', $spp_id)->first();

        // dd($spp);
        if ($spp != null) {
            $status = true;
            $message = 'Data spp ditemukan';
            # code...
            return [
                'status' => $status,
                'message' => $message,
                'data' => $spp,
            ];
        } else {
            $status = false;
            $message = 'Data spp tidak ditemukan';
            # code...
            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }
    }

    public function addSpp($data)
    {
        // dd($data);
        $validator = Validator::make($data, [
            'spp_id' => 'required',
            'guru_penerima_id' => 'required',
            'guru_piket_id' => 'required',
            'siswa_id' => 'required',
            'nominal_spp' => 'required',
            'nominal_dibayar' => 'required',
            'nominal_sisa' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        DB::beginTransaction();

        try {
            //code...
            Spp::where('id', $data['spp_id'])->update([
                'siswa_id' => $data['siswa_id'],
                'guru_penerima_id' => $data['guru_penerima_id'],
                'bendahara_id' => Auth::user()->id,
                'guru_piket_id' => $data['guru_piket_id'],
                'total_pembayaran' => $data['nominal_dibayar'],
                'sisa_bayar' => $data['nominal_sisa'],
                'keterangan' => $data['keterangan'],
                'tanggal_pembayaran' => Date('Y-m-d'),
                'status_pembayaran' => $data['nominal_sisa'] == 0 ? 'Lunas' : 'Cicilan',
            ]);

            $siswa = siswa::where('id', $data['siswa_id'])->first();

            $this->smsService->sendSms(
                'Kepada b4p4k/1bu siswa ' . $siswa->nama_siswa . ', p3mbyr44n SPP pada bulan Aug telah kami terima pada t4ngg4l ' . Carbon::now()->format('d') . '' . Format::formatBulan(Carbon::now()->format('m')) . '' . Carbon::now()->format('Y') . ', Terima kasih',
                $siswa->telpon_ortu_siswa
            );

            DB::commit();

            return [
                'status' => true,
                'message' => 'Data spp berhasil ditambahkan',
            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    static function updateSpp($data)
    {
        $validator = Validator::make($data, [
            'spp_id' => 'required|exists:spps,id',
            'guru_penerima_id' => 'required',
            'guru_piket_id' => 'required',
            'siswa_id' => 'required|exists:siswas,id',
            'nominal_sisa' => 'required',
            // 'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        $findSpp = Spp::firstWhere('id', $data['spp_id']);

        // dd($findSpp);
        $findSpp->update([
            'sisa_bayar' => 0,
            'status_pembayaran' => 'Lunas',
        ]);

        return [
            'status' => true,
            'message' => 'Berhasil Melakukan Pelunasan',
        ];
    }

    static function dataSiswa($data)
    {
        // dd($data);


        $siswa = Siswa::whereDate('tanggal_lahir', $data['tanggal_lahir'])->where('nisn', $data['nisn'])->first();
        // dd($siswa);
        if ($siswa == null) {
            # code...
            // dd("false");
            $status = false;
            $message = 'Data siswa tidak ditemukan';
            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }

        $spp = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $siswa->id)->get();

        if ($spp == null) {
            # code...
            $status = false;
            $message = 'Data spp tidak ditemukan';
            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }

        // dd($spp);
        $status = true;
        $message = 'Data siswa dan Spp ditemukan';

        return [
            'status' => $status,
            'message' => $message,
            'spp' => $spp,
            'siswa' => $siswa,
        ];
    }

    static function detailKelasLunas($kelas_id)
    {
        // dd($kelas_id);
        // $spp = Spp::with('siswa', 'guru', 'kelas')->where('kelas_id', decrypt($kelas_id))->where('status_pembayaran', 'Lunas')->get()->groupBy('siswa_id');

        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $spp = [];
        foreach ($kelas as $k) {
            $data = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $k->siswa_id)->where('kelas_id', $k->kelas_id)->where('status_pembayaran', 'Lunas')->get();

            // dd(count($data));
            if (count($data) >= 6) {
                $spp[] = $data;
            }
        }

        // dd($spp);
        if ($kelas->isEmpty()) {
            # code...
            $status = false;
            $message = 'Data spp tidak ditemukan';
            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }

        // dd($spp);
        $status = true;
        $message = 'Data spp ditemukan';

        return [
            'status' => $status,
            'message' => $message,
            'data' => $spp,
        ];
    }

    static function detailKelasBelumLunas($kelas_id)
    {
        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $spp = [];
        foreach ($kelas as $k) {
            $data = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $k->siswa_id)->where('kelas_id', $k->kelas_id)->where('status_pembayaran', 'Belum Lunas')->get();

            // dd(count($data));
            if (count($data) <= 6) {
                $spp[] = $data;
            }
        }

        // dd($spp);
        if ($kelas->isEmpty()) {
            # code...
            $status = false;
            $message = 'Data spp tidak ditemukan';
            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }

        // dd($spp);
        $status = true;
        $message = 'Data spp ditemukan';

        return [
            'status' => $status,
            'message' => $message,
            'data' => $spp,
        ];
    }
}
