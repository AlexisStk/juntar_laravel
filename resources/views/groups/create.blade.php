@extends('layouts.app')

@section('content')
<head>
    <title>Organiza tu Juntada</title>
</head> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-body list-group-item list-group-item-primary"> <h5> {{ __('Crear tu Grupo') }} </h5> </div>

                <div class="card-body">
                    <form id = "formulario" method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right text-body">{{ __('Titulo del grupo') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"  autofocus>
                                <div  id = "errorTitle"></div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right text-body">{{ __('descripcion del Grupo') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"  autofocus>
                                <div  id = "errorDescrip"></div>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right text-body">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"  name="date" value="{{ old('date') }}"  autofocus>
                                <div  id = "errorDate"></div>
                                @if($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right text-body">{{ __('Lugar') }}</label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ old('place') }}"  autofocus>
                                <div  id = "errorPlace"></div>
                                @if ($errors->has('place'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="limit" class="col-md-4 col-form-label text-md-right text-body">{{ __('Fecha Limite') }}</label>

                            <div class="col-md-6">
                                <input id="limit" type="date" class="form-control{{ $errors->has('limit') ? ' is-invalid' : '' }}" name="limit" value="{{ old('limit') }}"  autofocus>
                                <div  id = "errorLimit"></div>
                                @if ($errors->has('limit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('limit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Crear Grupo') }}
                                </button>

                            </div>
                        </div> 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection