@extends('layouts.app')
@section('content')

    <div class="container emp-profile">
    
        <form action="" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="form-group row lbltext">
                        <label class="col-md-4 text-right pt-2"for="description">Descripcion:</label>
                        <input class="form-control col-md-6" type="text" name="description">
                    </div>

                    <div class="form-group row lbltext">
                        <label class="col-md-4 text-right pt-2" for="age">Edad:</label>
                        <input class="form-control col-md-6" type="text" name="age">
                    </div>

                    <div class="form-group row lbltext">
                        <label class="col-md-4 text-right pt-2" for="city">Ciudad:</label>
                        <input class="form-control col-md-6" type="text" name="city">
                    </div>

                    <div class="form-group row lbltext">
                        <label class="col-md-4 text-right pt-2" for="avatar">Avatar:</label>
                        <input class="form-control col-md-6" type="file" name="avatar">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Editar perfil">
                    </div>

                </div>

            </div>

        </form>
    </div>

@endsection