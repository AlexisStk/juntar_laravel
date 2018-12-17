@extends('layouts.app')

@section('content')
    <body class="fondoAnimado">
    <div class="col-2">

        <a class="btn btn-primary btn-block" href="/grupos/create"><li class="list-group-item active">¡Crea tu propio grupo!</li></a>

        @if($groups != null)

        <ul class="list-group"> 
            @foreach($groups as $group)

            <a href="/grupos/show/{{ $group->id }}"><li class="list-group-item">{{ $group->title }}</li></a>

            @if(count($group->lastPost))
                {{ $group->lastPost[count($group->lastPost)-1]->user->name }}
                {{ $group->lastPost[count($group->lastPost)-1]->content }}
            @endif

        </ul>
        
            @endforeach
        @endif

    </div>

</body>
@endSection