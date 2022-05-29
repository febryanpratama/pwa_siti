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
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item=>$key )
                        <tr>
                            <td>{{ $item+1 }}</td>
                            <td>{{ $key->tahun_ajaran }}</td>
                            <td>{{ $key->semester }}</td>
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
