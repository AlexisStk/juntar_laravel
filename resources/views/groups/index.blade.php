<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Grupos!</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
        <br>

        <div class="container py=6 blanco ">
            
            <a href="/grupos/create">Crea tu propio grupo.</a>
            
                <div class="row">
                        @foreach($groups as $group)
                    <div class="card col-12 col-md-6 col-lg-3 carta">
        
                            <img class="card-img-top" src="{{ asset ('svg/prueba.png') }}" alt="Card image cap">
                                <div class="card-body">
                                
                                <h5 class="card-title"> <a href="/grupos/show/ {{ $group->id }} ">{{ $group->title }}</a></h5> <br>
                                    {{ $group->description }} <br>
                                    {{ $group->place }} <br>
                                    {{ $group->date }} <br>
                                    {{ $group->limit }} <br>

                                    @if($group->user_id == $id)  
                                        {{ $group->pendingRequest()->count() . ' solicitudes pendientes.' }} <br>
                                        <a class="btn btn-primary btn-sm" href="/grupos/edit/{{ $group->id  }}">Sos creador de este grupo</a>
                                    @else
                                        {{-- si no es el creador, puede pedir el ingreso. --}}
                                        <a href="/grupos/request/{{ $group->id }}">Solicitar ingreso al grupo</a>
                                    @endif
                                </div>
                    </div>
                    @endforeach
            </div>
            
        </div>
        
    </div>
</body>
</html>