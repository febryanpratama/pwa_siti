<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border: 2px solid black;
            width: 100%;
            margin: auto
        }

        tr,
        th,
        td {
            font-family: Arial;
            border: 2px solid black;
            border-collapse: collapse
        }

        th,
        td {
            text-align: center;
        }

        tr>th {
            font-size: 12px;
        }

        tr>td {
            font-size: 10px;
            /* fonw */
        }
        .text-center{
            margin: auto;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
</head>
<body>
    <table style="border: 2px solid black;width: 100%;margin: auto">
        {{-- {{ dd($data) }} --}}
        <thead>
            <tr>
                <th colspan="19" style="text-align: center;font-family: Arial;">DAFTAR PEMBAYARAN KOMITE SISWA SMA TAMAN MULIA SEMESTER GANJIL</th>
            </tr> 
            <tr>
                <th colspan="19" style="text-align: center;font-family: Arial;">TAHUN 2020 / 2021</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="2">KELAS : XI IIS </th>
            </tr>
            <tr>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">NO</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 300px">NAMA SISWA</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">L/P</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 250px">TUNG KLS SBLMNYA</th>
                <th rowspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 250px">DAF ULANG / PINDAHAN</th>
                <th colspan="12" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse">BULAN</th>
            </tr>
            <tr>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">JULI</th>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">AGUSTUS</th>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">SEPTEMBER</th>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">OKTOBER</th>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">NOVEMBER</th>
                <th colspan="2" style="text-align: center;font-family: Arial;border: 2px solid black;border-collapse: collapse; width: 100px">DESEMBER</th>
            </tr>
        </thead>
        <tbody>

            {{-- {{ dd($data) }} --}}
            @foreach ($data as $item=>$value)
                <tr>
                    <td style="border: 2px solid black;border-collapse: collapse">{{ $item+1 }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse">{{ $value->siswa->nama_siswa }}</td>
                    {{-- <td>{{ @$value->guru->nama_guru }}</td> --}}
                    <td style="text-align: center;border: 2px solid black;border-collapse: collapse">
                        @switch($value->siswa->jenis_kelamin)
                            @case('Laki-Laki')
                                L
                                @break
                            @case('Perempuan')
                                P
                                @break
                            @default
                        @endswitch
                    </td>
                    <td style="text-align: right;border: 2px solid black;border-collapse: collapse">{{ $value->sisa_bayar }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse">0</td>
                    {{-- {{ dd(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,7)) }} --}}
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,7) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,7))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,7) }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,8) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,8))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,8) }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,9) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,9))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,9) }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,10) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,10))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,10) }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,11) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,11))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,11) }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;text-align:center">{{  @App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,12) == null ? '' : \Carbon\Carbon::parse(@App\Helpers\Format::getTanggal($value->siswa_id,$value->kelas_id,12))->format('d/m/y') }}</td>
                    <td style="border: 2px solid black;border-collapse: collapse;width: 100px;text-align:center">{{ @App\Helpers\Format::getDataSpp($value->siswa_id,$value->kelas_id,12) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>