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
                <!-- Base style table -->
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title">List Data</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <a href="{{ url("admin/spp/kelas/".$kelas_id."/lunas") }}" class="">
                                            <button class="btn btn-success"> Lunas </button>
                                        </a>
                                    
                                        <a href="{{ url("admin/spp/kelas/".$kelas_id."/belum-lunas") }}" class="">
                                            <button class="btn btn-danger"> Belum Lunas </button>
                                        </a>
                                    
                                        <a href="{{ url('admin/spp/generate/'.$kelas_id) }}">
                                            <button class="btn btn-info">Generate SPP</button>
                                        </a>
                                    </div>
                                </div> --}}

                                <div class="card-header">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-4">
                                            <p>List Data</p>
                                        </div>
                                        {{-- <div class="col-md-8"> --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @role('Admin')
                                                    <a href="{{ url("admin/spp/kelas/".$kelas_id."/lunas") }}" class="mt-1">
                                                        <button class="btn btn-success mr-2 mt-1"> Lunas </button>
                                                    </a>
                                                    <a href="{{ url("admin/spp/kelas/".$kelas_id."/belum-lunas") }}" class="mt-1">
                                                        <button class="btn btn-danger mr-2 mt-1"> Belum Lunas </button>
                                                    </a>
                                                
                                                    <button type="button" class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal">
                                                        Generate SPP
                                                    </button>
                                                    @endrole
                                                    @role('Bendahara')
                                                    <a href="{{ url("bendahara/spp/kelas/".$kelas_id."/lunas") }}" class="mt-1">
                                                        <button class="btn btn-success mr-2 mt-1"> Lunas </button>
                                                    </a>
                                                    <a href="{{ url("bendahara/spp/kelas/".$kelas_id."/belum-lunas") }}" class="mt-1">
                                                        <button class="btn btn-danger mr-2 mt-1"> Belum Lunas </button>
                                                    </a>
                                                

                                                    <button type="button" class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal">
                                                        Generate SPP
                                                    </button>

                                                    {{-- <a href="{{ url('bendahara/spp/generate/'.$kelas_id) }}" class="mt-1">
                                                        <button class="btn btn-info mr-2 mt-1">Generate SPP</button>
                                                    </a> --}}
                                                    @endrole
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-content car-body collapse show">
                                        <div class="card-body card-dashboard">
                                            {{-- <p class="card-text">The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</p> --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered base-style text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Spp Dibayar x bulan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                        {{-- {{ dd($item) }} --}}
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>{{ $item->nama_siswa }}</td>
                                                            <td>6 bulan</td>
                                                            <td>

                                                                @role('Admin')
                                                                <a href="{{ url('admin/spp/kelas/'.$item->kelasDetail->kelas_id.'/siswa/'. $item->id) }}" class="btn btn-sm btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                    </svg>
                                                                </a>
                                                                @endrole
                                                                @role('Bendahara')
                                                                <a href="{{ url('bendahara/spp/kelas/'.$item->kelasDetail->kelas_id.'/siswa/'. $item->id) }}" class="btn btn-sm btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                    </svg>
                                                                </a>

                                                                @endrole
                                                                {{-- @if($item->status_pembayaran == 'Belum Bayar')
                                                                <button type="button" class="btn btn-sm btn-info edit" data-toggle="modal"
                                                                    data-target="#edit{{ $item->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </button>
                                                                @endif
                                                                <button type="button" class="btn btn-sm btn-danger " data-toggle="modal"
                                                                    data-target="#destroy{{ $item->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 29px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button> --}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Spp Dibayar x bulan</th>
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
                    </div>
                </section>
                <!--/ Base style table -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid black">
                <h3 class="modal-title" id="exampleModalLabel">Generate Data SPP</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <hr> --}}
            @role('Admin')
            <form action="{{ url('admin/spp/generate') }}" method="POST" enctype="multipart/form-data">
                
                @endrole
                @role('Bendahara')
                <form action="{{ url('bendahara/spp/generate') }}" method="POST" enctype="multipart/form-data">
                    @endrole
                    @role('Kepsek')
                    <form action="{{ url('kepsek/spp/generate') }}" method="POST" enctype="multipart/form-data">
                    @endrole
            <div class="modal-body">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label"><h5>Semester / Tahun Ajaran</h5></label>
                            <select name="semester_id" class="form-control" id="">
                                <option value="" selected disabled> == PILIH == </option>
                                @foreach ($tahun as $item=>$t)
                                    <option value="{{ $t->id }}">{{ $t->semester }}, T.A {{ $t->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#select_siswa').on('change', function(){
                let siswa_id = $('#select_siswa option:selected').val();
                // console.log(siswa_id)

                $.ajax({
                    url: `{{ url('api/data-siswa') }}`,
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'siswa_id': siswa_id
                    },
                    success: (result)=>{
                        console.log(result);
                        if(result.status == true){

                            if (result.data.kelas == null) {
                                swal({
                                    title: "Peringatan!",
                                    text: "Siswa ini belum memiliki kelas",
                                    icon: "errors",
                                    button: "Ok",
                                });
                                $('#nominal_spp').html('')
                                $("#nominal_pembayaran").addAttr("disabled");
                            } else {
                                let nominal = $('#nominal_spp').val(result.data.kelas.nominal);
                                console.log(nominal);
                                $('#nominal_spp').html(nominal)


                                $("#nominal_pembayaran").removeAttr('disabled');

                            }


                        }else{
                            swal({
                                title: "Peringatan!",
                                text: "Siswa ini belum memiliki kelas",
                                icon: "error",
                                button: "Ok",
                            });
                        }
                    }
                })
            })

            $('#nominal_pembayaran').on('keyup', function(){
                let nominal_spp = $('#nominal_spp').val();
                let nominal_pembayaran = $('#nominal_pembayaran').val();
                let sisa_spp = nominal_spp - nominal_pembayaran;
                $('#sisa_spp').val(sisa_spp);
            })


            $('.edit').on('click', function (){
                $('.nominal_pembayaran').val('')
                $('.nominal_spp').val('')
                $('.sisa_spp').val('')
                $('select.select_siswa').on('change', function(){
                    let siswa_id = $(this).children("option:selected").val()

                    $.ajax({
                        url: `{{ url('api/data-siswa') }}`,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            'siswa_id': siswa_id
                        },
                        success: (result)=>{
                            console.log(result);
                            if(result.status == true){

                                if (result.data.kelas == null) {
                                    swal({
                                        title: "Peringatan!",
                                        text: "Siswa ini belum memiliki kelas",
                                        icon: "errors",
                                        button: "Ok",
                                    });
                                    $('.nominal_spp').html('')
                                    $(".nominal_pembayaran").addAttr("disabled");
                                } else {
                                    let nominal = $('.nominal_spp').val(result.data.kelas.nominal);
                                    console.log(nominal);
                                    $('.nominal_spp').html(nominal)


                                    $(".nominal_pembayaran").removeAttr('disabled');

                                }


                            }else{
                                swal({
                                    title: "Peringatan!",
                                    text: "Siswa ini belum memiliki kelas",
                                    icon: "error",
                                    button: "Ok",
                                });
                            }
                        }
                    })
                })

                $('.nominal_pembayaran').on('keyup', function(){
                    let nominal_spp = $('.nominal_spp').val();
                    let nominal_pembayaran = $('.nominal_pembayaran').val();
                    let sisa_spp = nominal_spp - nominal_pembayaran;
                    $('#sisa_spp').val(sisa_spp);
                })
            })

        });
    </script>
@endsection
