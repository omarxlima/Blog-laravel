<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    {{-- Styles  --}}
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- Tabelas  --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
     --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>

<body>

    @include('layouts.includes.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.includes.admin-sidebar')
        <div id="layoutSidenav_content">
            <main>

                <main class="py-4">
                    @yield('content')
                </main>

            </main>

            @include('layouts.includes.admin-footer')
        </div>

    </div>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>

    {{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> --}}

</body>

</html>
