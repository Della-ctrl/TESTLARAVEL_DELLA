<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" type="image/x-icon">

    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}?v={{ date('YmdHis') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}?v={{ date('YmdHis') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}?v={{ date('YmdHis') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}?v={{ date('YmdHis') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}?v={{ date('YmdHis') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}?v={{ date('YmdHis') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?v={{ date('YmdHis') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" 
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}?v={{ date('YmdHis') }}"
    >
    <!-- overlayScrollbars -->
    <link rel="stylesheet" 
        href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}?v={{ date('YmdHis') }}"
    >
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}?v={{ date('YmdHis') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}?v={{ date('YmdHis') }}">
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css?v={{ date('YmdHis') }}" rel="stylesheet" />
    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?v={{ date('YmdHis') }}">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/86bd5d84df.js" crossorigin="anonymous"></script>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" 
                src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" 
                alt="Loader GIF" height="60" width="60"
            >
        </div>
        <!-- End Of Preloader -->