<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ $title .' | '. $settings->get('title') }}</title>

        <!-- Favicons -->
       <link rel="icon" type="image/png" href="{{ asset( $settings->get('favicon') ) }}" sizes="32x32">
       <link rel="apple-touch-icon" href="{{ asset( $settings->get('favicon') ) }}">

       <meta name="description" content="{{ ( $settings->get('seo_description') ) }}">
       <meta name="keywords" content="{{ ( $settings->get('seo_keywords') ) }}">
       <meta name="author" content="{{ ( $settings->get('seo_author') ) }}">

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

        {{ $style ?? null }}
     
    </head>
    <body>
        <!--
        @include('front.layouts.loader')   
        -->
        <div class="{{ request()->is('/') ? 'page' : "content"  }}-wrapper">
            @include('front.layouts.header')
            {{ $slot }}
            @include('front.layouts.footer')
        </div>
    </body>
</html>

    