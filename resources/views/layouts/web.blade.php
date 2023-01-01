<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RonInve | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('_seo')
    <link rel="shortcut icon" href="{{ asset('website') }}/images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="{{ asset('website') }}/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/aos/aos.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/default.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/responsive.css">
    @yield('_css')
</head>
<body>
<div class="preloader">
    <div class="loader">
        <span class="loading">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </span>
    </div>
</div>
    <!--====== Start Header Section ======-->
    @include('website.share.header')
    <!--====== End Header Section ======-->

    @yield('content')

    <!--====== Start Footer ======-->
    @include('website.share.footer')
    <!--====== End Footer ======-->
<a href="#" class="back-to-top" ><i class="far fa-angle-up"></i></a>
<script src="{{ asset('website') }}/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('website') }}/vendor/popper/popper.min.js"></script>
<script src="{{ asset('website') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('website') }}/vendor/slick/slick.min.js"></script>
<script src="{{ asset('website') }}/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('website') }}/vendor/jquery.counterup.min.js"></script>
<script src="{{ asset('website') }}/vendor/jquery.waypoints.js"></script>
<script src="{{ asset('website') }}/vendor/parallax.min.js"></script>
<script src="{{ asset('website') }}/vendor/aos/aos.js"></script>
<script src="{{ asset('website') }}/js/theme.js"></script>
@stack('_js')
</body>
</html>
