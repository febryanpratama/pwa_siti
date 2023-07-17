<html>
<head>
    <title>Laporan Data Barang</title>
    <style type="text/css">
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
</head>
<body>
    @if ($status == 'Belum Lunas')
        <div style="text-align: center">
            <h5>LAPORAN TUNGGAKAN SISWA YANG BELUM MEMBAYARAN SPP <br> PADA BULAN {{ strtoupper(App\Helpers\Format::formatBulan($bulan)) }} PERIODE {{ App\Helpers\Format::periode($semester) }}</h5>

        </div>
    @endif
    @if ($status == 'Cicilan')
        <div style="text-align: center">
            <h5>LAPORAN PEMBAYARAN SISWA YANG MEMBAYAR SPP SECARA CICILAN <br> Pada Bulan {{ strtoupper(App\Helpers\Format::formatBulan($bulan)) }} PERIODE {{ App\Helpers\Format::periode($semester) }}</h5>

        </div>
    @endif
    @if ($status == 'Lunas')
        <div style="text-align: center">
            <h5>LAPORAN PEMBAYARAN SISWA YANG MEMBAYAR SPP <br> PADA BULAN {{ strtoupper(App\Helpers\Format::formatBulan($bulan)) }} PERIODE {{ App\Helpers\Format::periode($semester) }}</h5>

        </div>
    @endif
    {{-- <h1>{{ dd($status) }}</h1> --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Bulan</th>
                <th>Rp</th>
                <th >Ket</th>
            </tr>
            <tr>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 1;
            @endphp
            @foreach ($data as $key=>$item)
                <tr style="text-align: center">
                    <td>{{ $total++ }}</td>
                    <td>{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ App\Helpers\Format::getKelas($item->kelas_id) }}</td>
                    <td>{{ strtoupper(Carbon\Carbon::parse($item->tanggal)->format('M')) }}</td>
                    <td>{{ number_format($item->nominal_bayar) }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr style="text-align: center">
                <td colspan="4">Jumlah</td>
                <td>{{ number_format($data->sum('nominal_bayar')) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>