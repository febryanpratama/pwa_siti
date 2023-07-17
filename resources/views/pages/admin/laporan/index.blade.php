@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Tabel Data {{ $title }}</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Data {{ $title }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Base style table -->
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4">
                                            <h2 class="">List Data</h2>
                                        </div>
                                        <div class="col-sm-8 col-md-8">
                                            @role('Admin')
                                                <form action="{{ url('admin/laporan-spp/excel') }}" method="POST">
                                                    @endrole
                                            @role('Kepsek')
                                                <form action="{{ url('kepsek/laporan-spp/excel') }}" method="POST">
                                                    @endrole
                                            @role('Bendahara')
                                                <form action="{{ url('bendahara/laporan-spp/excel') }}" method="POST">
                                                    @endrole
                                                    @csrf
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-sm-6 col-md-2">
                                                        <label for="" class="control-label">Kelas</label>
                                                        <select name="kelas_id" class="form-control" id="kelas" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            
                                                            @foreach ($kelas as $kelas=>$k)
                                                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <label for="" class="control-label">Periode</label>
                                                        <select name="semester" class="form-control" id="semester" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            @foreach ($ta as $t)
                                                            <option value="{{ $t->id }}">{{ $t->semester }}, {{ $t->tahun_ajaran }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-2">
                                                        <label for="" class="control-label" style="color: white"> Cetak </label>
                                                        <button type="submit" class="form-control btn btn-info btn-block btn-wrap-text" style="">Cetak</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-2 ">
                                                        <label for="" class="control-label" style="color: white"> Cari </label>
                                                        <button type="button" class="form-control btn btn-danger btn-block btn-wrap-text" style="" id="cari">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr width="50%">
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            {{-- <h2 class="">List Data</h2> --}}
                                        </div>
                                        <div class="col-sm-8 col-md-8">
                                            @role('Admin')
                                                <form action="{{ url('admin/laporan-spp/pdf') }}" method="POST">
                                                    @endrole
                                            @role('Kepsek')
                                                <form action="{{ url('kepsek/laporan-spp/pdf') }}" method="POST">
                                                    @endrole
                                            @role('Bendahara')
                                                <form action="{{ url('bendahara/laporan-spp/pdf') }}" method="POST">
                                                    @endrole
                                                    @csrf
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-sm-6 col-md-2">
                                                        <label for="" class="control-label">Bulan</label>
                                                        <select name="bulan" class="form-control" id="bulan" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-2">
                                                        <label for="" class="control-label">Status</label>
                                                        <select name="status" class="form-control" id="status" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            
                                                            <option value="Lunas">Lunas</option>
                                                            <option value="Cicilan">Cicilan</option>
                                                            <option value="Belum Lunas">Belum Lunas</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <label for="" class="control-label">Periode</label>
                                                        <select name="periode_id" class="form-control" id="periode" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            @foreach ($ta as $t)
                                                            <option value="{{ $t->id }}">{{ $t->semester }}, {{ $t->tahun_ajaran }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-2">
                                                        <label for="" class="control-label" style="color: white"> Cetak </label>
                                                        <button type="submit" class="form-control btn btn-info btn-block btn-wrap-text" style="">Cetak</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-2 ">
                                                        <label for="" class="control-label" style="color: white"> Cari </label>
                                                        <button type="button" class="form-control btn btn-danger btn-block btn-wrap-text" style="" id="cari-status">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        {{-- <p class="card-text">The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</p> --}}
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jumlah SPP Lunas</th>
                                                        <th>Jumlah SPP Belum Lunas</th>
                                                        <th>Jumlah SPP Cicilan</th>
                                                        <th>Nominal Harus Dibayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ dd($data) }} --}}
                                                    @php
                                                        $a = 1
                                                    @endphp
                                                    @foreach ($data as $item=>$key)
                                                    {{-- {{ dd($key[0]->siswa->nama_siswa) }} --}}
                                                        <tr>
                                                            <td>{{ $a++ }}</td>
                                                            <td>{{ @$key[0]->siswa->nama_siswa}}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Lunas') }}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Belum Lunas') }}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Cicilan') }}</td>
                                                            <td>{{ number_format(App\Helpers\Format::Unpaid(@$key[0]->siswa_id)) }}</td>
                                                        </tr>
                                                            
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    {{-- {{ dd( Auth::user()->roles->pluck('name')[0]) }} --}}
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jumlah SPP Lunas</th>
                                                        <th>Jumlah SPP Belum Lunas</th>
                                                        <th>Jumlah SPP Cicilan</th>
                                                        <th>Nominal Harus Dibayar</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Base style table -->
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            $('#cari').click(function(){
                var kelas = $('#kelas').val();
                var semester = $('#semester').val();
                // var tahun = $('#tahun').val();

                const role = `{{ Auth::user()->roles->pluck('name')[0] }}`

                // console.log(kelas, semester, tahun)
                if (semester == null) {
                    console.log('Semua data harus diisi');
                }else{
                    console.log(semester);
                    if (role == 'Admin') {
                        window.location.href = "{{ url('admin/laporan-spp') }}?kelas="+kelas+"&semester_id="+semester;
                        
                    }else if (role == 'Bendahara'){
                        
                        window.location.href = "{{ url('bendahara/laporan-spp') }}?kelas="+kelas+"&semester_id="+semester;
                    }else{
                        window.location.href = "{{ url('kepsek/laporan-spp') }}?kelas="+kelas+"&semester_id="+semester;
                    }
                }
            })

            $('#cari-status').click(function(){
                var bulan = $('#bulan').val();
                var status = $('#status').val();
                var periode = $('#periode').val();

                // console.log(status, periode)
                const role = `{{ Auth::user()->roles->pluck('name')[0] }}`
                if (semester == null) {
                    console.log('Semua data harus diisi');
                }else{
                    console.log(semester);
                    if (role == 'Admin') {
                        window.location.href = "{{ url('admin/laporan-spp') }}?status="+status+"&periode_id="+periode+"&bulan="+bulan;
                        
                    }else if (role == 'Bendahara'){
                        
                        window.location.href = "{{ url('bendahara/laporan-spp') }}?status="+status+"&periode_id="+periode+"&bulan="+bulan;
                    }else{
                        window.location.href = "{{ url('kepsek/laporan-spp') }}?status="+status+"&periode_id="+periode+"&bulan="+bulan;
                    }
                }
            })
        })
    </script>
@endsection