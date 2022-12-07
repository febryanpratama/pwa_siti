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
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Kelas</label>
                                                        <select name="kelas_id" class="form-control" id="" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            
                                                            @foreach ($kelas as $kelas=>$k)
                                                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Semester</label>
                                                        <select name="semester" class="form-control" id="" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            <option value="GANJIL">GANJIL</option>
                                                            <option value="GENAP">GENAP</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Tahun</label>
                                                        <select name="tahun" class="form-control" id="" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            @for ($i = 2021; $i < 2030; $i++)
                                                                <option value="{{ $i }}" @if ($i == date('Y')) selected @endif>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label" style="color: white"> Cetak </label>
                                                        <button type="submit" class="form-control btn btn-info">Cetak</button>
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
                                                        <th>Nama Bendahara</th>
                                                        <th>Nominal Pembayaran</th>
                                                        <th>Status Pembayaran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ dd($data) }} --}}
                                                    @foreach ($data as $item=>$key)
                                                    <tr>
                                                        <td>{{ $item+1 }}</td>
                                                        <td>{{ $key->siswa->nama_siswa }}</td>
                                                        <td>{{ $key->bendahara_id }}</td>
                                                        <td>{{ $key->total_pembayaran }}</td>
                                                        <td>
                                                            @switch($key->status_pembayaran)
                                                                @case('Lunas')
                                                                    <div class="badge badge-success">Lunas</div>
                                                                    @break
                                                                @case('Cicilan')
                                                                    <div class="badge badge-warning">Cicilan</div>
                                                                    @break
                                                                @default
                                                                    
                                                            @endswitch
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Nama Bendahara</th>
                                                        <th>Nominal Pembayaran</th>
                                                        <th>Status Pembayaran</th>
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