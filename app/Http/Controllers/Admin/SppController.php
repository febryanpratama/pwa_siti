<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spp;
use App\Models\tahun_ajaran;
use App\Services\SppService as ServicesSppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SppController extends Controller
{
    //
    protected $sppService;

    public function __construct(ServicesSppService $sppService)
    {
        $this->sppService = $sppService;
    }
    public function index(Request $request)
    {
        $result  = $this->sppService->getKelas($request->all());

        // dd($result['kelas']);
        return view('pages.admin.spp.index', [
            'kelas' => $result['kelas'],
            'title' => 'Data Kelas',
            // 'spp' => NULL,
            // 'siswa' => NULL,
            // 'guru' => $result['guru'],
            // 'siswa' => $result['siswa'],
        ]);
    }

    public function detail()
    {
        // 
    }

    public function detailKelas(Request $request, $kelas_id)
    {
        $result = $this->sppService->detailKelas($kelas_id);

        // dd($result);
        return view('pages.admin.spp.detail', [
            'data' => $result['siswa'],
            'title' => 'Data Siswa',
            'kelas_id' => encrypt($kelas_id),
            'tahun' => $result['tahun'],
        ]);
    }

    public function generate($token)
    {
        $kelas_id = decrypt($token);
        $result = $this->sppService->generate($kelas_id);

        if ($result['status']) {
            return back()->with('success', $result['message']);
        } else {
            return back()->with('error', $result['message']);
        }
        # code...
    }

    public function generateSpp(Request $request)
    {
        $kelas_id = decrypt($request['kelas_id']);

        // dd($kelas_id);
        $result = $this->sppService->generateN($request->all(), $kelas_id);

        if ($result['status']) {
            return back()->with('success', $result['message']);
        } else {
            return back()->with('error', $result['message']);
        }
    }

    public function detailSiswa($kelas_id, $siswa_id)
    {
        $result = $this->sppService->detailSiswa($kelas_id, $siswa_id);

        return view('pages.admin.spp.detailSpp', [
            'title' => 'Data Spp Siswa',
            'data' => $result['data'],
            'guru' => $result['guru'],
            'siswa' => $result['siswa'],
        ]);
    }

    public function store(Request $request)
    {

        $result = $this->sppService->store($request->all());

        if ($result['status'] == true) {
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function addSpp(Request $request)
    {
        $result = $this->sppService->addSpp($request->all());

        if ($result['status'] == true) {
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function updateSpp(Request $request)
    {
        // dd($request->all());
        $result = $this->sppService->updateSpp($request->all());

        // dd($result);
        if ($result['status'] == true) {
            # code...
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function Export(Request $request)
    {
        // $result = $this->sppService->exportExcel($request->all());
        // return $result;
    }

    // API SPP

    public function apiSpp(Request $request)
    {
        $result = $this->sppService->apiSpp($request->all());

        // $result = "test";
        return response()->json($result);
    }

    public function dataSiswa(Request $request)
    {

        // dd($request->all());
        $ta = tahun_ajaran::get();

        $result = $this->sppService->dataSiswa($request->all());

        // dd($result);

        if ($result['status'] == true) {
            return view('pages.welcome', [
                'ta' => $ta,
                'spp' => $result['spp'],
                'siswa' => $result['siswa'],
                'message' => $result['message'],
                'status' => true,
            ])->with('success', $result['message']);
        } else {
            // dd("false");
            return view('pages.welcome', [
                'ta' => $ta,
                'ack' => true,
                'status' => $result['status'],
                'message' => $result['message'],
                'spp' => null,
                'siswa' => null,
            ])->with('error', $result['message']);
        }
        // dd($result);
    }

    public function detailKelasLunas(Request $request, $kelas_id)
    {
        // 
        $result = $this->sppService->detailKelasLunas($kelas_id);

        // dd($result);
        return view('pages.admin.spp.detailLunas', [
            'data' => $result['data'],
            'ta' => $result['ta'],
            'title' => 'Data Siswa',
            'kelas_id' => encrypt($kelas_id),
        ]);
    }

    public function detailKelasBelumLunas($kelas_id)
    {
        $result = $this->sppService->detailKelasBelumLunas($kelas_id);

        // dd($result['data']);
        return view('pages.admin.spp.detailBelumLunas', [
            'data' => $result['data'],
            'ta' => $result['ta'],
            'title' => 'Data Siswa',
            'kelas_id' => encrypt($kelas_id),
        ]);
    }

    public function filterKelas(Request $request, $kelas_id)
    {
        $id_kelas = decrypt($kelas_id);
        // dd(decrypt($id_kelas));
        // dd($request->all());
        $result = $this->sppService->filterKelas($request->all(), $id_kelas);

        // dd($result['data']);
        if ($result['status'] == true && $result['data'] != null) {
            return view('pages.admin.spp.detailBelumLunas', [
                'data' => $result['data'],
                'title' => 'Data Siswa',
                'ta' => $result['ta'],
                'kelas_id' => encrypt($kelas_id),
            ]);
        } else {

            if (Auth::user()->roles->pluck('name')[0] == 'Admin') {
                # code...
                return redirect('admin/spp')->with('error', $result['message']);
            } else if (Auth::user()->roles->pluck('name')[0] == 'Bendahara') {
                return redirect('bendahara/spp')->with('error', $result['message']);
                # code...
            } else {
                return redirect('kepsek/spp')->with('error', $result['message']);
            }
        }
    }

    public function filterLunas(Request $request, $kelas_id)
    {
        $id_kelas = decrypt($kelas_id);
        // dd(decrypt($id_kelas));
        // dd($request->all());
        $result = $this->sppService->filterKelasLunas($request->all(), $id_kelas);

        // dd($result['data']);
        if ($result['status'] == true && $result['data'] != null) {
            return view('pages.admin.spp.detailLunas', [
                'ta' => $result['ta'],
                'data' => $result['data'],
                'title' => 'Data Siswa',
                'kelas_id' => encrypt($kelas_id),
            ]);
        } else {
            if (Auth::user()->roles->pluck('name')[0] == 'Admin') {
                # code...
                return redirect('admin/spp')->with('error', $result['message']);
            } else if (Auth::user()->roles->pluck('name')[0] == 'Bendahara') {
                return redirect('bendahara/spp')->with('error', $result['message']);
                # code...
            } else {
                return redirect('kepsek/spp')->with('error', $result['message']);
            }
            // return redirect('admin/spp')->with('error', $result['message']);
        }
    }

    public function getSemester()
    {
        $data = tahun_ajaran::where('deleted_at', null)->get();

        // dd($data);
        if ($data->isNotEmpty()) {
            # code...

            return response()->json([
                'status' => true,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
            ]);
        }
    }

    public function apiDashboard(Request $request)
    {
        // $data = Spp::
        $arrData = [];
        for ($i = 0; $i <= 12; $i++) {
            # code...
            $dataSpp = Spp::whereMonth('tanggal', $i)->whereYear('tanggal', $request->tahun)->sum('total_pembayaran');

            $arrData[] = $dataSpp;
        }

        return response()->json([
            'status' => true,
            'data' => $arrData,
        ]);
    }
}
