<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSppExport;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\tahun_ajaran;
use App\Services\LaporanSppService;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;


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
        if (array_key_exists('status', $request->all())) {
            # code...
            if ($request['periode_id'] != null) {
                $kelas = Kelas::get();
                $result = $this->laporanSpp->getLaporanSppFilterLP($request->all());

                return view('pages.admin.laporan.indexfilter', [
                    'data' => $result,
                    'title' => null,
                    'kelas' => $kelas,
                    'ta' => $ta,
                    'status' => $request['status'],
                    'semester' => $request['periode_id'],
                ]);
            }
        } else {

            if ($request['semester_id'] != null) {
                # code...
                // dd("ok");
                $result = $this->laporanSpp->getLaporanSppFilter($request->all());
            } else {
                $result = $this->laporanSpp->getLaporanSpp();
            }
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
        if ($result['semester'] == "Genap") {
            # code...
            // dd("Genap");
            // dd($request->bulan);
            $dompdf = PDF::loadview('pages.admin.laporan.laporanpdfganjil', [
                // 'bulan' => $request['bulan'],
                'data'  => $result['data'],
                'semester' => $request['semester'],
                'tahun' => $result['year']
            ])->setPaper('a4', 'landscape');
            return $dompdf->download('Laporan.pdf');

            // return $pdf->stream("Laporan.pdf", array("Attachment" => false));
        } else {
            // dd("Ganjil");

            $dompdf = PDF::loadview('pages.admin.laporan.laporanpdf', [
                // 'bulan' => $request['bulan'],
                'data'  => $result['data'],
                'semester' => $request['semester'],
                'tahun' => $result['year']
            ])->setPaper('a4', 'landscape');

            // $pdf->download('Laporan.pdf');
            return $dompdf->download('Laporan.pdf');

            // return $pdf->stream("Laporan.pdf", array("Attachment" => false));
            // return view('pages.admin.laporan.excel', [
            //     'data'  => $result['data'],
            //     'semester' => $result['semester'],
            //     'tahun' => $result['tahun']
            // ]);
        }
        // return \Excel::download(new LaporanSppExport($result['data'], $request['semester'], $result['year'], $result['semester']), 'Laporan Excel.xlsx');
    }

    public function exportPdf(Request $request)
    {
        // dd($request->all());

        $data = Spp::with('siswa')->where('status_pembayaran', $request->status)->where('semester_id', $request->periode_id)->whereMonth('tanggal', $request->bulan)->get()->sortBy('siswa.nama_siswa', false);;

        // dd($data);
        $pdf = PDF::loadview('pages.admin.laporan.pdf', ['data' => $data, 'bulan' => $request['bulan'], 'status' => $request['status'], 'semester' => $request['periode_id']]);
        return $pdf->stream("Laporan-" . $request['status'] . ".pdf");
    }
}
