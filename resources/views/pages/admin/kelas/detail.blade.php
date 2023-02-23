@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ $title }} DataTable</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ $title }} DataTable
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
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h4 class="card-title">List Data</h4>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <button type="button" class="btn btn-primary mt-1 float-right mr-1" data-toggle="modal"
                                                data-target="#pindah">
                                                Pindah Kelas
                                            </button>
                                            <button type="button" class="btn btn-info mt-1 float-right mr-1" data-toggle="modal"
                                                data-target="#large">
                                                Add {{ $title }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        {{-- <p class="card-text">The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</p> --}}
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style text-center datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    {{-- {{ dd($data->id) }} --}}
                                                    @if ($data->isNotEmpty())
                                                        @foreach (@$data->detail as $x=>$item)
                                                        {{-- {{ dd($item->siswa->status_siswa) }} --}}
                                                            @if (@$item->siswa->status_siswa == 'Aktif')
                                                                <tr>
                                                                    <td>{{ @$x+1 }}</td>
                                                                    <td>{{ @$item->siswa->nama_siswa }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary " data-toggle="modal"
                                                                            data-target="#pindah{{ $item->id }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                                                            </svg>
                                                                        </button>
                                                                        {{-- <button type="button" class="btn btn-sm btn-info " data-toggle="modal"
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
                                                                        </button> --}}
                                                                    </td>
                                                                </tr>
                                                                <div class="modal fade text-left" id="pindah{{ $item->id }}"
                                                                    role="dialog" aria-labelledby="myModalLabel17"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" >
                                                                                    Pindah Kelas Siswa {{ $item->siswa->nama_siswa }}
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form action="{{ url('admin/kelas/pindah') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="before_kelas_id" value="{{ $data->id }}">
                                                                                <input type="hidden" name="siswa_id" value="{{ $item->siswa_id }}">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="" class="label-control">Kelas</label>
                                                                                                <select name="kelas_id" class="form-control select2">
                                                                                                    <option value="" selected disabled> == PILIH == </option>

                                                                                                    @foreach ($kelas as $item)
                                                                                                        <option value="{{ $item->id }}">{{ $item->kelas }} {{ $item->nama_kelas }}</option>
                                                                                                    @endforeach
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
                                                                <div class="modal fade text-left" id="edit{{ $item->id }}" tabindex="-1"
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
                                                                                                <input type="text" class="form-control" name="nama_guru" value="{{ $item->nama_guru }}" placeholder="Febryan Pratama" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="" class="label-control">NIP</label>
                                                                                                <input type="number" class="form-control" name="nip" value="{{ $item->nip }}" placeholder="ex: 12767126" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="" class="label-control">Nomor HP</label>
                                                                                                <input type="number" class="form-control" name="no_hp" value="{{ $item->no_hp }}" placeholder="ex: 62871288827" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="" class="label-control">Alamat</label>
                                                                                                <textarea name="alamat" class="form-control" cols="30" rows="5">{{ $item->alamat }}</textarea>
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
                                                            @endif
                                                        @endforeach
                                                        
                                                    @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Siswa</th>
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

    <!-- Modal -->
    <div class="modal fade text-left" id="pindah"
        role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >
                        Pindah Kelas
                    </h4>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/kelas/siswa-pindah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="before_kelas_id" @if ($data->isNotEmpty())
                        value="{{ $data->id }}x"
                    @else
                        value=""
                    @endif>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="label-control">Kelas</label>
                                    <select name="kelas_id" class="form-control select2">
                                        <option value="" selected disabled> == PILIH == </option>

                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->kelas }} {{ $item->nama_kelas }}</option>
                                        @endforeach
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

    <!-- Modal -->
    <div class="modal fade text-left" id="large"
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
                <form action="{{ url('admin/kelas/siswa-store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $data->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="label-control">Nama Siswa</label>
                                    <select name="siswa_id" class="form-control select2">
                                        <option value="" selected disabled> == PILIH == </option>

                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                        @endforeach
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
    {{-- <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                order: [[ 1, "desc" ]]
            });
        } );
    </script> --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        } );
    </script>
@endsection
