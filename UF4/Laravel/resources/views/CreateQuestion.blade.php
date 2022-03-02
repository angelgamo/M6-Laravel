@extends('layouts.app', ['activePage' => 'register', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])

<style>
    .shadow {
        box-shadow: 2px 3px 10px rgba(0, 0, 0, 0.3);
    }

    .border-dark {
        border-style: solid;
        border-width: 1px;
    }

    .text-tittle {
        color: black;
        font-weight: bold;
        float: left;
        margin-bottom: 0;
    }
</style>

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div class="full-page register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/full-screen-image-3.jpg') }}">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body">

                        <div class="col-md-6 mx-auto rounded bg-light shadow border-dark">
                            <form method="POST" action="/Question/Create/{{$cuestionario->id}}">
                                @csrf
                                <div class="card card-plain mb-0">
                                    <div class="content">
                                        <div class="form-group">
                                            <p class="text-tittle">Nombre del Questionario: {{$cuestionario->nombre}}</p>
                                        </div>
                                        <div class="col-md-12 mx-auto pt-3 px-3 mb-2 rounded bg-light shadow border-dark">
                                            <div class="form-group">
                                                <p class="text-tittle">Nombre de la pregunta</p>
                                                <input type="text" name="pregunta" class="form-control border-dark" placeholder="Cuantos dias tiene un año" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-tittle">Tipo de pregunta (marca si tiene múltiple respuesta)</p>
                                                <input type="checkbox" name="tipo">
                                            </div>
                                            <div class="form-group" id="pregunta">
                                                <p class="text-tittle">Respuestas</p>
                                                <input type="text" name="respuesta_correcta" class="form-control border-dark m-1 quest1" placeholder="365" required autofocus>
                                                <input type="text" name="opcion1" class="form-control border-dark m-1 quest2" placeholder="265">
                                                <input type="text" name="opcion2" class="form-control border-dark m-1 quest3" placeholder="315">
                                                <input type="text" name="opcion3" class="form-control border-dark m-1 quest4" placeholder="2">
                                            </div>
                                        </div>
                                        <div class="footer text-center h-100">
                                            <button type="submit" class="btn btn-fill btn-success btn-wd border-dark">{{ __('Crear pregunta') }}</button>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="col">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible fade show" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
