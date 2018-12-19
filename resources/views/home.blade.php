@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">

                    <a class="btn btn-primary btn-block" href="/grupos/create"><li class="list-group-item active">¡Crea tu propio grupo!</li></a>

                    @if($groups != null)

                    <ul class="list-group card"> 
                        @foreach($groups as $group)
                        <a href="/grupos/show/{{ $group->id }}"><li class="list-group-item">{{ $group->title }}</li></a>
                        @endforeach
                    </ul>
                    @endif

                </div>


                @if($groups != null)
                    <div class="col-10">
                            <h2 class="alert alert-primary text-center" role="alert">Ultimos comentarios</h2>
                        <div class="card">
                            @foreach ($groups as $group)
                                @if(count($group->lastPost))
                                    <div class="card">
                                        <div class="card-body">
                                                <h5 class="" style="font-weight: bold;">{{ $group->title }}</h5>
                                                <div style="font-weight: bold;">{{ $group->lastPost[count($group->lastPost)-1]->user->name }} </div>
                                                {{ $group->lastPost[count($group->lastPost)-1]->content }}.
                                        </div>
                                    </div>
                                @endif  
                                <br>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="mx-auto">
                    <h2 class="alert alert-primary text-center" role="alert">Todavia no armaste ningun grupo, arma uno <a href="/grupos/create"> aca!</a></h2> </div>
                @endif
            </div>
        </div>
@endSection