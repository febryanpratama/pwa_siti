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
                                                        <label for="" class="control-label">Semester</label>
                                                        <select name="semester" class="form-control" id="semester" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            <option value="GANJIL">GANJIL</option>
                                                            <option value="GENAP">GENAP</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <label for="" class="control-label">Tahun</label>
                                                        <select name="tahun" class="form-control" id="tahun" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            @for ($i = 2021; $i < 2030; $i++)
                                                                <option value="{{ $i }}" @if ($i == date('Y')) selected @endif>{{ $i }}</option>
                                                            @endfor
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
                                                    @foreach ($data as $item=>$key)
                                                    {{-- {{ dd($key[0]->siswa->nama_siswa) }} --}}
                                                        <tr>
                                                            <td>{{ $item+1 }}</td>
                                                            <td>{{ @$key[0]->siswa->nama_siswa}}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Lunas') }}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Belum Lunas') }}</td>
                                                            <td>{{ App\Helpers\Format::GetDetail(@$key[0]->siswa_id, 'Cicilan') }}</td>
                                                            <td>{{ number_format(App\Helpers\Format::Unpaid(@$key[0]->siswa_id)) }}</td>
                                                        </tr>
                                                            
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
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
                var tahun = $('#tahun').val();

                console.log(kelas, semester, tahun)
                if (semester == null || tahun == null) {
                    console.log('Semua data harus diisi');
                }else{
                    console.log("kelas");
                    window.location.href = "{{ url('admin/laporan-spp') }}?kelas="+kelas+"&semester="+semester+"&tahun="+tahun;
                }
            })
        })
    </script>
@endsection