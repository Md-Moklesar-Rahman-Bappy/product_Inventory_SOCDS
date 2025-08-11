<!DOCTYPE html>
<html lang="en">
<head>
  <title>SOCDS Project Admin - Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Assets -->
  <link rel="stylesheet" href="{{ asset('index/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('index/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('index/vendor/animate/animate.css') }}">
<link rel="stylesheet" href="{{ asset('index/vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" href="{{ asset('index/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('index/css/util.css') }}">
<link rel="stylesheet" href="{{ asset('index/css/main.css') }}">

</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
        <img src="{{ asset('index/images/img-01.png') }}" alt="IMG">
        </div>


        <form class="login100-form validate-form" method="POST" action="{{ route('login.action') }}">
          @csrf

          <span class="login100-form-title">Project Member Login</span>

          {{-- Flash Messages --}}
          @if (session('success'))
            <div class="alert alert-success w-100 text-center">{{ session('success') }}</div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger w-100 text-center">{{ session('error') }}</div>
          @endif

          {{-- Email --}}
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                   value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            @error('email')
              <div class="invalid-feedback d-block text-white">{{ $message }}</div>
            @enderror
          </div>

          {{-- Password --}}
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                   placeholder="Password" required autocomplete="current-password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            @error('password')
              <div class="invalid-feedback d-block text-white">{{ $message }}</div>
            @enderror
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">Login</button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">Forgot</span>
            <a class="txt2" href="#">Username / Password?</a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="{{ route('register') }}">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
    <script src="{{ asset('index/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.js-tilt').tilt({
        scale: 1.1
        });
    });
    </script>

    <script src="{{ asset('index/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('index/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('index/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('index/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('index/js/main.js') }}"></script>

</body>
</html>
