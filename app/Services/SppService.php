<?php

namespace App\Services;

use App\Models\DetailKelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\Spp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class SppService
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function getSpp($data)
    {
        $spp = Spp::with('siswa', 'guru')->get();
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

    public function store($data)
    {
        // dd($data);

        DB::beginTransaction();

        try {
            $siswa = DetailKelas::with('siswa', 'kelas')->where('siswa_id', $data['siswa_id'])->first();
            // dd($siswa);

            $nominal_sisa = $siswa->kelas->nominal - $data['nominal_dibayar'];


            dd($data);
            Spp::create([
                'siswa_id'          => $data['siswa_id'],
                'guru_id'           => Auth::user()->id,
                'guru_piket_id'     => $data['guru_piket_id'],
                'guru_penerima_id'  => $data['guru_penerima_id'],
                'bendahara_id'      => 1, // Bendahara ID
                'tanggal'           => Carbon::now(),
                'nominal_bayar'     => $data['nominal_spp'],
                'sisa_bayar'        => $nominal_sisa,
                'nominal_bayar'     => $data['nominal_dibayar'],
                'keterangan'        => $data['keterangan'],
                'status_pembayaran' => $nominal_sisa == 0 ? 'Lunas' : 'Belum Bayar',
            ]);

            $this->smsService->sendSms(
                'Kepada bapak / ibu siswa ' . $siswa->siswa->nama_siswa . ', pe3emb4yar4n SPP pada bulan Aug telah kami terima pada tanggal ' . Carbon::now()->format('d/m/Y') . ', Terima kasih',
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

            dd($th);
            $result = [
                'status' => false,
                'message' => 'Data spp gagal ditambahkan',
            ];

            return $result;
        }
    }
}
