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
                            <form method="POST" action="/Questionario/CreateEmpty">
                                @csrf
                                <div class="card card-plain mb-0">
                                    <div class="content">
                                        <div class="form-group">
                                            <p class="text-tittle">Nombre del Questionario</p>
                                            <input type="text" name="questionary_name" class="form-control border-dark" placeholder="Quien quiere ser astronomo" required autofocus>
                                        </div>
                                        
                                        <div class="footer text-center h-100">
                                            <button type="submit" class="btn btn-fill btn-success btn-wd border-dark">{{ __('Crear cuestionario') }}</button>
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
