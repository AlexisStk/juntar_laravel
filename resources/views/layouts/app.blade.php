<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JuntAR!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    @include('layouts.head')
</head>
    @if(!(Auth::check()))
<body class="fondoAnimado">
    
    @include('layouts.navbar')


        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer')
</body>
    @endif

    @if(Auth::check())
    <body class="bodyAzul">
        
        @include('layouts.navbar')
    
    
            <main class="py-4">
                @yield('content')
            </main>

    </body>
        @endif

</html>
