@extends('layouts.app')

@section('content')
    <div class="container emp-profile">
    
        <div class="text-right mt-0">
            <a class="profile-edit-btn" href="/perfil/edit/{{ $user->id }} ">Editar Perfil</a>
        </div>

        <div class="row mt-2">
        
            <div class="col-md-2">
                <div class="profile-img">
                    <img src=" {{ asset('svg/perfil.jpg') }} ">
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

        <!-- <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset ('svg/perfil.jpg') }}" alt=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h4>   
                                    {{Auth::user()->name}}
                                </h4>
                                <h5 class="text-b">
                                    Descripcion
                                </h5>

                                <br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informacion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nombre de Usuario</label>
                                        </div>
                                        <div class="col-md-6">
                                        <p>{{Auth::user()->nickmane}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nombre</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                        <p>{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                    
                                            {{-- <div class="row">
                                        <div class="col-md-6">
                                            <label>Profession</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Web Developer and Designer</p>
                                        </div>
                                    </div> --}}
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Hourly Rate</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>10$/hr</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Total Projects</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>230</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>English Level</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Availability</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>6 months</p>
                                        </div>
                                    </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br/>
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>            -->
    <!-- </div> -->

@endsection