<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head');
    <title>Inicio</title>
</head>
<body class="bodyAzul">
    @include('layouts.navbar')
    <br>
    
    <div class="col-2">

        <a class="btn btn-primary btn-block" href="/grupos/create"><li class="list-group-item active">¡Crea tu propio grupo!</li></a>

    <ul class="list-group"> 

        @if($groups != null)

            @foreach($groups as $group)

            <a href="/grupos/show/{{ $group->id }}"><li class="list-group-item">{{ $group->title }}</li></a>
            
            {{ $group->lastPost[count($group->lastPost)-1]->user->name }}
            {{ $group->lastPost[count($group->lastPost)-1]->content }}

        </ul>
            @endforeach
        @endif
    </div>
    

    
</body>
</html>