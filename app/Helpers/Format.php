<?php

namespace App\Helpers;

use App\Models\DetailKelas;
use App\Models\Ijazah;
use App\Models\siswa;
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

    static function getTanggal($siswa_id, $kelas_id, $tahun, $bulan)
    {
        // $data = Spp::where('id', $spp_id)->()
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->first();

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
    static function getDataSpp($siswa_id, $kelas_id, $tahun, $bulan)
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

    static function getDataNewSpp($siswa_id, $kelas_id, $tahun, $bulan, $semester)
    {
        $data = Spp::with('siswa')->where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->where('semester_id', $semester)->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->first();
        // dd($data['total_pembayaran']);
        // dd($data->siswa->status);
        if ($data != '') {
            if ($data->siswa->status == 'Gratis') {
                return 0;
            } else if ($data->siswa->status == 'Potongan') {
                return @$data->total_pembayaran;
            } else {
                return @$data->total_pembayaran;
            }
        } else {
            return 0;
        }
    }
    static function getSumDataSpp($kelas_id, $bulan, $tahun)
    {
        $total = [];
        $data = Spp::with('siswa')->where('kelas_id', $kelas_id)->whereMonth('tanggal', $bulan)->get();

        // dd($data);
        foreach ($data as $key => $value) {
            # code...
            // dd($value->status_pembayaran);
            if ($value->siswa->status == 'Gratis') {
                $total[] = 0;
            } else if ($value->siswa->status == 'Potongan') {

                switch ($value->status_pembayaran) {
                    case 'Lunas':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Cicilan':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Belum Lunas':
                        $total[] = 0;
                        break;
                }
            } else {
                switch ($value->status_pembayaran) {
                    case 'Lunas':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Cicilan':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Belum Lunas':
                        $total[] = 0;
                        break;
                }
            }

            // $total[] = $value->total_pembayaran;
        }

        return array_sum($total);
    }
    static function getSumDataSppNew($kelas_id, $bulan, $tahun, $semester)
    {
        $total = [];
        $data = Spp::with('siswa')->where('kelas_id', $kelas_id)->where('semester_id', $semester)->whereMonth('tanggal', $bulan)->get();

        // dd($data);
        foreach ($data as $key => $value) {
            # code...
            // dd($value->status_pembayaran);

            // switch ($value->status_pembayaran) {
            //     case 'Lunas':
            //         $total[] = $value->total_pembayaran;
            //         break;
            //     case 'Cicilan':
            //         $total[] = $value->total_pembayaran;
            //         break;
            //     case 'Belum Lunas':
            //         $total[] = 0;
            //         break;
            // }
            // $total[] = $value->total_pembayaran;

            if ($value->siswa->status == 'Gratis') {
                $total[] = 0;
            } else if ($value->siswa->status == 'Potongan') {

                switch ($value->status_pembayaran) {
                    case 'Lunas':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Cicilan':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Belum Lunas':
                        $total[] = 0;
                        break;
                }
            } else {
                switch ($value->status_pembayaran) {
                    case 'Lunas':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Cicilan':
                        $total[] = $value->total_pembayaran;
                        break;
                    case 'Belum Lunas':
                        $total[] = 0;
                        break;
                }
            }
        }

        return array_sum($total);
    }

    static function getCountSiswaKelas($kelas_id)
    {
        $data = DetailKelas::with('siswa')->whereRelation('siswa', 'status_siswa', 'Aktif')->where('kelas_id', $kelas_id)->count();

        return $data;
    }

    static function countSiswa($siswa_id, $kelas_id)
    {
        // 
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereNotIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->count();

        return $data;
    }

    static function countSiswaNotPaid($siswa_id, $kelas_id)
    {
        // 
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->count();

        return $data;
    }

    static function sumNotPaid($siswa_id, $kelas_id)
    {
        $data = Spp::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get();

        $total = [];

        foreach ($data as $key => $value) {
            # code...
            if ($value->status_pembayaran == 'Belum Lunas') {
                $total[] = $value->nominal_bayar;
            } else {
                $total[] = $value->sisa_bayar;
            }
        }

        return array_sum($total);
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

    static function getAllSisaSpp($siswa_id)
    {
        $total = [];
        $data = Spp::where('siswa_id', $siswa_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get();

        foreach ($data as $key => $value) {
            # code...
            $dataSpp = Spp::firstWhere('id', $value->id);
            // dd($dataSpp);
            if ($value->sisa_bayar == 0) {
                # code...
                $total[] = $dataSpp->nominal_bayar;
            } else {
                $total[] = $dataSpp->sisa_bayar;
            }
            // $total[] = $value->sisa_pembayaran;
        }

        return array_sum($total);
    }

    static function getTunggakan($siswa_id)
    {
        // dd($siswa_id);

        $total = [];

        // Spp::where('siswa_id', $siswa_id)
        $spp = Spp::with('siswa', 'guru', 'kelas')->where('siswa_id', $siswa_id)->get();

        foreach ($spp as $key => $value) {
            # code...
            if ($value->status_pembayaran == 'Belum Lunas') {
                $total[] = $value->nominal_bayar;
            } else if ($value->status_pembayaran == 'Cicilan') {
                $total[] = $value->sisa_bayar;
            }
        }

        return array_sum($total);
    }

    static function getNameSiswa($siswa_id)
    {
        $data = siswa::where('id', $siswa_id)->first();

        // dd($data);
        return $data->nama_siswa;
    }

    static function GetDetail($siswa_id, $status)
    {
        if ($status == 'Lunas') {
            # code...
            $count = Spp::where('siswa_id', $siswa_id)->where('status_pembayaran', 'Lunas')->count();
        } else if ($status == 'Belum Lunas') {
            $count = Spp::where('siswa_id', $siswa_id)->where('status_pembayaran', 'Belum Lunas')->count();
        } else {
            $count = Spp::where('siswa_id', $siswa_id)->where('status_pembayaran', 'Cicilan')->count();
        }

        return $count;
    }

    static function Unpaid($siswa_id)
    {
        $data = Spp::where('siswa_id', $siswa_id)->whereIn('status_pembayaran', ['Belum Lunas', 'Cicilan'])->get();

        $total = [];

        foreach ($data as $key => $value) {
            # code...
            if ($value->status_pembayaran == 'Belum Lunas') {
                $total[] = $value->nominal_bayar;
            } else {
                $total[] = $value->sisa_bayar;
            }
        }

        return array_sum($total);
    }

    static function getSiswa($kelas_id)
    {
        // 
        $siswa =  DetailKelas::with('siswa')->whereRelation('siswa', 'status_siswa', 'Aktif')->where('kelas_id', $kelas_id)->whereRelation('siswa', 'deleted_at', NULL)->get();
        // return null;

        // dd($siswa);

        return $siswa;
    }
}
