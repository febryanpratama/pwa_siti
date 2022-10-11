<?php

namespace App\Helpers;

use App\Models\DetailKelas;
use App\Models\Ijazah;
use App\Models\Spp;

class Format
{
    static function formatBulan($data)
    {
        // 
        switch ($data) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
        }
    }

    static function getTanggal($siswa_id, $kelas_id, $bulan)
    {
        // $data = Spp::where('id', $spp_id)->()
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereMonth('tanggal', $bulan)->first();

        // dd($data);

        if ($data != NULL) {
            // dd($data->total_pembayaran);
            if ($data->total_pembayaran == 0) {
                # code...
                // dd("gaok");
                return NULL;
            } else {

                // dd("ok");
                return $data->updated_at;
            }
        } else {
            return 0;
        }
    }
    static function getDataSpp($siswa_id, $kelas_id, $bulan)
    {
        // $data = Spp::()
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereMonth('tanggal', $bulan)->first();

        // dd($data);
        if ($data != NULL) {
            return @$data->total_pembayaran;
        } else {
            return 0;
        }
    }

    static function getCountSiswaKelas($kelas_id)
    {
        $data = DetailKelas::where('kelas_id', $kelas_id)->count();

        return $data;
    }

    static function countSiswa($siswa_id, $kelas_id)
    {
        // 
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereNotIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->count();

        return $data;
    }

    static function checkIjazah($siswa_id)
    {
        // 
        $data = Ijazah::where('siswa_id', $siswa_id)->count();

        return $data;
    }

    static function checkSpp($siswa_id)
    {
        // 
        $data = Spp::where('siswa_id', $siswa_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->count();

        return $data;
    }
}
