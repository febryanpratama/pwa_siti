
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>sApp | SMA - TUNAS MULYA</title>

    <!-- Favicon  -->
    <link rel="icon" href="https://theme-land.com/sapp/demo/assets/img/favicon.png">

    <!-- ***** All CSS Files ***** -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style css -->
    <link rel="stylesheet" href="https://theme-land.com/sapp/demo/assets/css/style.css">

    {{-- {{ pwa_meta() }} --}}
    @PWA
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
                <a class="navbar-brand" href="index.html">
                    <img class="navbar-brand-regular" src="https://theme-land.com/sapp/demo/assets/img/logo/logo-white.png" alt="brand-logo">
                    <img class="navbar-brand-sticky" src="https://theme-land.com/sapp/demo/assets/img/logo/logo.png" alt="sticky brand-logo">
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
        <section class="section breadcrumb-area bg-overlay d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="text-white text-capitalize">Check Data SPP</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Data SPP</a></li>
                                <li class="breadcrumb-item text-white active">Check Data SPP</li>
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
                                Jika anda mengalami kesulitan dalam melakukan pengecekan data spp anda, anda dapat menghubungi kami melalui kontak dibawah ini.
                            </p>
                            <ul>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <span class="media-body align-self-center">Vestibulum nulla libero, convallis, tincidunt suscipit diam, DC 2002</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <span class="media-body align-self-center">+1 230 xxx xxx</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <span class="media-body align-self-center">admin@starlabsys.tech</span>
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
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th width="10%">Nomor</th>
                                            {{-- <th>Nama Siswa</th> --}}
                                            <th>Bulan</th>
                                            <th>Kelas </th>
                                            <th>Nominal Dibayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($spp != null)
                                            @foreach ($spp as $item => $spp)
                                                <tr>
                                                    <td>{{ $item+1 }} {{ $spp->id }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($spp->tanggal)->format('M Y')}}</td>
                                                    <td>{{ $spp->kelas->kelas }} {{ $spp->kelas->nama_kelas }}</td>
                                                    <td>Rp. {{ number_format($spp->total_pembayaran,0) }}</td>
                                                    <td>
                                                        @switch($spp->status)
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
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Contact Area End ======-->

        <!--====== Map Area Start ======-->
        <section class="section map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.596666220624!2d-0.16124461362595294!3d51.46556134684942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487605a25375dfb7%3A0xe0d9fa09dcf932a8!2s15%20Theatre%20St%2C%20Battersea%2C%20London%20SW11%205ND%2C%20UK!5e0!3m2!1sen!2sbd!4v1567427969685!5m2!1sen!2sbd" width="100" height="100" style="border:0;" allowfullscreen=""></iframe>
        </section>
        <!--====== Map Area End ======-->

        <!--====== Footer Area Start ======-->
        <footer class="footer-area">
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
        </footer>
        <!--====== Footer Area End ======-->
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

        @if (@$status == false)
        swal("Oopss", "Data Anda Tidak Kami Temukan", "error");
            
        @endif

    </script>
</body>

</html>