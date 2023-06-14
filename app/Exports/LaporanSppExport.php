<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class LaporanSppExport implements FromView, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // protected $this->data;
    protected $data;
    protected $semester;
    protected $tahun;
    protected $thn;
    public function __construct($data, $semester, $tahun, $thn_semester)
    {
        $this->data = $data;
        $this->semester = $semester;
        $this->tahun = $tahun;
        $this->thn = $thn_semester;
        // $this->bulan = $bulan;
        // $this->tahun = $tahun;
    }

    public function view(): View
    {
        if ($this->thn == "Genap") {
            # code...
            dd("Genap");
            return view('pages.admin.laporan.excelGanjil', [
                'data'  => $this->data,
                'semester' => $this->semester,
                'tahun' => $this->tahun
            ]);
        } else {
            // dd("Ganjil");
            return view('pages.admin.laporan.excel', [
                'data'  => $this->data,
                'semester' => $this->semester,
                'tahun' => $this->tahun
            ]);
        }
    }

    public function columnFormats(): array
    {
        return [
            'A' => 0
        ];
    }
}
