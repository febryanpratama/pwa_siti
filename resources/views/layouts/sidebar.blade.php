<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
    <a href="index.html">
    <img src="{{ asset('') }}assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
    <h5 class="logo-text">Admin Template</h5>
    </a>
</div>
<ul class="sidebar-menu do-nicescrol">
    <li class="sidebar-header">DASHBOARD</li>
    <li>
        <a href="widgets.html" class="waves-effect">
        <i class="zmdi zmdi-widgets"></i> <span>Dashboard</span>
        {{-- <small class="badge float-right badge-danger">10</small> --}}
        </a>
    </li>
    <li class="sidebar-header">MAIN NAVIGATION</li>
    <li>
        <a href="index.html" class="waves-effect">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{ url('admin/siswa') }}"><i class="zmdi zmdi-star-outline"></i> Data Siswa</a></li>
        <li><a href="{{ url('admin/spp') }}"><i class="zmdi zmdi-star-outline"></i> Data Pembayaran SPP</a></li>
        {{-- <li><a href="index3.html"><i class="zmdi zmdi-star-outline"></i> Dashboard v3</a></li> --}}
        {{-- <li><a href="index4.html"><i class="zmdi zmdi-star-outline"></i> Dashboard v4</a></li> --}}
        </ul>
    </li>
    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-lock"></i> <span>Master Pengguna</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="authentication-signin.html"><i class="zmdi zmdi-star-outline"></i> SignIn 1</a></li>
        <li><a href="authentication-signup.html"><i class="zmdi zmdi-star-outline"></i> SignUp 1</a></li>
        <li><a href="authentication-lock-screen.html"><i class="zmdi zmdi-star-outline"></i> Lock Screen</a></li>
        <li><a href="authentication-reset-password.html"><i class="zmdi zmdi-star-outline"></i> Reset Password 1</a></li>
        </ul>
    </li>

    

</div>
<!--End sidebar-wrapper-->