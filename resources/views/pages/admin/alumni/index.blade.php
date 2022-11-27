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
                                                        <th>Nama Siswa</th>
                                                        <th>Telpon Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>Kekurangan Pembayaran <br> Spp x Bulan</th>
                                                        <th>Status</th>

                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                    {{-- {{ dd($item) }} --}}
                                                    <tr>
                                                        <td>{{ $item+1 }}</td>
                                                        <td>{{ $key->nama_siswa }}</td>
                                                        <td>{{ $key->telpon_siswa }}</td>
                                                        <td>{{ $key->jenis_kelamin }}</td>
                                                        <td>{{ $key->alamat }}</td>
                                                        <td>{{ App\Helpers\Format::checkSpp($key->id) }}</td>
                                                        <td>
                                                            @if (App\Helpers\Format::checkSpp($key->id) > 0)
                                                                <span class='badge badge-danger'>Belum Lunas</span>
                                                            @else
                                                                <span class='badge badge-success'>Lunas</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info " data-toggle="modal" title="Edit Data"
                                                                data-target="#edit{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" title="Hapus Data"
                                                                data-target="#destroy{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 29px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="tambahIjazah{{ $key->id }}" tabindex="-1">
                                                        <div class="modal-dialog ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Ambil Ijazah</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                <form method="POST" action="{{ url("admin/alumni/store-ijazah") }}" enctype="multipart/form-data">
                                                                    <input type="hidden" value="{{ $key->id }}" name="siswa_id">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="" class="control-label">Add Nomor Ijazah</label>
                                                                                <input type="text" name="nomor_ijazah" class="form-control" placeholder="Masukkan Nomor Ijazah">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="" class="control-label">Add Nomor SKHUN</label>
                                                                                <input type="text" name="nomor_skhun" class="form-control" placeholder="Masukkan Nomor SKHUN">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="" class="control-label">Guru Yang Menyerahkan</label>
                                                                                <select name="guru_id" id="" class="form-control">
                                                                                    <option value="" selected disabled> == Pilih == </option>
                                                                                    @foreach ($guru as $item=>$key)
                                                                                        <option value="{{ $key->id }}">{{ $key->nama_guru }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="" class="control-label">Tanggal Penyerahan</label>
                                                                                <input type="date" name="tanggal_penyerahan" class="form-control">
                                                                            </div>
                                                                        </div>

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
                                                    <div class="modal fade" id="pelunasan{{ $key->id }}" tabindex="-1">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title">Pelunasan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST" action="{{ url("admin/alumni/pelunasan") }}" enctype="multipart/form-data">
                                                                        <input type="hidden" value="{{ $key->id }}" name="siswa_id">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="" class="control-label">Sisa Pembayaran SPP</label>
                                                                                    <input type="text" name="nomor_ijazah" class="form-control" value="{{ number_format(App\Helpers\Format::getAllSisaSpp($key->id), 0) }}" placeholder="Masukkan Nomor Ijazah" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label"></label>
                                                                            <div class="col-sm-10">
                                                                                <button type="submit" class="btn btn-primary  px-5 float-right "><i class="icon"></i>+ Pelunasan</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Telpon Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>Kekurangan Pembayaran <br> Spp x Bulan</th>
                                                        <th>Status</th>

                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="large" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                <form action="{{ url('admin/guru') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">Nama Guru</label>
                                    <input type="text" class="form-control" name="nama_guru" placeholder="Febryan Pratama" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">NIP</label>
                                    <input type="number" class="form-control" name="nip" placeholder="ex: 12767126" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">Nomor HP</label>
                                    <input type="number" class="form-control" name="no_hp" placeholder="ex: 62871288827" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="label-control">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
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
