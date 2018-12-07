<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Grupos!</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
        <br>
<div class="card" style="width: 18rem;">
        
    <img class="card-img-top" src="{{ asset ('svg/prueba.png') }}" alt="Card image cap">
        <div class="card-body">
          
          @foreach($groups as $group)
        <h5 class="card-title">{{ $group->title }}</h5> <br>
            {{ $group->description }} <br>
            {{ $group->place }} <br>
            {{ $group->date }} <br>
            {{ $group->limit }} <br>

            @if($group->user_id == $id)  
                <a class="btn btn-primary btn-sm" href="/grupos/edit/{{ $group->id  }}">Sos creador de este grupo</a>
            @else
                {{-- //si no es el creador, puede pedir el ingreso. --}}
                <a href="/grupos/request/{{ $group->id }}">Solicitar ingreso al grupo</a>
            @endif
        @endforeach
        </div>
      </div>
    
    
      <div class="container py=6 blanco ">
        

        
    </div>
</body>
</html>