<!DOCTYPE html>
<html lang="en">

<head>
  <title>SMA N 1 - Tigapanah</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
  <!--===============================================================================================-->

</head>

<body>


  <div class="container-login100">

    <div class="wrap-login100">
      <div class="limiter">
        <!-- Notifikasi menggunakan flash session data -->
        @if (session('success'))
          <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ session('success') }}
          </div>
        @endif

        @if (session('error'))
          <div class="alert alert-error">
            <div class="alert alert-danger" id="success-alert">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ session('error') }}
            </div>
          </div>
        @endif
        <div class="login100-form-title" style="background-image: url(http://127.0.0.1:8000/login/images/bg-01.jpg);">
          <span class="login100-form-title-1">
            Sign In
            <br>
            Website Pendaftaran Ulang SMA Negeri 1 Tigapanah
          </span>
        </div>

        <form class="login100-form validate-form" action="/login_proses" method="POST">
          @csrf
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Enter username">
            <span class="focus-input100"></span>
            @error('username')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Enter password">
            <span class="focus-input100"></span>
            @error('password')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="d-flex flex-wrap">
            <button class="btn btn-primary btn-sm rounded-pill px-4 m-1">
              Login
            </button>
            <a href="/register_web" class="btn btn-success btn-sm rounded-pill m-1">
              Register Siswa
            </a>
            <a href="/register_web_admin" class="btn btn-warning btn-sm rounded-pill m-1">
              Register Tata Usaha
            </a>
          </div>


        </form>
      </div>
    </div>
  </div>

  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login/js/main.js') }}"></script>

  {{-- Alert Close --}}
  <script src="{{ asset('dist/js/custom.js') }}"></script>



</body>

</html>
