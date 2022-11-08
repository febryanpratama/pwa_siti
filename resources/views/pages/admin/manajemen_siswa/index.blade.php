@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Stiped Color Tables</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Rukada</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stiped Color Tables</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ url('admin/siswa/form-siswa') }}" class="btn btn-info float-right">+ Tambah User</a>
            </div>
        </div>
    </div>
  <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
            <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Telpon Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Status Siswa</th>
                        <th>Nama Ortu</th>
                        <th>Telpon Ortu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $item=>$key)
                        <tr>
                            <td>{{ $item+1 }}</td>
                            <td>{{ $key->nama_siswa }}</td>
                            <td>{{ $key->telpon_siswa }}</td>
                            <td>{{ $key->jenis_kelamin }}</td>
                            <td>{{ $key->alamat }}</td>
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

                                @endswitch
                            </td>
                            <td>{{ $key->nama_ortu }}</td>
                            <td>{{ $key->telpon_ortu_siswa }}</td>
                            <td>

                                <a href="/admin/siswa/form-edit/{{ $key->id }}" class="btn btn-sm btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusmodal{{ $key->id }}">
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
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('Formsiswa.delete') }}" enctype="multipart/form-data">
                                                <input type="hidden" value="{{ $key->id }}" name="siswa_id">
                                                 @csrf

                                                 <div class="form-group row">
                                                     <div class="col-md-12">
                                                        Apakah Anda yakin ingin menghapus data siswa {{ $key->nama_siswa}}
                                                     </div>
                                                 </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-success  px-5 float-right "><i class="icon"></i>+ Hapus Data</button>
                                                    </div>
                                                 </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Telpon Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
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


@endsection
