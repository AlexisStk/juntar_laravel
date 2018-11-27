<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https:/stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('css/styles.css') }}">
    <!-- Google FONT - ROBOTO - -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

    <title>juntAR!</title>
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