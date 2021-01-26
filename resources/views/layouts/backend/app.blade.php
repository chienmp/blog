<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('love_heart_icon_178900.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Google Fonts -->
    <link href="{{ asset('fonts/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/icons.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awsesome-all.min.css') }}" type="text/css" />
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css') }}"
        rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/plugins/node-waves/waves.css') }}"
        rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/plugins/animate-css/animate.css') }}"
        rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/css/style.css') }}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('bower_components/adminbsb-materialdesign/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bower_components/toastr/toastr.min.css') }}">
    @stack('css')
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>{{ trans('wait') }}</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <form action="#">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" name="query" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('layouts.backend.partial.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.backend.partial.sidebar')
        <!-- #END# Left Sidebar -->
    </section>
    <section class="content">
        @yield('content')
    </section>
    <!-- Jquery Core Js -->
    <script src="{{ asset('bower_components/adminbsb-materialdesign/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('bower_components/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <!-- Select Plugin Js -->
    <script
        src="{{ asset('bower_components/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js') }}">
    </script>
    <!-- Slimscroll Plugin Js -->
    <script
        src="{{ asset('bower_components/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js') }}">
    </script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('bower_components/adminbsb-materialdesign/plugins/node-waves/waves.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('bower_components/adminbsb-materialdesign/js/admin.js') }}"></script>
    <!-- Demo Js -->
    <script src="{{ asset('bower_components/adminbsb-materialdesign/js/demo.js') }}"></script>
    {{-- <script src="{{ asset('bower_components/toastr/toastr.min.js') }}"></script> --}}
    {{-- {!! Toastr::message() !!}
    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
    </script> --}}
    @stack('js')

</body>

</html>
