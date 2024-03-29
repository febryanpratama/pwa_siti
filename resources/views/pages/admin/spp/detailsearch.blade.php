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
                                                            <th>Bendahara</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Nominal Spp</th>
                                                            <th>Nominal Bayar</th>
                                                            <th>Sisa Bayar</th>
                                                            <th>Status Pembayaran</th>
                                                            <th>Tanggal Pembayaran</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- {{ dd($data) }} --}}
                                                        @foreach ($data as $key=>$item)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ @$item->siswa->nama_siswa }}</td>
                                                            <td>{{ @$item->guru_penerima }}</td>
                                                            <td>{{ $item->tanggal }}</td>
                                                            <td>{{ number_format($item->nominal_bayar) }}</td>
                                                            <td>{{ number_format($item->total_pembayaran) }}</td>
                                                            <td>{{ number_format($item->sisa_bayar) }}</td>
                                                            <td>
                                                            @switch($item->status_pembayaran)
                                                                @case('Lunas')
                                                                    <div class="badge badge-success">Lunas</div>
                                                                    @break
                                                                @case('Belum Lunas')
                                                                    <div class="badge badge-danger">Belum Lunas</div>
                                                                    @break

                                                                @case('Cicilan')
                                                                <div class="badge badge-warning">Cicilan</div>
                                                                    @break

                                                            @endswitch
                                                            </td>
                                                            <td>{{ $item->tanggal_pembayaran }}</td>
                                                            <td class="d-flex">
                                                                @if ($item->bukti != null)
                                                                    <a href="{{ asset('bukti_pembayaran/'.$item->bukti) }}" class="btn btn-danger mx-1" target="_blank">Bukti</a>
                                                                @endif
                                                                @if ($item->bukti_cicilan != null)
                                                                    <a href="{{ asset('bukti_cicilan/'.$item->bukti_cicilan) }}" class="btn btn-danger mx-1" target="_blank">Bukti Cicilan</a>
                                                                @endif
                                                                @if($item->status_pembayaran == 'Belum Lunas')
                                                                    <button type="button" class="btn btn-sm btn-info edit" data-toggle="modal"
                                                                        onClick="edit({{ $item->id }})">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 29px; height:20px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>

                                                                    </button>
                                                                @endif
                                                                @if($item->status_pembayaran == 'Cicilan')
                                                                <button type="button" class="btn btn-sm btn-info cicilan" data-toggle="modal"
                                                                    data-target="#cicilan{{ $item->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 29px; height:20px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>

                                                                </button>
                                                                @endif
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
                                                            <th>No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Bendahara</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Nominal Spp</th>
                                                            <th>Nominal Bayar</th>
                                                            <th>Sisa Bayar</th>
                                                            <th>Status Pembayaran</th>
                                                            <th>Tanggal Pembayaran</th>
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
    @foreach ($data as $k=>$i)
        <div class="modal fade text-left" id="cicilan{{ $i->id }}" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel17"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">
                            Edit {{ $title }}
                        </h4>
                        <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @role('Admin')
                    <form action="{{ url('admin/spp/update') }}" method="POST">
                        @endrole
                    @role('Bendahara')
                    {{-- <form action="{{ url('bendahara/spp/add') }}" method="POST"> --}}
                    <form action="{{ url('bendahara/spp/update') }}" method="POST">
                        @endrole
                        @csrf
                        <input type="hidden" name="spp_id" class="spp_id" value="{{ $i->id }}">
                        <input type="hidden" name="siswa_id" class="siswa_id" value="{{ $i->siswa_id }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Guru Penerima</label>
                                        <input type="text" class="form-control" name="guru_penerima" placeholder="Guru Penerima" required>

                                        {{-- <select name="guru_penerima_id" class="form-control select2" required>
                                            <option value="" selected disabled> == Pilih == </option>
                                            @foreach ($guru as $grp)
                                                <option value="{{ $grp->id }}">{{ $grp->nama_guru }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Guru Piket</label>
                                        <input type="text" class="form-control" name="guru_piket" placeholder="Guru Piket" required>

                                        {{-- <select name="guru_piket_id" class="form-control select2" required>
                                            <option value="" selected disabled> == Pilih == </option>
                                            @foreach ($guru as $gr)
                                                <option value="{{ $gr->id }}">{{ $gr->nama_guru }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Nominal SPP</label>
                                        <input type="number" name="nominal_spp" class="form-control nominal_spp" value="{{ $i->nominal_bayar }}" id="" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Nominal Telah Dibayar</label>

                                        <input type="text" name="nama_siswa" class="form-control" value="{{ $i->total_pembayaran }}" readonly >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="label-control">Nominal Sisa Pembayaran</label>
                                        <input type="number" name="nominal_sisa" class="form-control " value="{{ $i->sisa_bayar }}" readonly required>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Nominal yang dibayar</label>
                                        <input type="number" name="nominal_dibayar" class="form-control" value="" required>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="label-control">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn grey btn-secondary"
                            data-dismiss="modal">Close</button>
                            <button type="submit"
                            class="btn btn-danger">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade text-left" id="edit" tabindex="-1"
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
                @role('Admin')
                <form action="{{ url('admin/spp/add') }}" method="POST">
                    @endrole
                @role('Bendahara')
                <form action="{{ url('bendahara/spp/add') }}" method="POST">
                    @endrole
                    @csrf
                    <input type="hidden" name="spp_id" class="spp_id" value="">
                    <input type="hidden" name="siswa_id" class="siswa_id" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Guru Penerima</label>
                                    <input type="text" class="form-control" name="guru_penerima" placeholder="Guru Penerima" required>
                                    {{-- <select name="guru_penerima_id" class="form-control select2" required>
                                        <option value="" selected disabled> == Pilih == </option>
                                        @foreach ($guru as $grp)
                                            <option value="{{ $grp->id }}">{{ $grp->nama_guru }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Guru Piket</label>
                                    <input type="text" class="form-control" name="guru_piket" placeholder="Guru Piket" required>

                                    {{-- <select name="guru_piket_id" class="form-control select2" required>
                                        <option value="" selected disabled> == Pilih == </option>
                                        @foreach ($guru as $gr)
                                            <option value="{{ $gr->id }}">{{ $gr->nama_guru }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Siswa</label>

                                    <input type="text" name="nama_siswa" class="form-control" readonly id="siswa_nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Nominal SPP</label>
                                    <input type="number" name="nominal_spp" class="form-control nominal_spp" id="" readonly required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Nominal yang Dibayar</label>
                                    <input type="number" name="nominal_dibayar" class="form-control nominal_pembayaran" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Sisa SPP</label>
                                    <input type="number" name="nominal_sisa" class="form-control sisa_spp" readonly required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="label-control">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-secondary"
                        data-dismiss="modal">Close</button>
                        <button type="submit"
                        class="btn btn-success">Add</button>
                    </div>
                </form>
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


                    // console.log(result.data.siswa.nama_siswa);
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
            let nominal_pembayaran = $(this).val()
            // console.log(nominal_pembayaran);
            let sisa_spp = nominal_spp - nominal_pembayaran;
            // console.log(nominal_spp+"/"+nominal_pembayaran+"/"+sisa_spp);
            $('.sisa_spp').val(sisa_spp);
        })

        // $('.nominal_pembayaran_sisa').on('keyup', function(){
        //     let sisa_spp = $(this).val();
        //     let nominal_pembayaran = $('.nominal_pembayaran_sisa').val();

        //     let nominal = sisa_spp - nominal_pembayaran;
        //     console.log(nominal);
        //     $('.sisa_spp').val(nominal);
        // })
    

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
