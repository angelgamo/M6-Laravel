<?php

namespace App\Http\Controllers;

use App\Models\Intento;
use App\Models\Cuestionario;
use App\Models\Respuesta;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntentoController extends Controller
{
    public function test($response){
        $intento = new Intento();
        $intento->respuestas = "Africa;Etiopia;Negres;Alemanya";
        $intento->puntos_totales = 1000;

        $intento->save();
        return view('Debbug', compact('response'));
    }

    public function create(Request $request, Cuestionario $cuestionario){        
        if(Auth::check()){
            if(Auth::user()->iskiiboy){
                return view('home');
            }

            $intento = new Intento();
            $intento->is_model = false;
            $intento->id_cuestionario = $cuestionario->id;
            $intento->id_user = Auth::id();
            $intento->puntos_totales = 0;

            $intento->save();

            $punts = 0;
            
            foreach ($cuestionario->preguntas as $pregunta){
                $respuesta = new Respuesta(); //fa pal fer un respostacontroller
                if (isset($request[str_replace(' ', '_', $pregunta->pregunta)]))
                    $respuesta->respuesta = $request[str_replace(' ', '_', $pregunta->pregunta)];
                else
                    $respuesta->respuesta = "not set";

                $respuesta->id_intento = $intento->id;
                $respuesta->id_pregunta = $pregunta->id;

                if($respuesta->respuesta == $pregunta->respuesta_correcta){
                    $punts = $punts + $pregunta->puntos;
                }

                $respuesta->save();
            }

            $intento->puntos_totales = $punts;
            
            $intento->save();

            $response = "todo correcto, puntos ganados: ".$punts;
            return view('Debbug', compact('response'));
        }
        return view('auth.login');
    }

    public function showRanking(){
        if(Auth::check()){
            $intents_all = Intento::all()->sortByDesc('puntos_totales');
            return view('RankingQuestionary', compact('intents_all'));
        }
    }
}
