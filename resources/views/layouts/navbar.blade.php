<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapse_target">

        <a class="navbar-brand" href="/home"><img class="text-center" src="{{ asset ('svg/logo.png') }}"></a>

            <ul class="navbar-nav ml-auto">

                
                    @if(!(Auth::check()))
                
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Iniciar Sesion</a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrate</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="/faqs">Preguntas Frecuentes</a>
                    </li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Inicio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/grupos">Mas  Grupos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/perfil">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
                            @csrf
                        </form>
                    </li>
                    @endif 

            </ul>
        </div>
    </div>

</nav>