<!DOCTYPE html>
<html lang="en">
<head>
  <title>SOCDS Project Admin - Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fonts and styles -->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>

              {{-- Flash Messages --}}
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif

              {{-- Registration Form --}}
              <form action="{{ route('register.save') }}" method="POST" class="user" novalidate>
                @csrf

                <div class="form-group">
                  <label for="name" class="sr-only">Full Name</label>
                  <input id="name" name="name" type="text"
                         class="form-control form-control-user @error('name') is-invalid @enderror"
                         value="{{ old('name') }}" placeholder="Full Name" autocomplete="name" required>
                  @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email" class="sr-only">Email Address</label>
                  <input id="email" name="email" type="email"
                         class="form-control form-control-user @error('email') is-invalid @enderror"
                         value="{{ old('email') }}" placeholder="Email Address" autocomplete="email" required>
                  @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password"
                           class="form-control form-control-user @error('password') is-invalid @enderror"
                           placeholder="Password" autocomplete="new-password" required>
                    @error('password')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                           placeholder="Repeat Password" autocomplete="new-password" required>
                    @error('password_confirmation')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
