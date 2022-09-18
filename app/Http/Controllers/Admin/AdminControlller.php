<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class AdminControlller extends Controller
{
    //

    public function index()
    {
        $sppLunas = Spp::where('status_pembayaran', 'Lunas')->sum('total_pembayaran');
        $sppBelumLunas = Spp::where('status_pembayaran', 'Belum Lunas')->sum('total_pembayaran');
        $sppCicilan = Spp::where('status_pembayaran', 'Cicilan')->sum('total_pembayaran');

        $listSpp = Spp::with('siswa', 'kelas', 'guru')
            ->whereIn('status_pembayaran', ['Lunas', 'Cicilan'])
            ->orderBy('updated_at', 'DESC')->limit(5)->get();

        $countSiswa = siswa::count('id');
        $countGuru = Guru::count('id');
        // dd($sppLunas);

        return view('pages.admin.dashboard', [
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
