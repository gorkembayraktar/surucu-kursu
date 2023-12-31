
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title  ?? 'Yönetim Paneli' }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href='{{ asset('back') }}/plugins/fontawesome-free/css/all.min.css'>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('back') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('back') }}/dist/css/adminlte.min.css">

  <!-- Toastr style -->
  <link rel="stylesheet" href="{{ asset('back') }}/plugins/toastr/toastr.min.css">

  <link rel="stylesheet" href='{{ asset('back/dist/css/app.css') }}'>


  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{ asset( $settings->get('favicon') ) }}" sizes="32x32">
  <link rel="apple-touch-icon" href="{{ asset( $settings->get('favicon') ) }}">

  <style>
    .site-yayinda{
      background: green;
      border-radius: 50%;
      padding: 8px;
      display: inline-block;
    }
    .site-kapali{
      background: red;
      border-radius: 50%;
      padding: 8px;
      display: inline-block;
    }
  </style>

  {{ $style ?? null }}

  <script>

    const BASE_URL = "";
    function api(path){
       return BASE_URL.concat( "/api".concat(path) );
    }
  </script> 


</head>
<!--<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">-->
  <body 
  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"
  id="csrf"
  data-value="{{ csrf_token() }}"
  >
<div class="wrapper">


<!-- Preloader -->
<!--
<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__wobble" src="{{ asset('') }}'dist/img/SmurfWebLogo.png')?>" alt="SmurfWebLogo" height="60" width="60" style="background:#fff;border-radius:50%;">
</div>
-->