<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Grupos!</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
        <br>

        <div class="container text-center ">
            
            <a href="/grupos/create" class="btn btn-outline-light btn-block btn-lg">¡Crea tu propio grupo!</a>
            
                <div class="row cartas">
                        @foreach($groups as $group)
                    <div class="card col-12 col-md-7 col-lg-3 carta">
        
                            <img class="card-img-top" src="{{ asset ('svg/negro.png') }}" alt="Card image cap">
                                <div class="card-body">
                                
                                <h5 class="card-title"> <a href="/grupos/show/ {{ $group->id }} " class="">{{ $group->title }}</a></h5> <br>
                                    {{ $group->description }} <br>
                                    {{ $group->place }} <br>
                                    {{ $group->date }} <br>
                                    {{ $group->limit }} <br>

                                    @if($group->user_id == $id)  
                                        {{ $group->pendingRequest()->count() . ' solicitudes pendientes.' }} <br>
                                        <a class="btn btn-primary" href="/grupos/edit/{{ $group->id  }}">Editar tu grupo</a>
                                    @else
                                        {{-- si no es el creador, puede pedir el ingreso. --}}
                                        <br>
                                        <a href="/grupos/request/{{ $group->id }}" class="btn btn-success">Solicitar ingreso al grupo</a>
                                    @endif
                                </div>
                    </div>
                    @endforeach
            </div>
            
        </div>
        
    </div>
</body>
</html>