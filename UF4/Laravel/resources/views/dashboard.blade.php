@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Mi casa', 'activeButton' => ''])
<?php use App\Models\User; ?>
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (isset($cuestionarios))
            
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Cuestionarios</h4>
                    <p class="card-category">chupame un pie</p>
                </div>
                <div class="card-body">
                    @for ($i=0; $i<count($cuestionarios); $i++)
                    @if ($i!=0) <hr> @endif
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col p-0 col-7"><a href="#">{{$cuestionarios[$i]->nombre}}</a></div>
                            <div class="col p-0">Created By {{User::where('id', $cuestionarios[$i]->creador_id)->get('name')[0]['name']}}</div>
                            <div class="col p-0 text-right">Puntuacion: {{$intentos[$i]['puntos_totales']}}</div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

{{-- ya funciona todo, y funciona bien ya se entrando como kiiboy o no --}}
{{-- la id no sale --}}
{{-- ara que lo pienso, como lo tenemos solo salen los cuestionarios que has hecho, no se si tenian que salir todos en verdad--}}
{{-- yo he puesto que si no coge uno te pone 0 de puntuacion, habria que crear otro cuestionario para probar --}}
