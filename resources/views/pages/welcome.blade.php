
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>sApp | SMA - TAMAN MULIA</title>

    <!-- Favicon  -->
    <link rel="icon" href="https://theme-land.com/sapp/demo/assets/img/favicon.png">

    <!-- ***** All CSS Files ***** -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style css -->
    <link rel="stylesheet" href="https://theme-land.com/sapp/demo/assets/css/style.css">

    {{-- {{ pwa_meta() }} --}}
    @PWA

    <style>
        .breadcrumb-area-x {
        height: 450px;
        z-index: 1;
        }

        .breadcrumb-area-x .breadcrumb-content .breadcrumb {
        background-color: transparent;
        margin: 0;
        }

        .breadcrumb-area-x .breadcrumb-content .breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: var(--white-color);
        }
        .breadcrumb-area-x {
        background: rgba(0, 0, 0, 0) url("../assets/landing.jpg") no-repeat scroll center center/cover;
        }

        .blog .breadcrumb-area-x {
        background: rgba(0, 0, 0, 0) url("../assets/landing.jpg") no-repeat scroll center center/cover;
        }

    </style>
</head>

<body class="contact-page">
    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="main">
        <!-- ***** Header Start ***** -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="#">
                    {{-- <img class="navbar-brand-regular" src="https://theme-land.com/sapp/demo/assets/img/logo/logo-white.png" alt="brand-logo"> --}}
                    {{-- <img class="navbar-brand-sticky" src="https://theme-land.com/sapp/demo/assets/img/logo/logo.png" alt="sticky brand-logo"> --}}
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-inner">
                    <!--  Mobile Menu Toggler -->
                    {{-- <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
                    <nav>
                        <ul class="navbar-nav" >
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}">Login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- ***** Header End ***** -->

        <!-- ***** Breadcrumb Area Start ***** -->
        <section class="section breadcrumb-area-x bg-overlay d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="text-white text-capitalize">Informasi Pembayaran SPP SMA Taman Mulia Kubu Raya</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Informasi SPP</a></li>
                                <li class="breadcrumb-item text-white active">Data SPP</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->

        <!--====== Contact Area Start ======-->
        <section id="contact" class="contact-area bg-gray ptb_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <span class="d-inline-block rounded-pill shadow-sm fw-5 px-4 py-2 mb-3">
                                <i class="far fa-lightbulb text-primary mr-1"></i>
                                <span class="text-primary">Data</span>
                                SPP
                            </span>
                            <h2>Check Data SPP Kamu Disini</h2>
                            <p class="d-none d-sm-block mt-4">Anda dapat melakukan pengecekan data spp dengan memasukkan tanggal lahir & NISN anda pada kolom input ini.</p>
                            {{-- <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-12 col-md-5">
                        <!-- Contact Us -->
                        <div class="contact-us">
                            <p class="mb-3">
                                Jika anda mengalami kesulitan dalam melakukan pengecekan data spp anda, anda dapat menghubungi kontak dibawah ini.
                            </p>
                            <ul>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <span class="media-body align-self-center">Jl. Sukarno Hatra, Arang Limbung, Kec. Sungai Raya, Kab. Kuburaya Prov. Kalimantan Barat</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <span class="media-body align-self-center">+62 561 xxx xxx</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <span class="media-body align-self-center">admin@sppsmatamanmulia</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 pt-4 pt-md-0">
                        <!-- Contact Box -->
                        <div class="contact-box text-center">
                            <!-- Contact Form -->
                            <form method="POST" action="{{ url('siswa-spp') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="label-control">Tanggal Lahir Siswa</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="label-control">Nomor NISN</label>
                                            <input type="number" class="form-control" name="nisn" placeholder="NISN" required="required">
                                        </div>
                                        
                                        {{-- <div class="form-group">
                                            <label for="" class="label-control">Semester</label>
                                            <select name="semester" class="form-control" id="" required>
                                                <option value="" selected disabled> == Pilih == </option>
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
                                            </select>
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="" class="label-control">Periode</label>
                                            <select name="periode" class="form-control" id="" required>
                                                <option value="" selected disabled> == Periode == </option>
                                                @foreach ($ta as $item)
                                                    <option value="{{ $item->id }}">{{ $item->semester }}, {{ $item->tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-lg btn-block mt-3"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Check Data</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-message"></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title">Data SPP</h3>
                            </div>
                            <div class="card-body">
                                <div class="table table-responsive">
                                    {{-- <h1>OKOKOKOK</h1> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Total Tunggakan : Rp. {{ number_format(@App\Helpers\Format::getTunggakan($spp[0]->siswa_id), 0) }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Nama Siswa : {{ @App\Helpers\Format::getNameSiswa($spp[0]->siswa_id) }}</h5>
                                        </div>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th width="10%">Nomor</th>
                                                {{-- <th>Nama Siswa</th> --}}
                                                <th>Bulan</th>
                                                <th>Kelas </th>
                                                <th>Nominal Dibayar</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Status</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($spp != null)
                                                @foreach ($spp as $item => $k)
                                                    <tr>
                                                        <td>{{ $item+1 }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('M Y')}}</td>
                                                        <td>{{ $k->kelas->kelas }} {{ $k->kelas->nama_kelas }}</td>
                                                        <td>Rp. {{ number_format($k->total_pembayaran,0) }}</td>
                                                        <td>{{ $k->tanggal_pembayaran }}</td>
                                                        <td>
                                                            {{-- {{ $k->status }} --}}
                                                            @switch($k->status_pembayaran)
                                                                @case('Lunas')
                                                                    <div class="badge badge-success">Lunas</div>
                                                                    @break
                                                                @case('Belum Lunas')
                                                                    <div class="badge badge-danger">Belum Lunas</div>
                                                                    @break
                                                                @default
                                                                    <div class="badge badge-warning">Cicilan</div>
                                                                    
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            @if ($k->bukti == null)
                                                            <button type="button" data-toggle="modal" data-target="#md{{ $k->id }}" class="btn btn-outline-info">Transer</button>
                                                            @else
                                                            @if ($k->status_pembayaran == "Cicilan" && $k->bukti_cicilan == null)
                                                                
                                                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#mdc{{ $k->id }}">Cicilan</button>
                                                            @else
                                                                <button type="button" class="btn btn-outline-info">Terima Kasih</button>
                                                            @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                -                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    @if ($spp != null)
                                        @foreach ($spp as $m=>$md)
                                            <div class="modal fade" id="md{{ $md->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('unggah') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="spp_id" value="{{ $md->id }}">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                Anda dapat melakukan pembayaran melalui transfer ke rekening berikut : <br><br>
                                                                    <ul>
                                                                        <li>Bank BRI : 1234567890 An Taman Mulia</li>
                                                                        <li>Bank BNI : 1234567890  An Taman Mulia</li>
                                                                        <li>Bank BCA : 1234567890  An Taman Mulia</li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="" class="control-label">Unggah Bukti Pembayaran</label>
                                                                    <input type="file" name="bukti_pembayaran" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                                </div>
                                            </div>        
                                        @endforeach
                                    @endif
                                    @if ($spp != null)
                                        @foreach ($spp as $m=>$md)
                                            <div class="modal fade" id="mdc{{ $md->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('unggah-cicilan') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="spp_id" value="{{ $md->id }}">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                Anda dapat melakukan pembayaran melalui transfer ke rekening berikut : <br><br>
                                                                    <ul>
                                                                        <li>Bank BRI : 1234567890 An Taman Mulia</li>
                                                                        <li>Bank BNI : 1234567890  An Taman Mulia</li>
                                                                        <li>Bank BCA : 1234567890  An Taman Mulia</li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="" class="control-label">Unggah Bukti Pembayaran</label>
                                                                    <input type="file" name="bukti_cicilan" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                                </div>
                                            </div>        
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Contact Area End ======-->

        <!--====== Map Area Start ======-->
        <section class="section map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.808869183005!2d109.40005869999999!3d-0.1247107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84371fbbdd0b27aa!2zMMKwMDcnMjkuMCJTIDEwOcKwMjQnMDAuMiJF!5e0!3m2!1sid!2sid!4v1669528251938!5m2!1sid!2sid" width="100" height="1--" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        {{-- {{ dd($ack) }} --}}
        <!--====== Map Area End ======-->

        <!--====== Footer Area Start ======-->
        {{-- <footer class="footer-area">
            <!-- Footer Top -->
            <div class="footer-top ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Logo -->
                                <a class="navbar-brand" href="#">
                                    <img class="logo" src="https://theme-land.com/sapp/demo/assets/img/logo/logo.png" alt="">
                                </a>
                                <p class="mt-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis non, fugit totam vel laboriosam vitae.</p>
                                <!-- Social Icons -->
                                <div class="social-icons d-flex">
                                    <a class="facebook" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="google-plus" href="#">
                                        <i class="fab fa-google-plus-g"></i>
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a class="vine" href="#">
                                        <i class="fab fa-vine"></i>
                                        <i class="fab fa-vine"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title mb-2">Useful Links</h3>
                                <ul>
                                    <li class="py-2"><a href="#">Home</a></li>
                                    <li class="py-2"><a href="#">About Us</a></li>
                                    <li class="py-2"><a href="#">Services</a></li>
                                    <li class="py-2"><a href="#">Blog</a></li>
                                    <li class="py-2"><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title mb-2">Product Help</h3>
                                <ul>
                                    <li class="py-2"><a href="#">FAQ</a></li>
                                    <li class="py-2"><a href="#">Privacy Policy</a></li>
                                    <li class="py-2"><a href="#">Support</a></li>
                                    <li class="py-2"><a href="#">Terms &amp; Conditions</a></li>
                                    <li class="py-2"><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title mb-2">Download</h3>
                                <!-- Store Buttons -->
                                <div class="button-group store-buttons store-black d-flex flex-wrap">
                                    <a href="#">
                                        <img src="https://theme-land.com/sapp/demo/assets/img/icon/google-play-black.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="https://theme-land.com/sapp/demo/assets/img/icon/app-store-black.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Copyright Area -->
                            <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                                <!-- Copyright Left -->
                                <div class="copyright-left">&copy; Copyrights 2022 sApp All rights reserved.</div>
                                <!-- Copyright Right -->
                                <div class="copyright-right">Made with <i class="fas fa-heart"></i> By <a href="#">Themeland</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}
        <!--====== Footer Area End ======--04>
            
    </div>


    <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="https://theme-land.com/sapp/demo/assets/js/jquery/jquery.min.js"></script>

    <!-- Bootstrap js -->
    <script src="https://theme-land.com/sapp/demo/assets/js/bootstrap/popper.min.js"></script>
    <script src="https://theme-land.com/sapp/demo/assets/js/bootstrap/bootstrap.min.js"></script> 

    <!-- Plugins js -->
    <script src="https://theme-land.com/sapp/demo/assets/js/plugins/plugins.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


    <!-- Active js -->
    <script src="https://theme-land.com/sapp/demo/assets/js/active.js"></script>

    @PWA
    <script>
        @if (@$status == true)
        swal("Horee !", "Data Anda Berhasil Kami Temukan", "success");
        @endif

        @if (@$ack == true)
        swal("Oopss", "Data Anda Tidak Kami Temukan", "error");
            
        @endif

        @if (session('success'))
        swal("Great !", "{{ session('success') }}", "success");
        @endif ()
        @if (session('error'))
        swal("Oh No !", "{{ session('error') }}", "error");
        @endif ()

    </script>
</body>

</html>