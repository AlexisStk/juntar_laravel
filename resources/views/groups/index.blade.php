@extends('layouts.app')

@section('content')
        <br>

        <div class="container text-center ">
            
            <a href="/grupos/create" class="btn btn-outline-light btn-block btn-lg">¡Crea tu propio grupo!</a>
            
                <div class="row cartas col-12">
                        @foreach($groups as $group)
                    <div class="col-12 carta">
                        <div class="card fondoCard">
                            @if($group->groupAvatarPath == null)
                                <img style="width:100px;" class="mx-auto" src=" {{ asset('svg/signoPregunta.jpg') }} " alt=""/>
                            @else
                                <img style="width: 100px;" class="card-img-top img-fluid mx-auto" src="/storage/{{ $group->groupAvatarPath }}" alt="50px">
                            @endif
                            {{-- <img class="card-img-top" src="{{ asset ('svg/negro.png') }}" alt="Card image cap"> --}}
                                <div class="card-body lbltext">
                                
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
                    </div>
                    @endforeach
            </div>
            
        </div>
        
    </div>
@endSection