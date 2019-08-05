<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/skins/_all-skins.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('backend.components.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('backend.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('backend.components.breadcrumb')

    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backend.components.footer')

  <!-- Control Sidebar -->
  {{-- @include('backend.components.side_right') --}}
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="{{ asset('public/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
{{-- jQuery UI 1.11.4 --}}
<script src="{{ asset('public/backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('public/backend/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('public/backend/dist/js/demo.js') }}"></script>

<script src="{{ asset('public/backend/dist/js/admin.js') }}"></script>

@stack('script')

<!-- jQuery 3 -->
</body>
</html>
