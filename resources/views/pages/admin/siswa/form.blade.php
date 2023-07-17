@extends('layouts.app')



@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Form Tambah Data Siswa</h3>
            </div>
            {{-- {{ dd($) }} --}}
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Form Data Siswa</a>
                            </li>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ dd($data) }} --}}
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h4 class="card-title" id="basic-layout-colored-form-control">Form with Bordered Controls</h4> --}}
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    {{-- <div class="card-text">
                                        <p>You can always change the border color of the form controls using
                                            <code>border-*</code> class.</p>
                                    </div> --}}

                                    @if (@$data->id)
                                    <form class="form" action="{{ url('admin/siswa/update') }}" method="POST" enctype="multipart/form-data">
                                        {{-- @method('PUT') --}}
                                        <input type="hidden" name="siswa_id" value="{{ @$data->id }}">
                                    @else
                                    <form class="form" method="POST" action="{{ url('admin/siswa') }}" enctype="multipart/form-data">
                                    @endif
                                        @csrf
                                        <div class="form-body">

                                            <h4 class="form-section">
                                                <i class="ft-briefcase"></i>{{ $title }} Forms</h4>
                                            <div class="form-group">
                                                <label for="contactinput5">NISN</label>
                                                <input type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" value="{{ @$data->nisn }}" placeholder="Masukkan No NISN" />
                                            </div>

                                            <div class="form-group">
                                                <label for="contactinput5">NIS</label>
                                                <input type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" value="{{ @$data->nis }}" placeholder="Masukkan No NIS" />
                                            </div>

                                            <div class="form-group">
                                                <label for="contactinput5">Nama Siswa</label>
                                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" required name="nama_siswa" value="{{ @$data->nama_siswa }}" placeholder="Masukkan Nama Siswa">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            {{-- <div class="form-group">
                                                <label for="contactinput5">NIK Siswa</label>
                                                <input type="number" class="form-control @error('nik_siswa') is-invalid @enderror" required name="nik_siswa" placeholder="Masukkan No NIK Siswa">
                                            </div>

                                            <div class="form-group">
                                                <label for="contactinput5">KK Siswa</label>
                                                <input type="number" class="form-control @error('nokk_siswa') is-invalid @enderror" required name="nokk_siswa" placeholder="Masukkan No KK Siswa" />
                                            </div> --}}
                                            
                                            <div class="form-group">
                                                <label for="contactinput5">Status Siswa</label>
                                                <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                                    <option value="" selected="" disabled=""> == PILIH == </option>
                                                    <option value="Gratis">Gratis</option>
                                                    <option value="Tidak Gratis">Tidak Gratis</option>
                                                    <option value="Potongan">Potongan</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="contactinput5">Tempat Lahir</label>
                                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" value="{{ @$data->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Tanggal Lahir</label>
                                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Agama</label>
                                                <select name="agama" id="" class="form-control @error('agama') is-invalid @enderror">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                </select>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Anak Ke ?</label>
                                                <select name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror">
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Asal Sekolah</label>
                                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" required name="asal_sekolah" value="{{ @$data->asal_sekolah }}" placeholder="Masukkan Asal Sekolah">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Nomor Ujian SMP</label>
                                                <input type="number" class="form-control @error('nomor_ujian_smp') is-invalid @enderror" required name="nomor_ujian_smp" placeholder="Masukkan Nomor Ujian SMP">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Nomor Ijazah</label>
                                                <input type="number" class="form-control @error('nomor_ijazah') is-invalid @enderror" required name="nomor_ijazah" value="{{ @$data->nomor_ijazah }}" placeholder="Masukkan Nomor Ijazah">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Nomor SKHUN</label>
                                                <input type="number" class="form-control @error('nomor_skhun') is-invalid @enderror" required name="nomor_skhun" placeholder="Masukkan Nomor SKHUN">
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="contactinput5">Telpon Siswa</label>
                                                <input type="number" class="form-control @error('telpon_siswa') is-invalid @enderror" required name="telpon_siswa" value="{{ @$data->telpon_siswa }}" placeholder="Masukkan Nomor Telpon Siswa">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Nama Orang Tua Siswa</label>
                                                <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" required name="nama_ortu" value="{{ @$data->nama_ortu }}" placeholder="Masukkan Nama Orang Tua Siswa">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Nomor Telpon Orang Tua Siswa</label>
                                                <input type="number" class="form-control @error('telpon_ortu_siswa') is-invalid @enderror" required name="telpon_ortu_siswa" value="{{ @$data->telpon_ortu_siswa }}" placeholder="Masukkan Nomor Telpon Orang Tua Siswa">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="contactinput5">Nilai Ujian Bahasa Indonesia</label>
                                                <input type="number" class="form-control @error('bahasa_indonesia') is-invalid @enderror" required name="bahasa_indonesia" placeholder="Contoh: 78.90">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Nilai Ujian Bahasa Inggris</label>
                                                <input type="number" class="form-control @error('bahasa_inggris') is-invalid @enderror" required name="bahasa_inggris" placeholder="Contoh: 78.90">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Nilai Ujian Matematika</label>
                                                <input type="number" class="form-control @error('matematika') is-invalid @enderror" required name="matematika" placeholder="Contoh: 78.90">
                                            </div>
                                            <div class="form-group">
                                                <label for="contactinput5">Nilai Ujian IPA</label>
                                                <input type="number" class="form-control @error('ipa') is-invalid @enderror" required name="ipa" placeholder="Contoh: 78.90">
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="contactinput5">Alamat Siswa</label>
                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required cols="30" rows="5">{{ @$data->alamat }}</textarea>
                                            </div>

                                        </div>

                                        <div class="form-actions right">
                                            <a href="{{ URL::previous() }}">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection
