<?php

namespace App\Http\Controllers;

use App\Models\DetailKelas;
use App\Services\KelasService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class KelasController extends Controller
{
    //
    protected $kelasService;

    public function __construct(KelasService $kelasService)
    {
        $this->kelasService = $kelasService;
    }

    public function index(Request $request)
    {
        $result = $this->kelasService->getKelas();

        return view('pages.admin.kelas.index', [
            'data' => $result['data'],
            'title' => $result['title'],
            'guru' => $result['guru']
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->kelasService->store($request->all());

        return back()->withSuccess($result['message']);
    }

    public function update(Request $request)
    {
        $result = $this->kelasService->update($request->all());

        return back()->withSuccess($result['message']);
    }

    public function destroy(Request $request)
    {
        $result = $this->kelasService->destroy($request->all());

        return back()->withSuccess($result['message']);
    }

    // Detail Kelas
    public function detail(Request $request, $id)
    {
        // dd($id);
        $result = $this->kelasService->getDetail($request->all(), $id);

        return view('pages.admin.kelas.detail', [
            'data' => $result['data'],
            'title' => $result['title'],
            'data' => $result['data'],
            'siswa' => $result['siswa'],
            'kelas' => $result['kelas'],
        ]);
    }


    public function siswaStore(Request $request)
    {
        // dd($request->all());
        $result = $this->kelasService->siswaStore($request->all());

        if ($result['status']) {
            return back()->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function siswaPindah(Request $request)
    {
        // dd($request->all());
        $detail_kelas = DetailKelas::where('kelas_id', $request->before_kelas_id)->get();

        // dd($detail_kelas);
        $siswa_array = [];

        foreach ($detail_kelas as $key => $value) {
            # code...
            $siswa_array[] = $value->siswa_id;
        }

        // dd($siswa_array);

        foreach ($siswa_array as $k => $v) {
            // dd($v);
            DetailKelas::where('siswa_id', $v)->update([
                'kelas_id' => $request->kelas_id
            ]);
        }

        return back()->withSuccess('Berhasil pindah siswa');
    }

    public function siswaPindahorang(Request $request)
    {
        // dd($request->all());
        $detail_kelas = DetailKelas::where('siswa_id', $request->siswa_id)->update([
            'kelas_id' => $request->kelas_id
        ]);

        return back()->withSuccess('Berhasil pindah siswa');
    }


    // API DATA

    public function apiKelas(Request $request)
    {
        $result = $this->kelasService->GetdataSiswa($request->all());

        // dd($result);
        return response()->json($result);
    }

    public function apiSiswa(Request $request)
    {
        $result = $this->kelasService->GetdataSiswaSpp($request->all());
        return response()->json($result);
    }
}
