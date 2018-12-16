<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
    <br>
    <br>
        @yield('content')
    
    {{--@include('layouts.footer')--}}
    @include('layouts.scripts')
</body>
</html>