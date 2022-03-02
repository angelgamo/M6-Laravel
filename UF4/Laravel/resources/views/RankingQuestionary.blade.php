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
                        @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Points
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($intents_all as $intento)
                                    <tr>
                                        <td>
                                            {{$intento->id}}
                                        </td>
                                        <td>
                                            {{$intento->user->name}}
                                        </td>
                                        <td>
                                            {{$intento->puntos_totales}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ csrf_field() }}
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