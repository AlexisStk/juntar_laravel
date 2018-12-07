
       <div class="blanco"> 
        <hr>
            {{ $group->title }} <br>
            {{ $group->description }} <br>
            {{ $group->place }} <br>
            {{ $group->date }} <br>
            {{ $group->limit }} <br>

            @if($group->user_id == $id)
                <a href="/grupos/editar/$group->id">Editar Grupo</a>
            @endif
        <hr>
       </div>