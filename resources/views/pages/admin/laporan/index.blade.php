@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ $title }} DataTable</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ $title }} DataTable
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
                                        <div class="col-md-6">
                                            <h2 class="">List Data</h2>
                                        </div>
                                        <div class="col-md-6">
                                            @role('Admin')
                                                <form action="{{ url('admin/laporan-spp/excel') }}" method="POST">
                                                    @endrole
                                            @role('Kepsek')
                                                <form action="{{ url('kepsek/laporan-spp/excel') }}" method="POST">
                                                    @endrole
                                                    @csrf
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Tanggal Mulai</label>
                                                        <input type="date" class="form-control" name="tanggal_mulai" required>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Tanggal Selesai</label>
                                                        <input type="date" class="form-control" name="tanggal_selesai" required>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label">Kelas</label>
                                                        <select name="kelas_id" class="form-control" id="" required>
                                                            <option value="" selected disabled> == PILIH == </option>
                                                            
                                                            @foreach ($kelas as $kelas=>$k)
                                                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="" class="control-label" style="color: white"> Submit </label>
                                                        <button type="submit" class="form-control btn btn-info">Submit</button>
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
                                                        <th>#</th>
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
                                                        <th>#</th>
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