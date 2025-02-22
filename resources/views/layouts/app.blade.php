<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Developer Lima">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}">


</head>

<body>
    <div id="app">

        @include('layouts.includes.home-page-navbar')

        <main class="py">
            @yield('content')
        </main>
    </div>

    {{-- BOOTSTRAP5 --}}
    <script  src="{{asset('assets/js/jquery-3.6.0.min.js')}}"> </script>
    <script  src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script  src="{{asset('assets/js/owl.carousel.js')}}"></script>

    <script>
         $(document).ready(function() {
            $('.olw-categoria-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });
        });
   
    </script>


</body>

</html>