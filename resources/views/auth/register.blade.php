<!DOCTYPE html>
<html lang="en">
<head>
  <title>SOCDS Project Admin - Register</title>
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
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <style>
    .container-login100 {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 0 !important;
    }
    .wrap-login100 {
      padding: 40px 55px;
    }
    .login100-form-title {
      margin-bottom: 25px;
    }
  </style>
</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{ asset('index/images/img-01.png') }}" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('register.save') }}" novalidate role="form">
          @csrf

          <span class="login100-form-title">Create Your Account</span>

          {{-- Flash Messages --}}
          @foreach (['success', 'error'] as $msg)
            @if (session($msg))
              <div class="alert alert-{{ $msg }} w-100 text-center">{{ session($msg) }}</div>
            @endif
          @endforeach

          {{-- Name --}}
          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <input class="input100 @error('name') is-invalid @enderror" type="text" name="name"
                   value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name">
            <span class="focus-input100"></span>
            <span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
            @error('name')
              <div class="invalid-feedback d-block text-white">{{ $message }}</div>
            @enderror
          </div>

          {{-- Email --}}
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                   value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
            <span class="focus-input100"></span>
            <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            @error('email')
              <div class="invalid-feedback d-block text-white">{{ $message }}</div>
            @enderror
          </div>

          {{-- Password --}}
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input id="password" class="input100 @error('password') is-invalid @enderror"
                   type="password" name="password" placeholder="Password"
                   required autocomplete="new-password">
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            @error('password')
              <div class="invalid-feedback d-block text-white">{{ $message }}</div>
            @enderror
          </div>

          {{-- Confirm Password --}}
          <div class="wrap-input100 validate-input" data-validate="Please confirm your password">
            <input class="input100" type="password" name="password_confirmation"
                   placeholder="Confirm Password" required autocomplete="new-password">
            <span class="symbol-input100"><i class="fa fa-check" aria-hidden="true"></i></span>
          </div>

          {{-- Submit --}}
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">Register</button>
          </div>

          {{-- Links --}}
          <div class="text-center p-t-12">
            <span class="txt1">Already have an account?</span>
            <a class="txt2" href="{{ route('login') }}">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Custom Script -->
  <script>
    $(document).ready(function () {
      $('.js-tilt').tilt({ scale: 1.1 });

      $('.toggle-password').on('click', function () {
        const input = $('#password');
        const isPassword = input.attr('type') === 'password';
        input.attr('type', isPassword ? 'text' : 'password');
      });

      $('form').on('submit', function () {
        $('.login100-form-btn').prop('disabled', true).text('Registering...');
      });
    });
  </script>

  <!-- Scripts -->
  <script src="{{ asset('index/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('index/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('index/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('index/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('index/vendor/tilt/tilt.jquery.min.js') }}"></script>
  <script src="{{ asset('index/js/main.js') }}"></script>
</body>
</html>
