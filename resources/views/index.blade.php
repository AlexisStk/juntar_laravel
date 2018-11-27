<!DOCTYPE html>

<head>
    @include('layouts.head')
</head>

<body>

    <div class="mainHeader">

        @include('layouts.navbar')

    </div>

    <div class="container">

        <div class="row propMainBody text-center">

            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <img class="img-fluid" src="{{ asset ('svg/imgBody.png') }}" alt="">
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                <div class="propPanelDescripcion">
                    <ul> <p class="propTituloDescripcion">¡Tu red social de Juntadas!</p>
                        <li>¿Queres organizar una mateada?</li>
                        <li>¿Queres arreglar una salida?</li>
                        <li>¿Estás buscando jugadores para un partido de futbol?</li>
                    </ul>

                <a type="button" class="btn btn-secundary btn-lg btn-block" href="/register" role="button">¡Registrate!</a>
                </div>
                
            </div>

        </div>

    </div>

    @include('layouts.footer')
    @include('layouts.scripts')

</body>

</html>