<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">

  <!-- Title Page-->
  <title>SMA N 1 - Tigapanah</title>
  <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
  <!-- Icons font CSS-->
  <link href="{{ asset('register/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
    media="all">
  <link href="{{ asset('register/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
    media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
    rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="{{ asset('register/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('register/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="{{ asset('register/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">

    <div class="wrapper wrapper--w680">
      <!-- Notifikasi menggunakan flash session data -->
      @if (session('success'))
        <div class="alert alert-success" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>{{ session('success') }}
        </div>
      @endif

      @if (session()->has('error'))
        <div class="alert alert-error">
          <div class="alert alert-danger" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ session('error') }}
          </div>
        </div>
      @endif
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Daftar Akun</h2>
          <form method="POST" action="/register_proses_admin">
            @csrf
            <div class="input-group">
              <input class="input--style-1" type="text" placeholder="Username" name="username"
                value="{{ old('username') }}" required>
            </div>
            @error('username')
              <p style="color: red; margin-top: -20px !important;">{{ $message }}</p>
            @enderror
            <div class="input-group">
              <input class="input--style-1" type="password" placeholder="Password" name="password" required>
            </div>
            @error('password')
              <p style="color: red; margin-top: -20px !important;">{{ $message }}</p>
            @enderror
            <div class="input-group">
              <input class="input--style-1" type="text" placeholder="No Telp" name="no_telp"
                value="{{ old('no_telp') }}" required>
            </div>
            @error('no_telp')
              <p style="color: red; margin-top: -20px !important;">{{ $message }}</p>
            @enderror
            <div class="input-group">
              <input class="input--style-1" type="text" placeholder="Email" name="email"
                value="{{ old('email') }}" required>
            </div>
            @error('email')
              <p style="color: red; margin-top: -20px !important;">{{ $message }}</p>
            @enderror
            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit">Submit</button>
              <a href="/login_web" class="btn btn--radius btn--green">Login Akun</a>
            </div>
            {{-- <div class="p-t-20">

                        </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery JS-->
  <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
  <!-- Vendor JS-->
  <script src="{{ asset('register/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('register/vendor/datepicker/moment.min.js') }}"></script>
  <script src="{{ asset('register/vendor/datepicker/daterangepicker.js') }}"></script>

  <!-- Main JS-->
  <script src="{{ asset('register/js/global.js') }}"></script>

  {{-- Alert Close --}}
  <script src="{{ asset('dist/js/custom.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
