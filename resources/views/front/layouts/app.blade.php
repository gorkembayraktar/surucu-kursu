<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ $title ?? config('app.name', 'Sürücü Kursu Scripti') }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="panel/uploads/settings_v/32x32/favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" href="panel/uploads/settings_v/32x32/favicon.png">

        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="SMURFWEB | Sürücü Kursu">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/remixicon.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/odometer.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/fancybox.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/aos.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/responsive.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/font-awesome/all.min.css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/sweetalert2.min.css">

        <style>

            @media (max-width: 767px) {
                .mo {
                    display: none !important;
                }
            }
            @media (min-width: 767px) {
                .ma {
                    display: none !important;
                }
            }

        </style>
     
    </head>
    <body>

        @include('front.layouts.loader')   
        
        <div class="{{ request()->is('/') ? 'page' : "content"  }}-wrapper">
            @include('front.layouts.header')
            {{ $slot }}
            @include('front.layouts.footer')
        </div>
    </body>
</html>

    