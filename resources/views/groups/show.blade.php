
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

                @foreach($group->pendingRequest as $pendingRequest)
                    <a href="/profile/{{ $pendingRequest->user_id }}"> {{ $pendingRequest->user->name }} </a>
                    <a href="/grupos/request/{{ $pendingRequest->id }}/accept">Aceptar Solicitud</a> <a href="/grupos/request/{{ $pendingRequest->id }}/reject">Declinar Soclicitud</a> <br>
                @endforeach

               {{-- Listamos los usuarios que son parte del grupo. --}}

               {{-- OJO! tanto al momento de mandar el aceptar solicitud como para
                    mandar el userRemove, el ID que enviamos no es del usuario a 
                    aceptar/rechazar/remover, lo que enviamos es el ID de la 
                    solicitud de amistad, o el ID de la relacion de amistad.--}}
                @foreach($group->friendships as $friendship)
                    <a href="/profile/{{ $friendship->user->id }}"> {{ $friendship->user->name }} </a>
                    <a href="/grupos/removeuser/{{ $friendship->id }} "> {{ 'eliminar ' }} </a> <br>
                @endforeach
            @endif

            <h5>Comentarios!!!!!!!</h5>

                @foreach($group->comments as $comment)
                <hr>
                    {{ 'Usuario:' . $comment->user->name }} <br>
                    {{ 'Comentario: ' . $comment->content }} <br>
                <hr>
                @endforeach


            <form action="/grupos/comment" method="POST">
            @csrf

                <div class="form-group">
                    <input type="text" name="content" class="form-control">
                </div>

                <div class="">
                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar Comentario') }}
                    </button>
                </div>

            </form>

        <hr>
       </div>