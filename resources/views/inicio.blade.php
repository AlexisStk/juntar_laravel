<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head');
    <title>Inicio</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
    <br>
    <div class="col-2">
    <ul class="list-group"> {{--HACER QUE APAREZCA CADA GRUPO--}}
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
    </div>
    
    {{--@include('layouts.footer')--}}
    @include('layouts.scripts')

    
</body>
</html>