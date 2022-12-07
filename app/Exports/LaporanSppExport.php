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
    public function __construct($data, $semester, $tahun)
    {
        $this->data = $data;
        $this->semester = $semester;
        $this->tahun = $tahun;
        // $this->bulan = $bulan;
        // $this->tahun = $tahun;
    }

    public function view(): View
    {
        if ($this->semester == "GENAP") {
            # code...
            return view('pages.admin.laporan.excel', [
                'data'  => $this->data,
                'semester' => $this->semester,
                'tahun' => $this->tahun
                // 'tahun' => $this->tahun
            ]);
        } else {
            return view('pages.admin.laporan.excelGanjil', [
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
