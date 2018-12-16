@extends('layouts.app')

@section('content')
    
    <div class="col-2">

        <a class="btn btn-primary btn-block" href="/grupos/create"><li class="list-group-item active">¡Crea tu propio grupo!</li></a>

    <ul class="list-group"> 


        @if($groups != null)

            @foreach($groups as $group)

            <a href="/grupos/show/{{ $group->id }}"><li class="list-group-item">{{ $group->title }}</li></a>

            @if(count($group->lastPost))
                {{ $group->lastPost[count($group->lastPost)-1]->user->name }}
                {{ $group->lastPost[count($group->lastPost)-1]->content }}
            @endif

        </ul>
            @endforeach
    </div>

@endSection