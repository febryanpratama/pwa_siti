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
                            <div class="card" style="background-color: #f4f5fa">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="card-title">List Data</h4>
                                    {{-- <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a> --}}
                                    {{-- <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#large">
                                        Add {{ $title }}
                                    </button> --}}
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard ">
                                        {{-- <p class="card-text">The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</p> --}}
                                        <div class="row">
                                            @foreach ($kelas as $item=>$class)
                                            <div class="col-md-12 col-lg-4">
                                                @role('Admin')
                                                    <a href="{{ url('admin/spp/kelas/'.$class->id) }}">
                                                @endrole
                                                @role('Bendahara')
                                                    <a href="{{ url('bendahara/spp/kelas/'.$class->id) }}">
                                                @endrole
                                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Kelas <span class="badge badge-pill badge-info float-right m-0">{{ $class->kelas }} {{ $class->nama_kelas }}</span></h4>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body p-1">
                                                                <h4 class="font-large-1 text-bold-400">{{ App\Helpers\Format::getCountSiswaKelas($class->id) }} Siswa <i class="ft-users float-right"></i></h4>
                                                            </div>
                                                            <div class="card-footer p-1 justify-content-end">
                                                                <span class="text-muted"><i class="la la-user info"></i> {{ $class->guru->nama_guru }}</span>
                                                                {{-- <span class="text-muted"><i class="la la-user info"></i> {{ $class->guru->nama_guru }}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
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
    {{-- <div
        +.306-295 *1.--}}
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
