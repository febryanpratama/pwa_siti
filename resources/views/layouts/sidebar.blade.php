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
        <li><a href="index.html"><i class="zmdi zmdi-star-outline"></i> Data Siswa</a></li>
        <li><a href="index2.html"><i class="zmdi zmdi-star-outline"></i> Data Tahun Ajaran</a></li>
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

    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="icons-font-awesome.html"><i class="zmdi zmdi-star-outline"></i> Font Awesome</a></li>
        <li><a href="icons-material-designs.html"><i class="zmdi zmdi-star-outline"></i> Material Design</a></li>
        <li><a href="icons-themify.html"><i class="zmdi zmdi-star-outline"></i> Themify Icons</a></li>
        <li><a href="icons-simple-line-icons.html"><i class="zmdi zmdi-star-outline"></i> Line Icons</a></li>
        <li><a href="icons-flags.html"><i class="zmdi zmdi-star-outline"></i> Flag Icons</a></li>
        </ul>
    </li>
    
    <li>
        <a href="widgets.html" class="waves-effect">
        <i class="zmdi zmdi-widgets"></i> <span>Widgets</span>
        <small class="badge float-right badge-danger">10</small>
        </a>
    </li>
    
    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-grid"></i> <span>Tables</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="table-simple-tables.html"><i class="zmdi zmdi-star-outline"></i> Simple Tables</a></li>
        <li><a href="table-header-tables.html"><i class="zmdi zmdi-star-outline"></i> Header Tables</a></li>
        <li><a href="table-color-tables.html"><i class="zmdi zmdi-star-outline"></i> Color Tables</a></li>
        <li><a href="table-striped-color-tables.html"><i class="zmdi zmdi-star-outline"></i> Striped Color Tables</a></li>
        <li><a href="table-data-tables.html"><i class="zmdi zmdi-star-outline"></i> Data Tables</a></li>
        </ul>
    </li>
    
    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-map"></i> <span>Maps</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="maps-google.html"><i class="zmdi zmdi-star-outline"></i> Google Maps</a></li>
        <li><a href="maps-vector.html"><i class="zmdi zmdi-star-outline"></i> Vector Maps</a></li>
        </ul>
    </li>
    
    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="zmdi zmdi-collection-folder-image"></i> <span>Sample Pages</span>
        <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="pages-invoice.html"><i class="zmdi zmdi-star-outline"></i> Invoice</a></li>
        <li><a href="pages-user-profile.html"><i class="zmdi zmdi-star-outline"></i> User Profile</a></li>
        <li><a href="pages-blank-page.html"><i class="zmdi zmdi-star-outline"></i> Blank Page</a></li>
            <li><a href="pages-coming-soon.html"><i class="zmdi zmdi-star-outline"></i> Coming Soon</a></li>
        <li><a href="pages-403.html"><i class="zmdi zmdi-star-outline"></i> 403 Error</a></li>
        <li><a href="pages-404.html"><i class="zmdi zmdi-star-outline"></i> 404 Error</a></li>
        <li><a href="pages-500.html"><i class="zmdi zmdi-star-outline"></i> 500 Error</a></li>
        </ul>
    </li>

    <li>
        <a href="javaScript:void();" class="waves-effect">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level One</a></li>
        <li>
            <a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
            <li><a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level Two</a></li>
            <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                <li><a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level Three</a></li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-star-outline"></i> Level Three</a></li>
                </ul>
            </li>
            </ul>
        </li>
        <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-star-outline"></i> Level One</a></li>
        </ul>
    </li>
    <li class="sidebar-header">LABELS</li>
    <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
    <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
    <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
    </ul>

</div>
<!--End sidebar-wrapper-->