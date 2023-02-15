<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSppExport;
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

        if ($request['semester'] != null || $request['tahun'] != null) {
            # code...
            $result = $this->laporanSpp->getLaporanSppFilter($request->all());
        } else {
            $result = $this->laporanSpp->getLaporanSpp();
        }

        return view('pages.admin.laporan.index', [
            'data' => $result['data'],
            'kelas' => $result['kelas'],
            'title' => $result['title'],
        ]);
    }

    public function exportExcel(Request $request)
    {
        // dd($request->all());


        $result = $this->laporanSpp->exportExcel($request->all());

        // dd($result);
        return \Excel::download(new LaporanSppExport($result['data'], $request->semester, $request->tahun), 'Laporan Excel.xlsx');
    }
}
