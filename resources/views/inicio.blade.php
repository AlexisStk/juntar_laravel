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
    <ul class="list-group">
        <a class="btn btn-primary" href="/grupos/create"><li class="list-group-item active">Crea tu propio grupo</li></a>   
            @foreach($groups as $group)    
            
                <a href="/grupos/show/"><li class="list-group-item">{{ $group->title }}</li></a>

          </ul>
          @endforeach
    </div>
    

    
</body>
</html>