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
                                                        <th>No</th>
                                                        <th>Nama Wali Kelas</th>
                                                        <th>Kelas</th>
                                                        <th>Nominal Spp</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key=>$item)
                                                    {{-- {{ dd($item->kelas) }} --}}
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $item->guru->nama_guru }}</td>
                                                        <td>{{ $item->kelas }} {{ $item->nama_kelas }}</td>
                                                        <td>{{ number_format($item->nominal) }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/kelas/'.$item->id.'/detail') }}" class="btn btn-sm btn-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                </svg>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-info " data-toggle="modal"
                                                                data-target="#edit{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal"
                                                                data-target="#destroy{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 29px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                                {{-- <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Wali Kelas</th>
                                                        <th>Kelas</th>
                                                        <th>Nominal Spp</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot> --}}
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

    <!-- Modal -->

    @foreach ($data as $key=>$item)
        <div class="modal fade text-left" data-backdrop="false" id="destroy{{ $item->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel17"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel17">
                                                                        Hapus {{ $title }}
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('admin/kelas/destroy') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="kelas_id" value="{{ $item->id }}" id="">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <p> Apakah Anda yakin akan menghapus data {{ $item->kelas }}/{{ $item->nama_kelas }}</p>
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
                                                    <div class="modal fade text-left" data-backdrop="false" id="edit{{ $item->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel17"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel17">
                                                                        Ubah {{ $title }}
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('admin/kelas/update') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="kelas_id" value="{{ $item->id }}" id="">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="label-control">Wali Kelas</label>
                                                                                    <select name="guru_id" class="form-control">
                                                                                        <option value="" selected disabled> == Pilih == </option>
                                                                                        @foreach ($guru as $gr)
                                                                                            <option value="{{ $gr->id }}" {{ $gr->guru_id ? 'selected' : ''}}>{{ $gr->nama_guru }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="label-control">Nominal SPP</label>
                                                                                    <input type="number" name="nominal" value="{{ $item->nominal }}" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="label-control">Kelas</label>
                                                                                    <input type="text" class="form-control" name="kelas" placeholder="ex: X, XI, XII" value="{{ $item->kelas }}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="label-control">Nama Kelas</label>
                                                                                    <input type="text" class="form-control" name="nama_kelas" value="{{ $item->nama_kelas }}" placeholder="ex: A, B, C, - Z" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                        class="btn btn-danger">Edit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
    @endforeach
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
                <form action="{{ url('admin/kelas') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Wali Kelas</label>
                                    <select name="guru_id" class="form-control">
                                        <option value="" selected disabled> == Pilih == </option>
                                        @foreach ($guru as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Nominal SPP</label>
                                    <input type="number" name="nominal" class="form-control" required>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" placeholder="ex: X, XI, XII" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Nama Kelas</label>
                                    <input type="text" class="form-control" name="nama_kelas" placeholder="ex: A, B, C, - Z" required>
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
