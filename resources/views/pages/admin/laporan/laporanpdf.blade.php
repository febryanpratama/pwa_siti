<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
                table, td, th {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        tr > th {
            font-size: 12px;
        }
        tr > td {
            font-size: 10px;
            /* fonw */
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
</head>
<body>
    <h5 style="text-align: center">LAPORAN PEMBAYARAN SPP SISWA/SISWI <br>
SMA TAMAN MULIA KUBU RAYA <br>
SEMESTER {{ strtoupper(App\Helpers\Format::getgenapganjil($semester)) }} TAHUN AJARAN {{ strtoupper(App\Helpers\Format::periode($semester)) }}</h5>
<h5>Kelas : {{ App\Helpers\Format::getKelas(@$data[0]->kelas_id) }}</h5>
    <table style="border: 2px solid black;width: 100%;margin: auto">
        
        <thead>
            <tr style="text-align: center">
                <th rowspan="2" style="text-align: center;">NO</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">Nama</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 50px">Nominal Bayar</th>
                <th colspan="6" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">Bulan</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">Total Bayar</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">Sisa Bayar</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">Ket</th>
            </tr>
            <tr>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">JULI</th>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">AGUSTUS</th>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">SEPTEMBER</th>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">OKTOBER</th>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">NOVEMBER</th>
                <th style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">DESEMBER</th>
            </tr>
        </thead>
        <tbody>

            @php
                $no = 1;
            @endphp
            @foreach (@$data as $item=>$value)

                <tr>
                    <td style="text-align:center;width:20px">{{ $no++ }}</td>
                    <td style="text-align:center">{{ $value->siswa->nama_siswa }}</td>
                    <td style="text-align: center;">
                        {{ number_format(App\Helpers\Format::getNominalBayar($value->kelas_id)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 7)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 8)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 9)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 10)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 11)) }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format(@App\Helpers\Format::getDataSppBulan($value->siswa_id, $semester, 12)) }}
                    </td>
                    <td style="text-align: center">{{  number_format(@App\Helpers\Format::getDataSppBulanTotalGanjil($value->siswa_id, $semester)) }}</td>
                    <td style="text-align: center">{{  number_format(@App\Helpers\Format::getDataSppBulanSisaGanjil($value->siswa_id, $semester)) }}</td>
                    <td>{{ $value->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <tr>
                    <td colspan="9" style="text-align: center">TOTAL</td>
                    <td style="text-align: center">{{ number_format(@App\Helpers\Format::getTotalPembayaranAll($value->kelas_id, $semester)) }}</td>
                    <td style="text-align: center">{{ number_format(@App\Helpers\Format::getSisaPembayaranAll($value->kelas_id, $semester)) }}</td>
                    <td></td>
                </tr>
            </tr>
        </tfoot>
    </table>
</body>
</html>