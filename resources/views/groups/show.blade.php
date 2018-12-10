
       <div class="blanco"> 
        <hr>
            {{ $group->title }} <br>
            {{ $group->description }} <br>
            {{ $group->place }} <br>
            {{ $group->date }} <br>
            {{ $group->limit }} <br>

            @if($group->user_id == $id)
                <a href="/grupos/editar/$group->id">Editar Grupo</a> <br>
                {{ 'Solicitudes de ingreso al grupo pendientes: ' . count($group->pendingRequest()->get()) }} <br>

                @foreach($group->pendingRequest()->get() as $pendingRequest)
                    <a href="/profile/{{ $pendingRequest->user_id }}"> {{ $pendingRequest->user->name }} </a> <a href="/grupos/request/{{ $pendingRequest->id }}/accept">Aceptar Solicitud</a> <a href="/grupos/request/{{ $pendingRequest->id }}/reject">Declinar Soclicitud</a> <br>
                @endforeach

            @endif



        <hr>
       </div>