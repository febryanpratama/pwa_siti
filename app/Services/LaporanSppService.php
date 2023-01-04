<?php

namespace App\Services;

use App\Models\DetailKelas;
use App\Models\Kelas;
use App\Models\siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\DB;

class LaporanSppService
{
    static function getLaporanSpp()
    {
        $title = "Laporan SPP";
        $data = Spp::with('siswa', 'kelas', 'guru', 'user')->whereIn('status_pembayaran', ['Lunas', 'Cicilan'])->orderBy('updated_at', 'DESC')->get();
        $kelas = Kelas::get();
        $status = true;
        $message = "Success Ambil Data Laporan SPP";

        // dd($data);
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'kelas' => $kelas,
            'title' => $title
        ];

        return $result;
    }

    static function exportExcel($data)
    {

        $data = DetailKelas::with('kelas', 'siswa')->where('kelas_id', $data['kelas_id'])->whereRelation('siswa', 'status_siswa', 'Aktif')->get()->sortBy('siswa.nama_siswa', false);

        // dd($data);

        $status = true;
        $message = "Success Ambil Data Laporan SPP";
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }
}
