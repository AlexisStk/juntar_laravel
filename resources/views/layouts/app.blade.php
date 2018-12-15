<!DOCTYPE html>
<head>

    @include('layouts.head')
</head>
<body class="fondoAnimado">
    @include('layouts.navbar')

    <div>
        <main class="py-4">
            @yield('content')
        </main>

    </div>

    @include('layouts.footer')
    @include('layouts.scripts')
</body>
</html>
