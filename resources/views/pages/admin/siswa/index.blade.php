@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ $title }}</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ $title }}
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
                                    <h4 class="card-title">List Data</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <a href="{{ url('admin/siswa/form-siswa') }}">
                                            <button class="btn btn-info">+ Add {{ $title }}</button>
                                        </a>
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
                                                        <th>NISN</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tanggal Lahir</th>
                                                        {{-- <th>Alamat</th> --}}
                                                        <th>Status Siswa</th>
                                                        <th>Nama Ortu</th>
                                                        <th>Telpon Ortu</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item=>$key)
                                                        <tr>
                                                            <td>{{ $item+1 }}</td>
                                                            <td>{{ $key->nama_siswa }}</td>
                                                            <td>{{ $key->nisn }}</td>
                                                            <td>{{ $key->jenis_kelamin }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($key->tanggal_lahir)->format('d M Y') }}</td>
                                                            {{-- <td>{{ $key->alamat }}</td> --}}
                                                            <td>
                                                                @switch($key->status)
                                                                    @case('Gratis')
                                                                        <div class="badge badge-warning">
                                                                            {{ $key->status }}
                                                                        </div>
                                                                        @break
                                                                        @case('Tidak Gratis')
                                                                        <div class="badge badge-info">
                                                                            {{ $key->status }}
                                                                        </div>

                                                                        @break
                                                                    @default
                                                                    <div class="badge badge-primary">
                                                                            {{ $key->status }}
                                                                    </div>
                                                                @endswitch
                                                            </td>
                                                            <td>{{ $key->nama_ortu }}</td>
                                                            <td>{{ $key->telpon_ortu_siswa }}</td>
                                                            <td class="d-flex"> 

                                                                <a href="/admin/siswa/form-edit/{{ $key->id }}" class="btn btn-sm btn-outline-primary mr-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" title="Detail" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
                                                                    </svg>

                                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg> --}}
                                                                </a>

                                                                <a href="/admin/siswa/form-edit/{{ $key->id }}" class="btn btn-sm btn-outline-info mr-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </a>

                                                                <button class="btn btn-sm btn-outline-danger mr-1" data-toggle="modal" data-target="#hapusmodal{{ $key->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                                <div class="modal fade" id="hapusmodal{{ $key->id }}">
                                                                    <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                        </div>
                                                                        <form action="{{ url('admin/siswa/delete') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="siswa_id" value="{{ $key->id }}" id="">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <p> Apakah Anda yakin akan menghapus data {{ $key->nama_siswa }}</p>
                                                                                    </div>
                                                                                </div>  
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn grey btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    </div>
                                                                </div>


                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>NISN</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Dob</th>
                                                        {{-- <th>Alamat</th> --}}
                                                        <th>Status Siswa</th>
                                                        <th>Nama Ortu</th>
                                                        <th>Telpon Ortu</th>
                                                        <th>Aksi</th>
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