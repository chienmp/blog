<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('blog-icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Blog') }}</title>
    <!-- Font -->

    <link href="{{ asset('fonts/roboto.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awsesome-all.min.css') }}" />
    <!-- Stylesheets -->
    <link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components/flag-icon-css/css/flag-icon.css') }}">

    @stack('css')
</head>
<body>

@include('layouts.frontend.partial.header')

@yield('content')

@include('layouts.frontend.partial.footer')

<!-- SCIPTS -->
<script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
@stack('js')
</body>
</html>