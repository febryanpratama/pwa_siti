<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SppService as ServicesSppService;
use Illuminate\Http\Request;

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
        $result  = $this->sppService->getSpp($request->all());

        return view('pages.admin.spp.index', [
            'data' => $result['data'],
            'title' => $result['title'],
            'guru' => $result['guru'],
            'siswa' => $result['siswa'],
        ]);
    }

    public function store(Request $request)
    {

        $result = $this->sppService->store($request->all());

        return back()->withSuccess($result['message']);
    }
}
