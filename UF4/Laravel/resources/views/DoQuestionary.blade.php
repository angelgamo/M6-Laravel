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
<div class="full-page register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/full-screen-image-3.jpg') }}">
    <div class="content">
        <div class="container">
            <div class="card card-register card-plain text-center">
                <div class="card-body">

                    <div class="col-md-6 mx-auto rounded bg-light shadow border-dark">
                        <form method="POST" action="/Intent/Create/{{$cuestionario->id}}">
                            @csrf
                            <div class="card card-plain mb-0">
                                <div class="content">
                                    <div class="form-group mb-5">
                                        <h3 class="text-tittle mt-0">{{$cuestionario->nombre}}</h3>
                                    </div>
                                        @foreach($cuestionario->preguntas as $pregunta)
                                            <?php $preguntaName = str_replace(' ', '_', $pregunta->pregunta)?>
                                            <div class="col-md-12 mx-auto pt-3 px-3 mb-2 rounded bg-light shadow border-dark">
                                                <div class="form-group">
                                                    <p class="text-tittle">{{$pregunta->pregunta}}</p><br>
                                                </div>
                                                
                                                    @if ($pregunta->tipo)
                                                        <div class="form-check text-left px-5">
                                                            <input class="form-check-input" type="radio" name={{$preguntaName}} value="{{$pregunta->respuesta_correcta}}">
                                                            <label class="form-check-label pl-1">{{$pregunta->respuesta_correcta}}</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio" name={{$preguntaName}} value="{{$pregunta->opcion_1}}">
                                                            <label class="form-check-label pl-1">{{$pregunta->opcion_1}}</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio" name={{$preguntaName}} value="{{$pregunta->opcion_2}}">
                                                            <label class="form-check-label pl-1">{{$pregunta->opcion_2}}</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio" name={{$preguntaName}} value="{{$pregunta->opcion_3}}">
                                                            <label class="form-check-label pl-1">{{$pregunta->opcion_3}}</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio" name={{$preguntaName}} value="">
                                                            <label class="form-check-label pl-1">Deseleccionar opcion (no resta)</label>
                                                        </div>  
                                                    @else
                                                        <div class="form-group">
                                                            <input type="text" name={{$preguntaName}} class="form-control border-dark m-1 quest1" required autofocus>
                                                        </div>
                                                    @endif
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="footer text-center h-100">
                                        <button type="submit" class="btn btn-fill btn-success btn-wd border-dark">{{ __('Enviar cuestionario') }}</button>
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

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush