<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Services\GuruService;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    protected $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function index(Request $request)
    {
        $result = $this->guruService->getGuru();

        return view('pages.admin.guru.index', [
            'data' => $result['data'],
            'title' => $result['title']
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->guruService->store($request->all());

        if ($result['status'] == false) {
            return back()->with('error', $result['message']);
        }
        return back()->withSuccess($result['message']);
    }

    public function update(Request $request)
    {
        $result = $this->guruService->update($request->all());

        return back()->withSuccess($result['message']);
    }

    public function destroy(Request $request)
    {
        $dataGuru = Guru::where('id', $request->guru_id)->first();

        // dd($dataGuru);

        $dataKelas = Kelas::where('guru_id', $dataGuru->id)->get();

        if ($dataKelas->isNotEmpty()) {
            return back()->with('error', 'Data tidak bisa dihapus karena masih ada kelas yang terkait dengan guru ' . $dataGuru->nama_guru);
        } else {
            Guru::where('id', $request->guru_id)->delete();
            return back()->withSuccess('Data berhasil dihapus');
        }
        // dd($dataKelas);

    }
}
