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
        $data = Spp::with('siswa', 'kelas', 'guru', 'user')->get()->groupBy('siswa_id');
        $kelas = Kelas::get();
        $status = true;
        $message = "Success Ambil Data Laporan SPP";

        // dd($data);
        // foreach ($data as $key) {
        //     dd($key);
        //     // foreach ($key as $item) {
        //     //     dd($item);
        //     // }
        // }
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'kelas' => $kelas,
            'title' => $title
        ];

        return $result;
    }

    static function getLaporanSppFilter($data)
    {

        if ($data['semester'] == 'GANJIL') {
            $data = Spp::with('siswa', 'kelas', 'guru', 'user')->whereIn('semester', [1, 3, 5, 7, 9])->whereYear('tanggal', $data['tahun'])->get()->groupBy('siswa_id');
        } else {
            $data = Spp::with('siswa', 'kelas', 'guru', 'user')->whereIn('semester', [1, 2, 4, 6, 8, 10])->whereYear('tanggal', $data['tahun'])->get()->groupBy('siswa_id');
        }

        // dd($data);
        $title = "Laporan SPP";
        $kelas = Kelas::get();
        $status = true;
        $message = "Success Ambil Data Laporan SPP";

        // dd($data);
        // foreach ($data as $key) {
        //     dd($key);
        //     // foreach ($key as $item) {
        //     //     dd($item);
        //     // }
        // }
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'kelas' => $kelas,
            'title' => $title
        ];
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
