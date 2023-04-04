<?php

namespace App\Services;

use App\Helpers\Format;
use App\Models\DetailKelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KelasDetail;
use App\Models\Setting as ModelsSetting;
use App\Models\siswa;
use App\Models\Spp;
use App\Models\tahun_ajaran;
use Carbon\Carbon;
use CodexShaper\PWA\Model\Setting;
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
        $kelas = Kelas::with('guru', 'detailKelas', 'detailKelas.siswa')->whereRelation('guru', 'deleted_at', null)->get();

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
        $siswa = Siswa::with('kelasDetail')->whereRelation('kelasDetail', 'kelas_id', $data)->where('status_siswa', 'Aktif')->orderBy('nama_siswa', 'ASC')->get();

        $tahun_ajaran = tahun_ajaran::orderByDESC('tahun_ajaran')->get();
        // dd($tahun_ajaran);
        // dd($siswa);
        $status = true;
        $message = 'Data siswa berhasil diambil';

        $result = [
            'status' => $status,
            'message' => $message,
            'siswa' => $siswa,
            'tahun' => $tahun_ajaran,
        ];

        return $result;
    }

    public function detailSiswa($kelas_id, $siswa_id)
    {

        $setting = ModelsSetting::first();

        // dd($setting);

        $spp = Spp::with('siswa', 'guru', 'user')->where('kelas_id', $kelas_id)->where('siswa_id', $siswa_id)->where('semester_id', $setting->tahun_ajaran_id)->get();

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
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');


        // $month = '07';
        // $year = '2023';
        $siswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('status_siswa', 'Aktif')->get();

        DB::beginTransaction();
        try {


            // dd($siswa[0]->id);
            foreach ($siswa as $sis => $student) {

                $spp = Spp::where('siswa_id', $student->id)->where('kelas_id', $kelas_id)->whereMonth('tanggal', $month)->whereYear('tanggal', $year)->first();

                // dd($spp);
                $count = Spp::where('siswa_id', $siswa[0]->id)->where('kelas_id', $kelas_id)->orderBy('created_at', 'DESC')->first();

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

                // dd($spp);
                if ($spp == NULL) {
                    // dd("genap");
                    if ($month >= 1 && $month < 7) {
                        for ($i = 1; $i < 7; $i++) {
                            # code...
                            $detailSiswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('id', $student->id)->where('status_siswa', 'Aktif')->get();

                            $date = Carbon::now()->month($i)->day(1);
                            foreach ($detailSiswa as $key => $value) {
                                // 


                                if ($value->status == 'Potongan') {
                                    Spp::create([
                                        'kelas_id'          => $kelas_id,
                                        'siswa_id'          => $value->id,
                                        'tanggal'           => $date,
                                        'semester'          => $count == null ? 2 : ($count->semester + 1),
                                        'nominal_bayar'     => ($value->kelasDetail->kelas->nominal / 100) * 50,
                                    ]);
                                } else {

                                    if ($value->status == 'Gratis') {
                                        Spp::create([
                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 2 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                            'total_pembayaran'  => $value->kelasDetail->kelas->nominal,
                                            'sisa_bayar'        => 0,
                                            'status_pembayaran' => 'Lunas'
                                        ]);
                                        # code...
                                    } else {

                                        Spp::create([
                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 2 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                        ]);
                                    }
                                }
                            }
                        }
                    } else {
                        // dd('ganjil');
                        for ($i = 7; $i <= 12; $i++) {
                            # code...
                            $detailSiswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('id', $student->id)->where('status_siswa', 'Aktif')->get();


                            $date = Carbon::now()->month($i)->day(1);
                            foreach ($detailSiswa as $key => $value) {
                                // 

                                if ($value->status == 'Potongan') {

                                    Spp::create([
                                        'kelas_id'          => $kelas_id,
                                        'siswa_id'          => $value->id,
                                        'tanggal'           => $date,
                                        'semester'          => $count == null ? 1 : ($count->semester + 1),
                                        'nominal_bayar'     => ($value->kelasDetail->kelas->nominal / 100) * 50,
                                    ]);
                                } else {

                                    if ($value->status == 'Gratis') {
                                        Spp::create([
                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 1 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                            'total_pembayaran'  => $value->kelasDetail->kelas->nominal,
                                            'sisa_bayar'        => 0,
                                            'status_pembayaran' => 'Lunas'
                                        ]);
                                    } else {
                                        Spp::create([
                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 1 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                        ]);
                                    }
                                }
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


                    // DB::commit();

                    // $status = truep;
                    // $message = 'Data spp berhasil ditambahkan';

                    // $result = [
                    //     'status' => $status,
                    //     'message' => $message,
                    // ];
                    // return $result;
                }
            }

            DB::commit();

            $status = true;
            $message = 'Data spp siswa berhasil diupdate';

            $result = [
                'status' => $status,
                'message' => $message,
            ];
            return $result;



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


    public function generateN($data, $kelas_id)
    {
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');


        // dd($data);
        // $month = '07';
        // $year = '2023';
        $siswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('status_siswa', 'Aktif')->get();

        // dd($siswa);
        DB::beginTransaction();
        try {


            // dd($siswa[0]->id);
            foreach ($siswa as $sis => $student) {

                $spp = Spp::where('siswa_id', $student->id)->where('kelas_id', $kelas_id)->where('semester_id', $data['semester_id'])->first();

                // dd($spp);
                $count = Spp::where('siswa_id', $siswa[0]->id)->where('kelas_id', $kelas_id)->orderBy('created_at', 'DESC')->first();

                // dd($count);

                // if ($count != NULL && $count->semester >= 8) {
                //     siswa::where('id', $siswa[0]->id)->update([
                //         'status_siswa' => 'Alumni',
                //     ]);
                //     DB::commit();
                //     $status = true;
                //     $message = 'Status siswa telah diubah menjadi Alumni';

                //     $result = [
                //         'status' => $status,
                //         'message' => $message,
                //     ];
                //     return $result;
                // }

                // dd($spp);
                if ($spp == NULL) {
                    // dd("genap");

                    $semester = tahun_ajaran::where('id', $data['semester_id'])->first();
                    // dd($semester);
                    $explode = explode('/', $semester->tahun_ajaran);

                    // dd($explode);
                    if ($semester->semester == 'Genap') {
                        for ($i = 1; $i < 7; $i++) {
                            # code...
                            $detailSiswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('id', $student->id)->where('status_siswa', 'Aktif')->get();

                            $date = Carbon::now()->year($explode[1])->month($i)->day(1);

                            // dd($date);
                            foreach ($detailSiswa as $key => $value) {
                                // 
                                if ($value->status == 'Potongan') {
                                    Spp::create([
                                        'semester_id'       => $data['semester_id'],

                                        'kelas_id'          => $kelas_id,
                                        'siswa_id'          => $value->id,
                                        'tanggal'           => $date,
                                        'semester'          => $count == null ? 2 : ($count->semester + 1),
                                        'nominal_bayar'     => ($value->kelasDetail->kelas->nominal / 100) * 50,
                                    ]);
                                } else {

                                    if ($value->status == 'Gratis') {
                                        Spp::create([
                                            'semester_id'       => $data['semester_id'],

                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 2 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                            'total_pembayaran'  => $value->kelasDetail->kelas->nominal,
                                            'sisa_bayar'        => 0,
                                            'status_pembayaran' => 'Lunas'
                                        ]);
                                        # code...
                                    } else {

                                        Spp::create([
                                            'semester_id'       => $data['semester_id'],

                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 2 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                        ]);
                                    }
                                }
                            }
                        }
                    } else {
                        // dd('ganjil');
                        for ($i = 7; $i <= 12; $i++) {
                            # code...
                            $detailSiswa = Siswa::with('kelasDetail', 'kelasDetail.kelas')->whereRelation('kelasDetail', 'kelas_id', $kelas_id)->where('id', $student->id)->where('status_siswa', 'Aktif')->get();


                            // $date = Carbon::now()->month($i)->day(1);
                            $date = Carbon::now()->year($explode[0])->month($i)->day(1);

                            foreach ($detailSiswa as $key => $value) {
                                // 

                                if ($value->status == 'Potongan') {

                                    Spp::create([
                                        'semester_id'       => $data['semester_id'],
                                        'kelas_id'          => $kelas_id,
                                        'siswa_id'          => $value->id,
                                        'tanggal'           => $date,
                                        'semester'          => $count == null ? 1 : ($count->semester + 1),
                                        'nominal_bayar'     => ($value->kelasDetail->kelas->nominal / 100) * 50,
                                    ]);
                                } else {

                                    if ($value->status == 'Gratis') {
                                        Spp::create([
                                            'semester_id'       => $data['semester_id'],

                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 1 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                            'total_pembayaran'  => $value->kelasDetail->kelas->nominal,
                                            'sisa_bayar'        => 0,
                                            'status_pembayaran' => 'Lunas'
                                        ]);
                                    } else {
                                        Spp::create([
                                            'semester_id'       => $data['semester_id'],

                                            'kelas_id'          => $kelas_id,
                                            'siswa_id'          => $value->id,
                                            'tanggal'           => $date,
                                            'semester'          => $count == null ? 1 : ($count->semester + 1),
                                            'nominal_bayar'     => $value->kelasDetail->kelas->nominal,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();

            $status = true;
            $message = 'Data spp siswa berhasil diupdate';

            $result = [
                'status' => $status,
                'message' => $message,
            ];
            return $result;



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
                'guru_piket_id'     => 1,
                'guru_penerima_id'  => 1,
                'guru_penerima'     => $data['guru_penerima'],
                'guru_piket'        => $data['guru_piket'],
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

            if ($spp->siswa->status == 'Potongan') {
                $spp['kelas']['nominal'] = ($spp->kelas->nominal / 100) * 50;
            }

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
            // 'guru_penerima_id' => 'required',
            // 'guru_piket_id' => 'required',
            'siswa_id' => 'required',
            'nominal_spp' => 'required',
            'nominal_dibayar' => 'required',
            'nominal_sisa' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors()->first());
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
                // 'guru_penerima_id' => $data['guru_penerima_id'],
                // 'guru_piket_id' => $data['guru_piket_id'],
                'guru_piket_id'     => 1,
                'guru_penerima_id'  => 1,
                'guru_penerima'     => $data['guru_penerima'],
                'guru_piket'        => $data['guru_piket'],
                'bendahara_id' => Auth::user()->id,
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

            // dd("berhasil");

            return [
                'status' => true,
                'message' => 'Data spp berhasil ditambahkan',
            ];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];

            // dd($th->getMessage());
        }
    }

    static function updateSpp($data)
    {
        $validator = Validator::make($data, [
            'spp_id' => 'required|exists:spps,id',
            // 'guru_penerima_id' => 'required',
            // 'guru_piket_id' => 'required',
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
            'total_pembayaran' => $findSpp->nominal_bayar,
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

        $validator = Validator::make($data, [
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'periode' => 'required',
            // 'semester' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            $status = false;
            $message = $validator->errors()->first();


            return [
                'status' => $status,
                'message' => $message,
                'data' => null,
            ];
        }

        // $periode = $data['periode'];
        // $explode = explode(
        //     '/',
        //     $periode
        // );

        // dd($explode);


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

        $tahun_ajaran = tahun_ajaran::where('id', $data['periode'])->first();

        // dd($tahun_ajaran->tahun_ajaran);
        $explode = explode(
            '/',
            $tahun_ajaran->tahun_ajaran
        );

        // dd($explode);
        if ($tahun_ajaran->semester == 'Genap') {
            $year = $explode[1];
        } else {
            $year = $explode[0];
        }
        // $spp = [];

        $spp = Spp::with('siswa', 'guru', 'kelas')->where('semester_id', $data['periode'])->where('siswa_id', $siswa->id)->whereYear('tanggal', $year)->get();


        // dd($spp);

        if ($spp->isEmpty()) {
            # code...

            // dd("null");
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
            'ta' => $ta,
            'status' => $status,
            'message' => $message,
            'spp' => $spp,
            'siswa' => $siswa,
        ];


        // $spp = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $siswa->id)->get();


        // dd($spp);


    }

    static function detailKelasLunas($kelas_id)
    {
        // dd($kelas_id);
        // $spp = Spp::with('siswa', 'guru', 'kelas')->where('kelas_id', decrypt($kelas_id))->where('status_pembayaran', 'Lunas')->get()->groupBy('siswa_id');

        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $ta = tahun_ajaran::get();
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
        // dd($spp);
        $status = true;
        $message = 'Data spp ditemukan';

        return [
            'ta' => $ta,
            'status' => $status,
            'message' => $message,
            'data' => $spp,
        ];
    }

    static function detailKelasBelumLunas($kelas_id)
    {
        $ta = tahun_ajaran::get();
        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $spp = [];
        foreach ($kelas as $k) {
            $data = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $k->siswa_id)->where('kelas_id', $k->kelas_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->whereRelation('siswa', 'deleted_at', null)->get();

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

        // dd($spp[5]);
        $status = true;
        $message = 'Data spp ditemukan';

        return [
            'status' => $status,
            'message' => $message,
            'data' => $spp,
            'ta' => $ta
        ];
    }

    public function filterKelas($data, $kelas_id)
    {
        // dd(decrypt($kelas_id));
        // dd($data);

        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $ta = tahun_ajaran::get();

        $tahun_ajaran = tahun_ajaran::where('id', $data['periode'])->first();

        $explode = explode('/', $tahun_ajaran->tahun_ajaran);
        // $periode = $data['periode'];
        // $explode = explode('/', $periode);

        if ($tahun_ajaran->semester == "Genap") {
            $year = $explode[1];
        } else {
            $year = $explode[0];
        }
        $spp = [];

        $kls = Spp::with('siswa', 'guru', 'kelas')->where('semester_id', $data['periode'])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $year)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get()->groupBy('siswa_id');

        // dd($kls);
        foreach ($kls as $key) {
            $spp[] = $key;
        }

        // dd($explode);
        // $spp = [];
        // if ($data['semester'] == 'Ganjil') {

        //     $periode = $explode = $explode[0];
        //     $kls = Spp::with('siswa', 'guru', 'kelas')->where('semester_id', $data['periode'])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $periode)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get()->groupBy('siswa_id');

        //     // dd($kls);
        //     foreach ($kls as $key) {
        //         $spp[] = $key;
        //     }
        // } else {
        //     $periode = $explode = $explode[1];

        //     // dd("explode");
        //     $kls = Spp::with('siswa', 'guru', 'kelas')->whereIn('semester', [1, 3, 5, 7, 9])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $periode)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get()->groupBy('siswa_id');

        //     // dd(count($kls));
        //     foreach ($kls as $key) {
        //         $spp[] = $key;
        //     }
        // }

        // dd($spp);

        if ($spp != null) {
            return [
                'data' => $spp,
                'message' => 'Data Spp ditemukan',
                'status' => true,
                'ta' => $ta
            ];
        } else {
            return [
                'data' => null,
                'message' => 'Data Spp Tidak ditemukan',
                'status' => false,
            ];
        }
    }
    public function filterKelasLunas($data, $kelas_id)
    {
        // dd(decrypt($kelas_id));
        // dd($data);

        $kelas = DetailKelas::with('siswa')->where('kelas_id', decrypt($kelas_id))->get();

        // dd($kelas);
        $ta = tahun_ajaran::get();

        $tahun_ajaran = tahun_ajaran::where('id', $data['periode'])->first();

        $explode = explode('/', $tahun_ajaran->tahun_ajaran);
        // $periode = $data['periode'];
        // $explode = explode('/', $periode);

        // dd($explode);
        if ($tahun_ajaran->semester == "Genap") {
            $year = $explode[1];
        } else {
            $year = $explode[0];
        }
        $spp = [];

        $kls = Spp::with('siswa', 'guru', 'kelas')->where('semester_id', $data['periode'])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $year)->whereIn('status_pembayaran', ['Lunas'])->get()->groupBy('siswa_id');

        // dd($kls);
        foreach ($kls as $key) {
            $spp[] = $key;
        }

        // $periode = $data['periode'];
        // $explode = explode('/', $periode);


        // // dd($explode);
        // $spp = [];
        // if ($data['semester'] == 'Ganjil') {

        //     $periode = $explode = $explode[0];
        //     $kls = Spp::with('siswa', 'guru', 'kelas')->whereIn('semester', [2, 4, 6, 8, 10])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $periode)->whereIn('status_pembayaran', ['Lunas'])->get()->groupBy('siswa_id');

        //     // dd(count($kls));
        //     foreach ($kls as $key) {
        //         $spp[] = $key;
        //     }
        // } else {
        //     $periode = $explode = $explode[1];

        //     // dd($periode);
        //     $kls = Spp::with('siswa', 'guru', 'kelas')->whereIn('semester', [1, 3, 5, 7, 9])->where('kelas_id', decrypt($kelas_id))->whereYear('tanggal', $periode)->whereIn('status_pembayaran', ['Lunas'])->get()->groupBy('siswa_id');

        //     // dd(count($kls));
        //     foreach ($kls as $key) {
        //         $spp[] = $key;
        //     }
        // }

        // dd($spp);

        if ($spp != null) {
            return [
                'ta' => $ta,
                'data' => $spp,
                'message' => 'Data Spp ditemukan',
                'status' => true,
            ];
        } else {
            return [
                'data' => null,
                'message' => 'Data Spp Tidak ditemukan',
                'status' => false,
            ];
        }
    }
}
