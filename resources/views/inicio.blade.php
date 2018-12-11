<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head');
    <title>Inicio</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
    <br>
    {{--<ul class="list-group">
        <li class="list-group-item active">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
      </ul> --}}
      
    
    
    <div class="col-2">
    <ul class="list-group">
            {{--@foreach($groups) --}}}
            <a class="btn btn-primary" href="/grupos/create"><li class="list-group-item active">Crea tu propio grupo</li></a>    
    <a href="/grupos/show/"><li class="list-group-item">{{--{{ $group->title }}--}} Lorem, ipsum dolor. </li></a>
            <li class="list-group-item">Lorem, ipsum dolor.</li>
            <li class="list-group-item">Lorem, ipsum dolor.</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
          {{--@endforeach --}}
    </div>
    
    {{--@include('layouts.footer')--}}

    
</body>
</html>