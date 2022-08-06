<?php

namespace App\Http\Controllers;

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
}
