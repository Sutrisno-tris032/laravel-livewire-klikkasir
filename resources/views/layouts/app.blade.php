<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>:: Iconic :: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts-c3/plugin.css') }}" />

    <style>
        .annual_report .c3-axis.c3-axis-y {
            display: none;
        }

        .annual_report .c3-axis.c3-axis-x {
            display: none;
        }
    </style>

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body data-theme="light" class="font-nunito">

    <div id="wrapper" class="theme-cyan">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ asset('assets/images/logo-icon.svg') }}" width="48" height="48" alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Top navbar div start -->
        <livewire:component.menu.navbar />
        
        <!-- main left menu -->
        <livewire:component.menu.left-side-bar>
        

        <!-- rightbar icon div -->
        <livewire:component.menu.right-side-bar>

        <!-- Content -->
        {{ $slot }}
    </div>

    @stack('scripts')
    
    <!-- Javascript -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

    <!-- page vendor js file -->
    <script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>

    <!-- page js file -->
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/index8.js') }}"></script>
</body>

</html>