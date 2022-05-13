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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @PWA
</head>
<body>

<!-- Start wrapper-->
    <div id="wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
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
<!-- Chart js -->
<script src="{{ asset('') }}assets/plugins/Chart.js/Chart.min.js"></script>
<!--Peity Chart -->
<script src="{{ asset('') }}assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Index js -->
<script src="{{ asset('') }}assets/js/index.js"></script>

</body>

<!-- Mirrored from codervent.com/rukada/light-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 12:14:37 GMT -->
</html>
