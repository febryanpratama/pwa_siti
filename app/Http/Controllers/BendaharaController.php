<?php

namespace App\Http\Controllers;

use App\Services\bendaharaService;
use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    //
    protected $bendaharaService;

    public function __construct(bendaharaService $bendaharaService)
    {
        $this->bendaharaService = $bendaharaService;
    }

    public function index()
    {
        $result = $this->bendaharaService->getBendahara();

        return view('pages.admin.bendahara.index', [
            'data' => $result['data'],
            'title' => $result['title'],
            'status' => $result['status'],
            'message' => $result['message']
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->bendaharaService->store($request->all());

        // dd($result);
        return back()->with($result['status'], $result['message']);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $result = $this->bendaharaService->update($request->except('_token'));
        return back()->with($result['status'], $result['message']);
    }



    // Route For Bendahara Login

    public function singleIndex(Request $request)
    {
        return view('pages.bendahara.index');
    }
}
