<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SOCDS Project - @yield('title', 'Dashboard')</title>

  <!-- Fonts & Styles -->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

  @stack('styles')
</head>
<body id="page-top">
  <div id="wrapper">
    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('layouts.navbar')

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>

          @yield('contents')
        </div>
      </div>

      @include('layouts.footer')
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Scripts -->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

  @stack('scripts')
</body>
</html>
