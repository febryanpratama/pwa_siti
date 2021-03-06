<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('') }}assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
    <link href="{{ asset('') }}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{ asset('') }}assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{ asset('') }}assets/css/sidebar-menu.css" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{ asset('') }}assets/css/app-style.css" rel="stylesheet"/>

    <link href="{{ asset('') }}assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">

    {{-- <script src="{{ asset('') }}assets/js/app.js" defer></script> --}}
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('') }}assets/css/app.css" rel="stylesheet">

    @PWA
</head>
<body>

<!-- Start wrapper-->
<div id="app2">

    <div id="wrapper">
    
    @include('layouts.sidebar')

    @include('layouts.header')

    <div class="clearfix"></div>
    
    <div class="content-wrapper">
        @yield('content')
        <!-- End container-fluid-->
        
    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
    
    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
            Copyright ?? 2020 Rukada Admin
            </div>
        </div>
    </footer>
    <!--End footer-->
    
    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
    
    <!-- simplebar js -->
    <script src="{{ asset('') }}assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- waves effect js -->
    <script src="{{ asset('') }}assets/js/waves.js"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('') }}assets/js/sidebar-menu.js"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('') }}assets/js/app-script.js"></script>
    <!--Data Tables js-->
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>

    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        @if (\Session::has('success'))
            <script>
                swal("Success!", "{!! \Session::get('success') !!}", "success");
            </script>
        @elseif(\Session::has('error'))
            <script>
                swal("Error !", "{!! \Session::get('error') !!}", "error");
            </script>
        @endif
        @if ($errors->any())
            <script>
                swal("Error !", "{!! \Session::get('error') !!}", "error");
            </script>
        @endif
    <!-- Chart js -->
    <script src="{{ asset('') }}assets/plugins/Chart.js/Chart.min.js"></script>
    <!--Peity Chart -->
    <script src="{{ asset('') }}assets/plugins/peity/jquery.peity.min.js"></script>
    <!-- Index js -->
    <script src="{{ asset('') }}assets/js/index.js"></script>
</div>
</body>
    
    <!-- Mirrored from codervent.com/rukada/light-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 12:14:37 GMT -->
</html>
