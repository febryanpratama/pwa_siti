<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true"
        data-img="{{ asset('') }}admin/app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="{{ asset('') }}admin/app-assets/images/logo/logo.png" />
                    <h3 class="brand-text">StarLabSys</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('admin/dashboard') ? 'open' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="ft-home"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('admin/guru') ? 'open' : '' }}">
                <a href="{{ url('admin/guru') }}">
                    <i class="ft-align-center"></i>
                    <span class="menu-title" data-i18n="">Data Guru</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('admin/siswa') ? 'open' : '' }}">
                <a href="{{ url('admin/siswa') }}">
                    <i class="ft-align-center"></i>
                    <span class="menu-title" data-i18n="">Data Siswa</span>
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
            </li>
            <li class=" nav-item {{ request()->is('admin/spp') ? 'open' : '' }}">
                <a href="{{ url('admin/spp') }}">
                    <i class="ft-file-text"></i>
                    <span class="menu-title" data-i18n="">Data Pembayaran SPP</span>
                </a>
            </li>
            {{-- <li class=" nav-item {{ request()->is('pricing') ? 'open' : '' }}">
                <a href="{{ url('pricing') }}">
                    <i class="ft-bar-chart-2"></i>
                    <span class="menu-title" data-i18n="">Pricing</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('client') ? 'open' : '' }}">
                <a href="{{ url('client') }}">
                    <i class="ft-user-check"></i>
                    <span class="menu-title" data-i18n="">Client</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="https://themeselection.com/support">
                    <i class="ft-settings"></i>
                    <span class="menu-title" data-i18n="">Setting</span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>