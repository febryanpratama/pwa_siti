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
            <h5>Laporan Tunggakan Siswa Yang Belum Membayar SPP <br> Pada Bulan Jul Periode {{ App\Helpers\Format::periode($semester) }}</h5>

        </div>
    @endif
    {{-- <h1>{{ dd($status) }}</h1> --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
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
                    <td>{{ Carbon\Carbon::parse($item->tanggal)->format('M') }}</td>
                    <td>{{ number_format($item->nominal_bayar) }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr style="text-align: center">
                <td colspan="3">Jumlah</td>
                <td>{{ number_format($data->sum('nominal_bayar')) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>