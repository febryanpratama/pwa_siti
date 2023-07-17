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

                                <div class="card-header">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-4">
                                            <p>List Data</p>
                                        </div>
                                        {{-- <div class="col-md-8"> --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- @role('Admin')
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

                                                    @endrole --}}
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
                                                            {{-- <th>Spp Dibayar x bulan</th> --}}
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- {{ dd($data) }} --}}
                                                        @foreach ($data as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>{{ $item->nama_siswa }}</td>
                                                            
                                                            <td>

                                                                @role('Admin')
                                                                <a href="{{ url('admin/spp/siswa/'. $item->id) }}" class="btn btn-sm btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                    </svg>
                                                                </a>
                                                                @endrole
                                                                @role('Bendahara')
                                                                <a href="{{ url('bendahara/spp/siswa/'. $item->id) }}" class="btn btn-sm btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                    </svg>
                                                                </a>

                                                                @endrole
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Siswa</th>
                                                            {{-- <th>Spp Dibayar x bulan</th> --}}
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

@endsection

{{-- @section('scripts')
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
@endsection --}}
