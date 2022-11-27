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
    public function __construct($data)
    {
        $this->data = $data;
        // $this->bulan = $bulan;
        // $this->tahun = $tahun;
    }

    public function view(): View
    {
        return view('pages.admin.laporan.excel', [
            'data'  => $this->data,
            // 'tahun' => $this->tahun
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'A' => 0
        ];
    }
}
