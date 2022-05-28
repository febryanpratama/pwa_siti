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
                <a href="{{ url('admin/siswa/form-siswa') }}" class="btn btn-info float-right">+ Tambah Siswa</a>
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
                        <th>#</th>
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
                    @foreach ($data as $item=>$key)
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
                                <button class="btn btn-sm btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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

  <div class="modal fade" id="formemodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Your modal title here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('admin/siswa') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">NISN</label>
                          <input type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" placeholder="Masukkan NISN">
                        </div>
                        @error('nisn')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">NIS</label>
                          <input type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" placeholder="Masukkan NIS">
                        </div>
                        @error('nis')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nama Siswa</label>
                          <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" required name="nama_siswa" placeholder="Masukkan Nama Siswa">
                        </div>
                        @error('nama_siswa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                        <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">NIK Siswa</label>
                          <input type="number" class="form-control @error('nik_siswa') is-invalid @enderror" required name="nik_siswa" placeholder="Masukkan NIK Siswa">
                        </div>
                        @error('nik_siswa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">No KK Siswa</label>
                          <input type="number" class="form-control @error('nokk_siswa') is-invalid @enderror" required name="nokk_siswa" placeholder="Masukkan No KK Siswa">
                        </div>
                        @error('nokk_siswa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Tempat Lahir</label>
                          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                        </div>
                        @error('tempat_lahir')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="input-1">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir">
                        </div>
                        @error('tanggal_lahir')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="input-1">Agama</label>
                            <select name="agama" id="" class="form-control @error('agama') is-invalid @enderror">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                        @error('agama')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="input-1">Anak Ke</label>
                            <select name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('anak_ke')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Asal Sekolah</label>
                          <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" required name="asal_sekolah" placeholder="Masukkan Asal Sekolah">
                        </div>
                        @error('asal_sekolah')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nomor Ujian SMP</label>
                          <input type="number" class="form-control @error('nomor_ujian_smp') is-invalid @enderror" required name="nomor_ujian_smp" placeholder="Masukkan Nomor Ujian SMP">
                        </div>
                        @error('nomor_ujian_smp')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nomor Ijazah</label>
                          <input type="number" class="form-control @error('nomor_ijazah') is-invalid @enderror" required name="nomor_ijazah" placeholder="Masukkan Nomor Ijazah">
                        </div>
                        @error('nomor_ijazah')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nomor SKHUN</label>
                          <input type="number" class="form-control @error('nomor_skhun') is-invalid @enderror" required name="nomor_skhun" placeholder="Masukkan Nomor SKHUN">
                        </div>
                        @error('nomor_skhun')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Telpon Siswa</label>
                          <input type="number" class="form-control @error('telpon_siswa') is-invalid @enderror" required name="telpon_siswa" placeholder="Masukkan Nomor Telpon Siswa">
                        </div>
                        @error('telpon_siswa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nama Orang Tua Siswa</label>
                          <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" required name="nama_ortu" placeholder="Masukkan Nama Orang Tua Siswa">
                        </div>
                        @error('nama_ortu')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nomor Telpon Orang Tua</label>
                          <input type="number" class="form-control @error('telpon_ortu_siswa') is-invalid @enderror" required name="telpon_ortu_siswa" placeholder="Masukkan Nomor Telpon Orang Tua Siswa">
                        </div>
                        @error('telpon_ortu_siswa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nilai Ujian Bahasa Indonesia</label>
                          <input type="number" class="form-control @error('bahasa_indonesia') is-invalid @enderror" required name="bahasa_indonesia" placeholder="Contoh: 78.90">
                        </div>
                        @error('bahasa_indonesia')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nilai Ujian Bahasa Inggris</label>
                          <input type="number" class="form-control @error('bahasa_inggris') is-invalid @enderror" required name="bahasa_inggris" placeholder="Contoh: 78.90">
                        </div>
                        @error('bahasa_inggris')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nilai Ujian Matematika</label>
                          <input type="number" class="form-control @error('matematika') is-invalid @enderror" required name="matematika" placeholder="Contoh: 78.90">
                        </div>
                        @error('matematika')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="input-1">Nilai Ujian IPA</label>
                          <input type="number" class="form-control @error('ipa') is-invalid @enderror" required name="ipa" placeholder="Contoh: 78.90">
                        </div>
                        @error('ipa')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="input-1">Alamat Siswa</label>
                          <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required cols="30" rows="5"></textarea>
                        </div>
                        @error('alamat')
                            <div class="text-muted text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info shadow-info px-5 form-control" ><i class="icon-lock"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection