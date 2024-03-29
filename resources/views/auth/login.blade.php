<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 16:48:00 GMT -->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="{{ asset('') }}log/assets/images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="{{ asset('') }}log/assets/images/favicon.png" type="image/x-icon">
      <title>SMA - TAMAN MULIA</title>
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/font-awesome.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/vendors/icofont.css">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/vendors/themify.css">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/vendors/flag-icon.css">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/vendors/feather-icon.css">
      <!-- Plugins css start-->
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/vendors/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/style.css">
      <link id="color" rel="stylesheet" href="{{ asset('') }}log/assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('') }}log/assets/css/responsive.css">
      @PWA
   </head>
   <body>
      <!-- login page start-->
      <div class="container-fluid p-0">
      <div class="row m-0">
         <div class="col-12 p-0">
            <div class="login-card">
               <div>
                  <div>
                     <a class="logo" href="index.html"><img class="img-fluid for-light" src="{{ asset('assets/images/logo-remove.png') }}" width="100" height="200" alt="looginpage"><img class="img-fluid for-dark" src="#" alt="looginpage"></a>
                  </div>
                  <div class="login-main">
                     <form class="theme-form" action="{{ route('login') }}" method="POST">
                        @csrf                         
                        <h4>Sign in to account</h4>
                        <p>Enter your email & password to login</p>
                        <div class="form-group">
                           <label class="col-form-label">E-Mail Address</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                           <label class="col-form-label">Password</label>
                           <div class="form-input position-relative">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                        </div>
                        <div class="form-group mb-0">
                           <div class="checkbox p-0">
                              <input id="checkbox1" type="checkbox">
                              <label class="text-muted" for="checkbox1">Remember password</label>
                              <div class="text-end mt-3">
                                 <button class="btn btn-primary btn-block w-100" type="submit">Login</button>
                              </div>
                              <div class="mt-3">
                                 <a href="{{ url('/') }}">
                                 <button class="btn btn-primary btn-block w-100" type="button">Cek Data SPP</button>
                                 </a>
                              </div>
                           </div>
                     </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- latest jquery-->
         <script src="{{ asset('') }}log/assets/js/jquery-3.5.1.min.js"></script>
         <!-- Bootstrap js-->
         <script src="{{ asset('') }}log/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
         <!-- feather icon js-->
         <script src="{{ asset('') }}log/assets/js/icons/feather-icon/feather.min.js"></script>
         <script src="{{ asset('') }}log/assets/js/icons/feather-icon/feather-icon.js"></script>
         <!-- scrollbar js-->
         <!-- Sidebar jquery-->
         <script src="{{ asset('') }}log/assets/js/config.js"></script>
         <!-- Plugins JS start-->
         <!-- Plugins JS Ends-->
         <!-- Theme js-->
         <script src="{{ asset('') }}log/assets/js/script.js"></script>
         <!-- login js-->
         <!-- Plugin used-->
      </div>
   </body>
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 16:48:00 GMT -->
</html>