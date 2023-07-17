<?php

namespace App\Services;

use App\Models\DetailKelas;
use App\Models\Kelas;
use App\Models\Setting;
use App\Models\siswa;
use App\Models\Spp;
use App\Models\tahun_ajaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanSppService
{
    static function getLaporanSpp()
    {
        $title = "Laporan SPP";
        $data = Spp::with('siswa', 'kelas', 'guru', 'user')->get()->sortBy('siswa.nama_siswa')->groupBy('siswa_id');
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
        // dd($data);

        $tahun_ajaran = tahun_ajaran::where('id', $data['semester_id'])->first();

        $explode = explode('/', $tahun_ajaran->tahun_ajaran);

        if ($tahun_ajaran->semester == 'Genap') {
            # code...
            $year = $explode[1];
        } else {
            $year = $explode[0];
        }

        $data = Spp::with('siswa', 'kelas', 'guru', 'user')->whereRelation('kelas', 'id', $data['kelas'])->where('semester_id', $data['semester_id'])->whereYear('tanggal', $year)->whereRelation('siswa', 'deleted_at', null)->get()->sortBy('siswa.nama_siswa')->groupBy('siswa_id');

        // dd($data);

        // if ($data['semester'] == 'GANJIL') {
        //     // dd('ganjil');
        // } else {
        //     // dd('genap');
        //     $data = Spp::with('siswa', 'kelas', 'guru', 'user')->whereIn('semester', [1, 3, 5, 7, 9])->whereYear('tanggal', $data['tahun'])->whereRelation('siswa', 'deleted_at', null)->get()->sortBy('siswa.nama_siswa')->groupBy('siswa_id');
        // }

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

        return $result;
    }

    static function getLaporanSppFilterLP($data)
    {
        // dd($data);

        // $spp = Spp::where('semester_id', $data['periode_id'])->where('status_pembayaran', $data['status'])->get()->groupBy('siswa_id');

        $siswa = siswa::with(['spp' => function ($q) use ($data) {
            $q->where('status_pembayaran', $data['status']);
            $q->where('semester_id', $data['periode_id']);
        }])->orderBy('nama_siswa')
            ->get();
        // $siswa = siswa::with('spp' )
        //     ->whereRelation('spp', 'status_pembayaran', $data['status'])
        //     ->whereRelation('spp', 'semester_id', $data['periode_id'])
        //     ->whereRelation('spp', 'tanggal', ))
        //     ->get();
        // dd($siswa[0]);
        return $siswa;
    }

    public function exportExcel($data)
    {

        // dd($data);

        $tahun_ajaran = tahun_ajaran::where('id', $data['semester'])->first();

        $explode = explode('/', $tahun_ajaran->tahun_ajaran);

        // dd($explode);
        if ($tahun_ajaran['semester'] == 'Genap') {
            # code...

            $year = $explode[1];
        } else {
            $year = $explode[0];
        }

        $data = DetailKelas::with('kelas', 'siswa')->where('kelas_id', $data['kelas_id'])->whereRelation('siswa', 'status_siswa', 'Aktif')->get()->sortBy('siswa.nama_siswa', false);


        // dd($year);

        $status = true;
        $message = "Success Ambil Data Laporan SPP";
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'year' => $year,
            'semester' => $tahun_ajaran['semester']
        ];

        return $result;
    }
}
