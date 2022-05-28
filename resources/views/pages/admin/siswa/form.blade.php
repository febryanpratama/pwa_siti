@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Form Input Data Siswa</h4>

            </div>
            {{-- <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <a href="{{ url('admin/siswa/form-siswa') }}" class="btn btn-info float-right">+ Tambah Siswa</a>
                </div>
            </div> --}}
        </div>
        <!-- End Breadcrumb-->


        {{-- FORM siswa --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="card-title text-dark">Data Siswa</div>
                    <hr />
                    <form method="POST" action="{{ url ('admin/siswa') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" placeholder="Masukkan No NISN" />
                            </div>
                            @error('nisn')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" placeholder="Masukkan No NIS" />
                            </div>
                            @error('nis')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" required name="nama_siswa" placeholder="Masukkan Nama Siswa">
                            </div>
                            @error('nama_siswa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            @error('jenis_kelamin')
                            <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">NIK Siswa</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nik_siswa') is-invalid @enderror" required name="nik_siswa" placeholder="Masukkan No NIK Siswa">
                            </div>
                            @error('nik_siswa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">No KK Siswa</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nokk_siswa') is-invalid @enderror" required name="nokk_siswa" placeholder="Masukkan No KK Siswa" />
                            </div>
                            @error('nokk_siswa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Status Siswa</label>
                            <div class="col-sm-10">
                                <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                    <option value="Gratis">Gratis</option>
                                    <option value="Tidak Gratis">Tidak Gratis</option>
                                </select>
                            </div>
                            @error('status')
                            <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                            </div>
                            @error('tempat_lahir')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                            </div>
                            @error('tanggal_lahir')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
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

                        <hr>

                        <div class="form-group row">
                                <label for="input-23" class="col-sm-2 col-form-label">Anak Ke</label>
                                <div class="col-sm-10">
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

                        <div class="form-group row">
                            <label for="input-23" class="col-sm-2 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" required name="asal_sekolah" placeholder="Masukkan Asal Sekolah">
                            </div>
                            @error('asal_sekolah')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">No Ujian SMP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nomor_ujian_smp') is-invalid @enderror" required name="nomor_ujian_smp" placeholder="Masukkan Nomor Ujian SMP">
                            </div>
                            @error('nomor_ujian_smp')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nomor Ijazah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nomor_ijazah') is-invalid @enderror" required name="nomor_ijazah" placeholder="Masukkan Nomor Ijazah">
                            </div>
                            @error('nomor_ijazah')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nomor SKHUN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nomor_skhun') is-invalid @enderror" required name="nomor_skhun" placeholder="Masukkan Nomor SKHUN">
                            </div>
                             @error('nomor_skhun')
                                <div class="text-muted text-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Telpon Siswa</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('telpon_siswa') is-invalid @enderror" required name="telpon_siswa" placeholder="Masukkan Nomor Telpon Siswa">
                            </div>
                             @error('telpon_siswa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nama Orang Tua Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" required name="nama_ortu" placeholder="Masukkan Nama Orang Tua Siswa">
                            </div>
                            @error('nama_ortu')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nomor Telpon Orang Tua Siswa</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('telpon_ortu_siswa') is-invalid @enderror" required name="telpon_ortu_siswa" placeholder="Masukkan Nomor Telpon Orang Tua Siswa">
                            </div>
                            @error('telpon_ortu_siswa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nilai Ujian Bahasa Indonesia</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('bahasa_indonesia') is-invalid @enderror" required name="bahasa_indonesia" placeholder="Contoh: 78.90">
                            </div>
                            @error('bahasa_indonesia')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nilai Ujian Bahasa Inggris</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('bahasa_inggris') is-invalid @enderror" required name="bahasa_inggris" placeholder="Contoh: 78.90">
                            </div>
                            @error('bahasa_inggris')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nilai Ujian Matematika</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('matematika') is-invalid @enderror" required name="matematika" placeholder="Contoh: 78.90">
                            </div>
                            @error('matematika')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Nilai Ujian IPA</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('ipa') is-invalid @enderror" required name="ipa" placeholder="Contoh: 78.90">
                            </div>
                            @error('ipa')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Alamat Siswa</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required cols="30" rows="5"></textarea>
                            </div>
                            @error('alamat')
                                <div class="text-muted text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-dark shadow-dark px-5 float-right "><i class="icon"></i>+ Tambah Data</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
