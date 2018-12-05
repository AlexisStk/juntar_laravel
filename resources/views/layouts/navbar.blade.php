<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapse_target">

            <a class="navbar-brand"href="/"><img src="{{ asset ('svg/logo.png') }}"></a>

            <ul class="navbar-nav ml-auto">

                
                    @if(!(Auth::check()))
                
                    <li class="nav-item">
                    <a class="nav-link" href="/home">Login</a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrate</a>
                    </li> 
                    @endif
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/publication">Inicio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Perfil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </li>
                    @endif

                <li class="nav-item">
                    <a class="nav-link" href="/faqs">FAQS</a>
                </li> 

            </ul>
        </div>
    </div>

</nav>