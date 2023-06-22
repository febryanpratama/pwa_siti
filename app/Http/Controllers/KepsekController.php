<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Setting;
use App\Models\siswa;
use App\Models\Spp;
use App\Services\KepsekService;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    //

    protected $kepsekService;
    public function __construct(KepsekService $kepsekService)
    {
        $this->kepsekService = $kepsekService;
    }
    public function index()
    {

        $setting = Setting::first();

        $sppLunas = Spp::where('status_pembayaran', 'Lunas')->where('semester_id', $setting->tahun_ajaran_id)->sum('total_pembayaran');
        $sppBelumLunas = Spp::where('status_pembayaran', 'Belum Lunas')->where('semester_id', $setting->tahun_ajaran_id)->sum('nominal_bayar');
        $sppCicilan = Spp::where('status_pembayaran', 'Cicilan')->where('semester_id', $setting->tahun_ajaran_id)->sum('sisa_bayar');

        $listSpp = Spp::with('siswa', 'kelas', 'guru')
            ->whereIn('status_pembayaran', ['Lunas', 'Cicilan'])
            ->orderBy('updated_at', 'DESC')->limit(5)->where('semester_id', $setting->tahun_ajaran_id)->get();

        $countSiswa = siswa::where('status_siswa', 'Aktif')->count('id');
        $countGuru = Guru::count('id');
        // dd($sppLunas);

        return view('pages.kepsek.dashboard', [
            'spplunas' => $sppLunas,
            'sppbelumlunas' => $sppBelumLunas,
            'sppcicilan' => $sppCicilan,
            'listspp' => $listSpp,
            'countsiswa' => $countSiswa,
            'countguru' => $countGuru,
            'title' => 'Dashboard'
        ]);
    }
}
