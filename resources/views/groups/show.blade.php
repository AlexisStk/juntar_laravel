@extends('layouts.app')
@section('content')
<head>
    <title>{{ $group->title }}</title>
</head>
    
            <div class="container">

                    <div class="row">
              
                    <div class="col-lg-3 card"><br>
                    
                    @if($group->groupAvatarPath == null)
                        <img style="width:100px" class="mx-auto" src=" {{ asset('svg/signoPregunta.jpg') }} " alt=""/>
                    @else
                        <img style="width: 100px;" class="card-img-top img-fluid mx-auto" src="/storage/{{ $group->groupAvatarPath }}" alt="50px">
                    @endif

                    <h4 class="text-uppercase text-center" style="font-weight: bold;">{{ $group->title }}</h4>
                        <div class="list-group">
                                <h5>{{ $group->description }}</h5> 
                                <h5>{{ $group->place }} </h5>
                                <h5>{{ $group->date }}</h5> 
                                <h5>{{ $group->limit }}</h5> 
                                <br>
                                @if($group->user_id == $user->id || $user->role == 7)
                                    <a href="/grupos/edit/{{$group->id}}" class="btn btn-info btn-lg btn-block">Editar Grupo</a> <br>
                                    {{ 'Solicitudes de ingreso al grupo pendientes: ' . $group->pendingRequest()->count() }} <br>
                                    
                                    @foreach($group->pendingRequest as $pendingRequest)
                                        <a href="/profile/{{ $pendingRequest->user_id }}"> {{ $pendingRequest->user->name }} </a>
                                        <a href="/grupos/request/{{ $pendingRequest->id }}/accept">Aceptar Solicitud</a> <a href="/grupos/request/{{ $pendingRequest->id }}/reject">Declinar Soclicitud</a> <br>
                                    @endforeach
                                    <hr>
                                    <h5>Integrantes del grupo</h5>
                                    {{-- Listamos los usuarios que son parte del grupo. --}}
                    
                                    {{-- OJO! tanto al momento de mandar el aceptar solicitud como para
                                        mandar el userRemove, el ID que enviamos no es del usuario a 
                                        aceptar/rechazar/remover, lo que enviamos es el ID de la 
                                        solicitud de amistad, o el ID de la relacion de amistad.--}}
                                    @foreach($group->friendships as $friendship)
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-7"><a class="nav-link active" href="/profile/{{ $friendship->user->id }}">{{ $friendship->user->name }}</a></div>
                                            

                                            <div class="col-4 text-center">
                                                @if(!($group->user_id == $friendship->user->id))
                                                    <a class="nav-link text-right btn btn-danger btn-sm" href="/grupos/removeuser/{{ $friendship->id }}">{{ 'eliminar ' }}</a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                
                                    @endforeach
                                @endif
                        </div>
                    </div>  
                
         
                <div class="col-lg-9">

                        <div class="card card-outline-secondary my-4">
                                <div class="card-header text-center alert alert-primary">
                                  Deja tu comentario acá
                                </div>
                
                            <form action="/grupos/comment" method="POST">
                            @csrf
                
                                <div class="form-group">
                                        {{--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
                                        {{--CONVERTIR EL INPUT EN UN TEXTAREA--}}
                                        <input type="text" name="content" class="form-control">
                                </div>
                
                                <div class="">
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                </div>
                
                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">
                                        {{ __('Enviar Comentario') }}
                                    </button>
                                </div>
                
                            </form>


                                <div class="card-body">
                                        @foreach($group->comments as $comment)
                                        <hr>
                                            {{ 'Usuario:' . $comment->user->name }} <br>
                                            {{ 'Comentario: ' . $comment->content }} <br>
                                        <hr>
                                        @endforeach
                              
                                </div>
                              </div>
                            </div>

       </div>
    </div>
@endsection
