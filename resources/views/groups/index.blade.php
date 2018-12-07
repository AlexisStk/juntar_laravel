<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Grupos!</title>
</head>
<body class="bodyAzul">
    {{-- @include('layouts.navbar') --}}
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="collapse_target">
    
                <a class="navbar-brand text-center"href="/"><img src="{{ asset ('svg/logo.png') }}"></a>
    
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/inicio">Inicio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/grupos">Mas Grupos!</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/perfil">Mi Perfil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </li>

            </ul>
        </div>
    </div>

</nav>
<br>
        <br>
        <br>
        <br>    
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