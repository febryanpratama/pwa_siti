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
        <a href="{{ url('admin/dashboard') }}" class="waves-effect">
        <i class="zmdi zmdi-widgets"></i> <span>Dashboard</span>
        {{-- <small class="badge float-right badge-danger">10</small> --}}
        </a>
    </li>
    <li class="sidebar-header">MAIN NAVIGATION</li>

    @role('Admin')
    <li>
        <a href="{{ url('admin') }}" class="waves-effect">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{ url('admin/siswa') }}"><i class="zmdi zmdi-star-outline"></i> Data Siswa</a></li>
        <li><a href="{{ route('tahunajaran.index') }}"><i class="zmdi zmdi-star-outline"></i> Data Tahun Ajaran</a></li>
        <li><a href="{{ url('admin/spp') }}"><i class="zmdi zmdi-star-outline"></i> Data SPP</a></li>
        {{-- <li><a href="index3.html"><i class="zmdi zmdi-star-outline"></i> Dashboard v3</a></li> --}}
        {{-- <li><a href="index4.html"><i class="zmdi zmdi-star-outline"></i> Dashboard v4</a></li> --}}
        </ul>
    </li>
    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-lock"></i> <span>Manajemen User</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{ route('manajemen_siswa.index') }}"><i class="zmdi zmdi-star-outline"></i>Manajemen Siswa </a></li>
        <li><a href="{{ route('manajemen_bendahara.index') }}"><i class="zmdi zmdi-star-outline"></i>Manajemen Bendahara</a></li>
        <li><a href="{{ route('manajemen_kepala_sekolah.index') }}"><i class="zmdi zmdi-star-outline"></i>Manajemen Kepala Sekolah</a></li>
        </ul>
    </li>

    @endrole


</div>
<!--End sidebar-wrapper-->
