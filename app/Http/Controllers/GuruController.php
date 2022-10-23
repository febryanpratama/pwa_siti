<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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

        return back()->withSuccess($result['message']);
    }

    public function update(Request $request)
    {
        $result = $this->guruService->update($request->all());

        return back()->withSuccess($result['message']);
    }

    public function destroy(Request $request)
    {
        Guru::where('id', $request->guru_id)->delete();

        return back()->withSuccess('Data berhasil dihapus');
    }
}
