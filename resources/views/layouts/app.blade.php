<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title') | {{ config('app.name', 'Bandelli Survey') }} </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('assets/wizard-form/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/wizard-form/css/style.css')}}">
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   
    <!-- Main-StyleSheet include -->
    
</head>

<body>
    @if (!(Route::is('login') || Route::is('password.request') || Route::is('password.reset')))
        @include('common.header')
    @endif

    <main class="main">
        @yield('content')
    </main>
    @include('common.footer')
    <script type="text/javascript">
        var configData = {
            url: "{!!route('get-question')!!}",
            type: '-1'
        }
    </script>
    @include('layouts.front-scripts')
    @yield('page-script')
</body>

</html>