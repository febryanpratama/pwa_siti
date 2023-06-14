<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSppExport;
use App\Models\tahun_ajaran;
use App\Services\LaporanSppService;
use Illuminate\Http\Request;

class LaporanSppController extends Controller
{
    //

    protected $laporanSpp;

    public function __construct(LaporanSppService $laporanSpp)
    {
        $this->laporanSpp = $laporanSpp;
    }
    public function index(Request $request)
    {
        // dd($request->all());
        $ta = tahun_ajaran::get();

        // dd($request->all());
        if ($request['semester_id'] != null) {
            # code...
            // dd("ok");
            $result = $this->laporanSpp->getLaporanSppFilter($request->all());
        } else {
            $result = $this->laporanSpp->getLaporanSpp();
        }

        // dd($result);

        // if($result == null){
        //     return back()->with('error')
        // }
        return view('pages.admin.laporan.index', [
            'ta' => $ta,
            'data' => $result['data'] ?? null,
            'kelas' => $result['kelas'] ?? null,
            'title' => $result['title'] ?? null,
        ]);
    }

    public function exportExcel(Request $request)
    {
        // dd($request->all());


        $result = $this->laporanSpp->exportExcel($request->all());

        // dd($result);
        return \Excel::download(new LaporanSppExport($result['data'], $request['semester'], $result['year'], $result['semester']), 'Laporan Excel.xlsx');
    }
}
