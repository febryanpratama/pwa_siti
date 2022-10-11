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
                                    <h4 class="card-title">List Data</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        {{-- <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#large">
                                            Add {{ $title }}
                                        </button> --}}
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
                                                        <th>#</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Pembayaran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key=>$item)
                                                    {{-- {{ dd($item[0]) }} --}}
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ @$item[0]->siswa->nama_siswa }}</td>
                                                        <td>{{ App\Helpers\Format::countSiswa($item[0]->siswa_id, $item[0]->kelas_id) }} bulan Pembayaran</td>
                                                        {{-- <td>{{ @$item->user->name }}</td> --}}
                                                        <td>
                                                            <div class="badge badge-danger">Belum Lunas</div>
                                                            {{-- <button type="button" class="btn btn-sm btn-danger " data-toggle="modal"
                                                                onClick="edit({{ $item->id }})">
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
                                                        <th>#</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Bendahara</th>
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


    

@endsection

@section('scripts')
    <script>

        function edit(spp_id){
            // console.log(spp_id);
            $('#edit').modal('show');
            $('.nominal_spp').val('')
            $('.spp_id').val('')
            $('.siswa_id').val('')


            $.ajax({
                url: `{{ url('api/data-spp') }}`,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'spp_id': spp_id
                },
                success: (result)=>{


                    // console.log(result.data.siswa.id);
                    if(result.status == true){

                        $('#siswa_nama').val(result.data.siswa.nama_siswa);
                        $('.nominal_spp').val(result.data.kelas.nominal);
                        $('.spp_id').val(spp_id);

                        $('.siswa_id').val(result.data.siswa.id);

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
        }

        $('.nominal_pembayaran').on('keyup', function(){
            // console.log("ok");
            let nominal_spp = $('.nominal_spp').val();
            let nominal_pembayaran = $('.nominal_pembayaran').val();
            let sisa_spp = nominal_spp - nominal_pembayaran;
            $('.sisa_spp').val(sisa_spp);
        })

    

        // $(document).ready(function(){
        //     $('#select_siswa').on('change', function(){
        //         let siswa_id = $('#select_siswa option:selected').val();
        //         // console.log(siswa_id)

        //         $.ajax({
        //             url: `{{ url('api/data-siswa') }}`,
        //             type: 'POST',
        //             dataType: 'JSON',
        //             data: {
        //                 'siswa_id': siswa_id
        //             },
        //             success: (result)=>{
        //                 console.log(result);
        //                 if(result.status == true){

        //                     if (result.data.kelas == null) {
        //                         swal({
        //                             title: "Peringatan!",
        //                             text: "Siswa ini belum memiliki kelas",
        //                             icon: "errors",
        //                             button: "Ok",
        //                         });
        //                         $('#nominal_spp').html('')
        //                         $("#nominal_pembayaran").addAttr("disabled");
        //                     } else {
        //                         let nominal = $('#nominal_spp').val(result.data.kelas.nominal);
        //                         console.log(nominal);
        //                         $('#nominal_spp').html(nominal)


        //                         $("#nominal_pembayaran").removeAttr('disabled');

        //                     }


        //                 }else{
        //                     swal({
        //                         title: "Peringatan!",
        //                         text: "Siswa ini belum memiliki kelas",
        //                         icon: "error",
        //                         button: "Ok",
        //                     });
        //                 }
        //             }
        //         })
        //     })

        //     $('#nominal_pembayaran').on('keyup', function(){
        //         let nominal_spp = $('#nominal_spp').val();
        //         let nominal_pembayaran = $('#nominal_pembayaran').val();
        //         let sisa_spp = nominal_spp - nominal_pembayaran;
        //         $('#sisa_spp').val(sisa_spp);
        //     })


        //     $('.edit').on('click', function (){
        //         $('.nominal_pembayaran').val('')
        //         $('.nominal_spp').val('')
        //         $('.sisa_spp').val('')
        //         $('select.select_siswa').on('change', function(){
        //             let siswa_id = $(this).children("option:selected").val()

        //             $.ajax({
        //                 url: `{{ url('api/data-siswa') }}`,
        //                 type: 'POST',
        //                 dataType: 'JSON',
        //                 data: {
        //                     'siswa_id': siswa_id
        //                 },
        //                 success: (result)=>{
        //                     console.log(result);
        //                     if(result.status == true){

        //                         if (result.data.kelas == null) {
        //                             swal({
        //                                 title: "Peringatan!",
        //                                 text: "Siswa ini belum memiliki kelas",
        //                                 icon: "errors",
        //                                 button: "Ok",
        //                             });
        //                             $('.nominal_spp').html('')
        //                             $(".nominal_pembayaran").addAttr("disabled");
        //                         } else {
        //                             let nominal = $('.nominal_spp').val(result.data.kelas.nominal);
        //                             console.log(nominal);
        //                             $('.nominal_spp').html(nominal)


        //                             $(".nominal_pembayaran").removeAttr('disabled');

        //                         }


        //                     }else{
        //                         swal({
        //                             title: "Peringatan!",
        //                             text: "Siswa ini belum memiliki kelas",
        //                             icon: "error",
        //                             button: "Ok",
        //                         });
        //                     }
        //                 }
        //             })
        //         })

        //         $('.nominal_pembayaran').on('keyup', function(){
        //             let nominal_spp = $('.nominal_spp').val();
        //             let nominal_pembayaran = $('.nominal_pembayaran').val();
        //             let sisa_spp = nominal_spp - nominal_pembayaran;
        //             $('#sisa_spp').val(sisa_spp);
        //         })
        //     })

        // });
    </script>
@endsection
