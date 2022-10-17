<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true"
        data-img="{{ asset('') }}admin/app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="{{ asset('') }}assets/tunasmulya.png" />
                    <h3 class="brand-text">SMA Taman Mulia</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @role('Admin')
                
                <li class=" nav-item {{ request()->is('admin/dashboard') ? 'open' : '' }}">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="ft-home"></i>
                        <span class="menu-title" data-i18n="">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-sub"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Management Data</span></a>
                    <ul class="menu-content" style="">
                        <li class="navigation-divider is-shown"></li>
                        <li class="is-shown {{ request()->is('admin/guru') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/guru') }}">Guru</a>
                        </li>
                        <li class="is-shown {{ request()->is('admin/bendahara') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/bendahara') }}">Bendahara</a>
                        </li>
                        <li class="is-shown {{ request()->is('admin/siswa') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/siswa') }}">Siswa</a>
                        </li>
                        <li class="is-shown {{ request()->is('admin/alumni') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/alumni') }}">Alumni</a>
                        </li>
                        <li class="is-shown {{ request()->is('admin/kelas') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/kelas') }}">Kelas</a>
                        </li>
                        <li class="is-shown {{ request()->is('admin/tahun-ajaran') ? 'open active' : '' }}">
                            <a class="menu-item" href="{{ url('admin/tahun-ajaran') }}">Tahun Ajaran</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class=" nav-item {{ request()->is('admin/guru') ? 'open active' : '' }}">
                    <a href="{{ url('admin/guru') }}">
                        <i class="ft-align-center"></i>
                        <span class="menu-title" data-i18n="">Data Guru</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/bendahara') ? 'open' : '' }}">
                    <a href="{{ url('admin/bendahara') }}">
                        <i class="ft-align-center"></i>
                        <span class="menu-title" data-i18n="">Data Bendahara</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/bendahara') ? 'open' : '' }}">
                    <a href="{{ url('admin/bendahara') }}">
                        <i class="ft-align-center"></i>
                        <span class="menu-title" data-i18n="">Data KepSek</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/siswa') ? 'open' : '' }}">
                    <a href="{{ url('admin/siswa') }}">
                        <i class="ft-align-center"></i>
                        <span class="menu-title" data-i18n="">Data Siswa</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/alumni') ? 'open' : '' }}">
                    <a href="{{ url('admin/alumni') }}">
                        <i class="ft-align-center"></i>
                        <span class="menu-title" data-i18n="">Data Alumni</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/kelas') ? 'open' : '' }}">
                    <a href="{{ url('admin/kelas') }}">
                        <i class="ft-home"></i>
                        <span class="menu-title" data-i18n="">Data Kelas</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/tahun-ajaran') ? 'open' : '' }}">
                    <a href="{{ url('admin/tahun-ajaran') }}">
                        <i class="ft-briefcase"></i>
                        <span class="menu-title" data-i18n="">Data Tahun Ajaran</span>
                    </a>
                </li> --}}
                <li class=" nav-item {{ request()->is('admin/spp') ? 'open' : '' }}">
                    <a href="{{ url('admin/spp') }}">
                        <i class="ft-file-text"></i>
                        Pembayaran SPP
                        {{-- <span class="menu-title"></span> --}}
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('admin/laporan-spp') ? 'open' : '' }}">
                    <a href="{{ url('admin/laporan-spp') }}">
                        <i class="ft-file-text"></i>
                        <span class="menu-title" data-i18n="">Laporan SPP</span>
                    </a>
                </li>
            @endrole

            @role('Bendahara')
                <li class=" nav-item {{ request()->is('bendahara') ? 'open' : '' }}">
                    <a href="{{ url('bendahara') }}">
                        <i class="ft-home"></i>
                        <span class="menu-title" data-i18n="">Dashboard</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('bendahara/spp') ? 'open' : '' }}">
                    <a href="{{ url('bendahara/spp') }}">
                        <i class="ft-file-text"></i>
                        <span class="menu-title" data-i18n="">Pembayaran SPP</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('bendahara/laporan-spp') ? 'open' : '' }}">
                    <a href="{{ url('bendahara/laporan-spp') }}">
                        <i class="ft-file-text"></i>
                        <span class="menu-title" data-i18n="">Laporan SPP</span>
                    </a>
                </li>
            @endrole
            @role('Kepsek')
                <li class=" nav-item {{ request()->is('kepsek') ? 'open' : '' }}">
                    <a href="{{ url('kepsek') }}">
                        <i class="ft-home"></i>
                        <span class="menu-title" data-i18n="">Dashboard</span>
                    </a>
                </li>
                {{-- <li class=" nav-item {{ request()->is('bendahara/spp') ? 'open' : '' }}">
                    <a href="{{ url('bendahara/spp') }}">
                        <i class="ft-file-text"></i>
                        <span class="menu-title" data-i18n="">Data SPP</span>
                    </a>
                </li> --}}
                <li class=" nav-item {{ request()->is('kepsek/laporan-spp') ? 'open' : '' }}">
                    <a href="{{ url('kepsek/laporan-spp') }}">
                        <i class="ft-file-text"></i>
                        <span class="menu-title" data-i18n="">Laporan SPP</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</div>
