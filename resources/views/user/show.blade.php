@extends('layouts.app')

@section('content')
    <div class="container emp-profile">

        <div class="text-right mt-0">
            <a class="profile-edit-btn" href="/perfil/edit/{{ $user->id }} ">Editar Perfil</a>
        </div>

        <div class="row mt-2">
        
            <div class="col-md-2">
                <div class="profile-img">
                    <img src="/storage/{{ $user->avatarPath }}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="profile-head text-left">
                    <h4>{{ $user->name }}</h4>
                    <hr class="mt-0 mb-0">
                </div>

                <div class="row">
                    <div class="col-md-4 text-right mt-0">
                        <h6>
                            {{ 'Descripcion:' }} <br>
                            {{ 'Edad:' }}<br>
                            {{ 'Ciudad:' }}<br>
                        </h6>
                    </div>
                    <div class="col-md-8 text-left">
                        <h6>
                            {{ $user->description }}<br>
                            {{ $user->age }}<br>
                            {{ $user->city }}<br>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="profile-head">
                    <h4>{{ 'Juntadas del usuario:' }}</h4>
                    <hr class="mt-0 mb-0">

                    @if($user->groups->count())

                        <ul>
                        @foreach($user->groups as $group)
                            <li><a href="/grupos/show/{{ $group->id }}">{{ $group->title }}</a></li>
                            <hr class="mt-0">
                        @endforeach
                        </ul>
                        
                    @endif
                    
                </div>
                <h6>

                </h6>
            </div>

        </div>




    </div>

@endsection