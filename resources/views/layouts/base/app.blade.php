<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ $title ?? config('app.name') }}</title>
    @endif
    {{-- <title>Dashboard Analytics - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title> --}}
    <link rel="apple-touch-icon" href="{{ asset('') }}admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}admin/app-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/components.css">
    <!-- END: Theme CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.css" integrity="sha512-5k2n0KtbytaKmxjJVf3we8oDR34XEaWP2pibUtul47dDvz+BGAhoktxn7SJRQCHNT5aJXlxzVd45BxMDlCgtcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
    href="{{ asset('') }}admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/pages/chat-application.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/pages/dashboard-analytics.css">
    
    <!-- END: Page CSS-->
    
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/assets/css/style.css">
    <!-- END: Custom CSS-->
    
    <style>
        .btn-wrap-text{
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            text-overflow: ellipsis;
        }
    </style>

    {{ pwa_meta() }}
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts._partials.app_header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts._partials.app_sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')

    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    @include('layouts._partials.app_footer')
    <!-- END: Footer-->


    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url("admin/setting") }}" method="POST">
            
                <div class="modal-body">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="control-label">Setting Semester</label>
                            <select name="tahun_ajaran_id" id='semesterlist'  class="form-control semesterlist">
                                <option value="" selected disabled> == Pilih == </option>
                                
                            </select>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
        type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('') }}admin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('') }}admin/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('') }}admin/app-assets/js/scripts/pages/dashboard-analytics.js"
        type="text/javascript"></script>
    <!-- END: Page JS-->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
    
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('') }}admin/app-assets/js/scripts/tables/datatables/datatable-styling.js" type="text/javascript"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('') }}admin/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>

    {{-- Dropify --}}
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    {{-- End Dropify --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('.select2').select2();
           
            $.ajax({
                url: "{{ url('api/get-semester') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {

                    if (data.status == true) {
                        // console.log(data)
                        $.each(data.data, function (i, item) {
                            // console.log(item.id)
                            $("select#dataset").append('<option value="'+item.id+'">'+item.semester+', '+item.tahun_ajaran+'</option>');
                        })
                    }
                }
            })

        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();

            $('.select2').select2({
                theme: 'bootstrap'
                // dropdownParent: $('#large')
            });
            @if (session('success'))
            swal("Great !", "{{ session('success') }}", "success");
            @endif ()
            @if (session('error'))
            swal("Oh No !", "{{ session('error') }}", "error");
            @endif ()
        });
    </script>
    <script>
                
            $(document).ready(function(){

                
                $.ajax({
                    url: "{{ url('api/get-semester') }}",
                    type: "GET",
                        dataType: "json",
                        success: function (data) {
                            
                            // console.log(data.data)
                            if (data.status == true) {
                                // console.log(data)
                                var listData = data.data;
                                // console.log(listData.length)
                                for (let index = 0; index < listData.length; index++) {
                                    // console.log(listData[index])
                                    $("select#semesterlist").html('')
                                    // const element = array[index];
                                    // console.log(listData[index].tahun_ajaran)
                                    setTimeout(() => {
                                        $("select#semesterlist").append('<option value="'+listData[index].id+'">'+listData[index].semester+', '+listData[index].tahun_ajaran+'</option>');
                                    }, 1000);
                                }
                            }
                        }
                    })
                    

            })
        </script>

    @yield('scripts')

</body>
<!-- END: Body-->

</html>