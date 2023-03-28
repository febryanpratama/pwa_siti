@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Data {{ $title }}</h3>
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
                                    <h4 class="card-title">List Data</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#large">
                                            + Add {{ $title }}
                                        </button>
                                        {{-- <a href="{{ url('admin/siswa/form-siswa') }}">
                                            <button class="btn btn-info">Add {{ $title }}</button>
                                        </a> --}}
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
                                                        <th>Tahun Ajaran</th>
                                                        <th>Semester</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item=>$key )
                                                        <tr>
                                                            <td>{{ $item+1 }}</td>
                                                            <td>{{ $key->tahun_ajaran }}</td>
                                                            <td>
                                                                @switch($key->semester)
                                                                    @case('Ganjil')
                                                                        <div class="badge badge-warning">
                                                                            {{ $key->semester }}
                                                                        </div>
                                                                        @break
                                                                    @case('Genap')
                                                                        <div class="badge badge-success">
                                                                            {{ $key->semester }}
                                                                        </div>
                                                                        @break
                                                                    @default

                                                                @endswitch
                                                            <td>
                                                                <button class="btn btn-outline-info" data-toggle="modal" data-target="#editmodal{{ $key->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                                </button>
                                                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusmodal{{ $key->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                            
                                                    
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tahun Ajaran</th>
                                                        <th>Semester</th>
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

    @foreach ($data as $item=>$key)
        <div class="modal fade" id="hapusmodal{{ $key->id }}">
                                                                <div class="modal-dialog ">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Data {{ $title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('tahunajaran.delete') }}" enctype="multipart/form-data">
                                                                            <input type="hidden" value="{{ $key->id }}" name="tahunajaran_id">
                                                                            @csrf
                                                                            
                                                                            <div class="form-group row">
                                                                                <div class="col-md-12">
                                                                                    Apakah Anda yakin ingin menghapus data tahun Ajaran {{ $key->tahun_ajaran }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-2 col-form-label"></label>
                                                                                <div class="col-sm-10">
                                                                                    <button type="submit" class="btn btn-danger  px-2 float-right "><i class="icon"></i>+ Hapus Data</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="editmodal{{ $key->id }}">
                                                                <div class="modal-dialog ">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Data {{ $title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('tahunajaran.update') }}" enctype="multipart/form-data">
                                                                            <input type="hidden" name="tahunajaran_id" value="{{ $key->id }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="input-1">Tahun Ajaran</label>
                                                                                <input type="text" class="form-control" name="tahun_ajaran" value="{{ $key->tahun_ajaran }}" placeholder="Masukkan Tahun Ajaran. ex: 2020/2021">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="input-1">Semester</label>
                                                                                <select name="semester" id="" class="form-control ">
                                                                                    <option value="" disabled> == Pilih == </option>
                                                                                    <option value="Ganjil" {{ $key->semester ? "selected" : '' }}>Ganjil</option>
                                                                                    <option value="Genap" {{ $key->semester ? "selected" : '' }}>Genap</option>
                                                                                </select>
                                                        
                                                                            </div>
                                                        
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-2 col-form-label"></label>
                                                                                <div class="col-sm-10">
                                                                                    <button type="submit" class="btn btn-success  px-5 float-right "><i class="icon"></i>+ Edit Data</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade text-left" id="large" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">
                        Add {{ $title }}
                    </h4>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/tahun-ajaran') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Tahun Ajaran</label>
                                    <input type="text" class="form-control" name="tahun_ajaran" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Semester</label>
                                    <select name="semester" class="form-control">
                                        <option value="" selected disabled> == Pilih == </option>
                                        <option value="Ganjil"> Ganjil </option>
                                        <option value="Genap"> Genap </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-secondary"
                        data-dismiss="modal">Close</button>
                        <button type="submit"
                        class="btn btn-danger">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
