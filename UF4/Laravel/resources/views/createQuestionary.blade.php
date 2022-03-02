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
                            <form method="POST" action="/Questionario/Create">
                                @csrf
                                <div class="card card-plain mb-0">
                                    <div class="content">
                                        <div class="form-group">
                                            <p class="text-tittle">Nombre del Questionario</p>
                                            <input type="text" name="questionary_name" class="form-control border-dark" placeholder="Quien quiere ser astronomo" required autofocus>
                                        </div>

                                        <div id="questions">
                                            <div class="col-md-12 mx-auto pt-3 px-3 mb-2 rounded bg-light shadow border-dark" id="question">
                                                <div class="form-group">
                                                    <p class="text-tittle">Nombre de la pregunta</p>
                                                    <input type="text" name="1question_name" class="form-control border-dark" placeholder="Cuantos dias tiene un año" required autofocus>
                                                </div>

                                                <div class="form-group invisible" style="position: absolute;">
                                                    <p class="text-tittle">Tipo de pregunta (marca si tiene múltiple respuesta)</p>
                                                    <input type="checkbox" name="1type" checked="true">
                                                </div>

                                                <div class="form-group" id="answers">
                                                    <p class="text-tittle">Respuestas (la primera es la correcta)</p>
                                                    <input type="text" name="1option1" class="form-control border-dark m-1" placeholder="365" required autofocus>
                                                    <input type="text" name="1option2" class="form-control border-dark m-1" placeholder="265" required autofocus>
                                                    <input type="text" name="1option3" class="form-control border-dark m-1" placeholder="315" required autofocus>
                                                    <input type="text" name="1option4" class="form-control border-dark m-1" placeholder="2" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="footer text-center h-100">
                                            <button onclick="return false" class="btn btn-fill btn-warning btn-sm float-left border-dark" style="border-radius: 50%; font-weight: 900" id="addBtn">+</button>
                                            <button type="submit" class="btn btn-fill btn-success btn-wd float-right border-dark">{{ __('Crear cuestionario') }}</button>
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
        
        let questionPreset = $("#question");
        let cont = 2;

        $("#addBtn").click(function() {
            let preg = questionPreset.clone();

            preg.children().each(function(j) {
                if (j == 0){
                    $(this).children('input').attr('name', cont+'question_name');
                    $(this).children('input').val('');
                }
                else if(j == 1){
                    $(this).children('input').attr('name', cont+'type');
                    $(this).children('input').prop("checked", true);
                    //$(this).children('input').attr("disabled", true);
                }
                else
                    $(this).children('input').each(function(i) {
                        $(this).attr('name', cont+'option'+(i+1));
                        $(this).val('');
                    });
            });

            preg.appendTo("#questions");
            cont++;
        });
    </script>
@endpush