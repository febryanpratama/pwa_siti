<?php

namespace App\Http\Controllers;

use App\Models\bendahara;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\Spp;
use App\Services\BendaharaService;
use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    //
    protected $bendaharaService;

    public function __construct(BendaharaService $bendaharaService)
    {
        $this->bendaharaService = $bendaharaService;
    }

    public function index()
    {
        $result = $this->bendaharaService->getBendahara();

        $sppLunas = Spp::where('status_pembayaran', 'Lunas')->sum('total_pembayaran');
        $sppBelumLunas = Spp::where('status_pembayaran', 'Belum Lunas')->sum('total_pembayaran');
        $sppCicilan = Spp::where('status_pembayaran', 'Cicilan')->sum('total_pembayaran');

        $listSpp = Spp::with('siswa', 'kelas', 'guru')
            ->whereIn('status_pembayaran', ['Lunas', 'Cicilan'])
            ->orderBy('updated_at', 'DESC')->limit(5)->get();

        $countSiswa = siswa::count('id');
        $countGuru = Guru::count('id');

        return view('pages.admin.bendahara.index', [
            'data' => $result['data'],
            'title' => 'Bendahara',
            'status' => $result['status'],
            'message' => $result['message'],
            'spplunas' => $sppLunas,
            'sppbelumlunas' => $sppBelumLunas,
            'sppcicilan' => $sppCicilan,
            'listspp' => $listSpp,
            'countsiswa' => $countSiswa,
            'countguru' => $countGuru,
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->bendaharaService->store($request->all());

        // dd($result);
        if ($result['status'] == true) {
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $result = $this->bendaharaService->update($request->except('_token'));

        if ($result['status'] == true) {
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
        // return back()->with($result['status'], $result['message']);
    }

    public function destroy(Request $request)
    {

        bendahara::where('id', $request->bendahara_id)->delete();

        return back()->withSuccess('Data berhasil dihapus');
    }



    // Route For Bendahara Login

    public function singleIndex(Request $request)
    {

        $sppLunas = Spp::where('status_pembayaran', 'Lunas')->sum('total_pembayaran');
        $sppBelumLunas = Spp::where('status_pembayaran', 'Belum Lunas')->sum('nominal_bayar');
        $sppCicilan = Spp::where('status_pembayaran', 'Cicilan')->sum('sisa_bayar');

        $listSpp = Spp::with('siswa', 'kelas', 'guru')
            ->whereIn('status_pembayaran', ['Lunas', 'Cicilan'])
            ->orderBy('updated_at', 'DESC')->limit(5)->get();

        $countSiswa = siswa::where('status_siswa', 'Aktif')->count('id');
        $countGuru = Guru::count('id');

        return view('pages.bendahara.index', [
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
