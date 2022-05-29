@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Form Data Tahun Ajaran</h4>

        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button class="btn btn-outline-success btn-block m-1" data-toggle="modal" data-target="#successmodal">Tambah Data</button>
                {{-- <a href="{{ url('admin/siswa/form-siswa') }}" class="btn btn-info float-right">+ Tambah Siswa</a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
            <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered text-center">
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
                                <button class="btn btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                  </svg>
                                </button>
                                <button class="btn btn-outline-danger">
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

                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="modal fade" id="successmodal">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tahunajaran.tambah') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="input-1">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran">
                     </div>
                     <div class="form-group">
                        <label for="input-1">Semester</label>
                        <select name="semester" id="" class="form-control ">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>

                     </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success  px-5 float-right "><i class="icon"></i>+ Tambah Data</button>
                        </div>
                        </div>
                </form>
            </div>
          </div>
        </div>
      </div>


@endsection
