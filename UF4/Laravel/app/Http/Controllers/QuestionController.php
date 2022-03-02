<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class QuestionController extends Controller
{

    public function test($response){
        $question = new Question();
        $question->pregunta = "que palabra no puede decir el juli?";
        $question->respuesta_correcta = "africa";
        $question->puntos = 10;

        $question->save();
        return view('Debbug', compact('response'));
    }

    public function CreateSelection($pregunta, $respuesta_correcta, $opcion_1, $opcion_2, $opcion_3, $puntos, $cuestionario_id){
        $question = new Question();
        $question->pregunta = $pregunta;
        $question->respuesta_correcta = $respuesta_correcta;
        $question->opcion_1 = $opcion_1;
        $question->opcion_2 = $opcion_2;
        $question->opcion_3 = $opcion_3;
        $question->tipo = true;
        $question->puntos = $puntos;
        $question->cuestionario_id = $cuestionario_id;

        $question->save();
        $response = $question;
        return view('Debbug', compact('response'));
    }

    public function CreateSelection2($pregunta, $respuesta_correcta, $puntos, $cuestionario_id){
        $question = new Question();
        $question->pregunta = $pregunta;
        $question->respuesta_correcta = $respuesta_correcta;
        $question->tipo = false;
        $question->puntos = $puntos;
        $question->cuestionario_id = $cuestionario_id;

        $question->save();
        $response = $question;
        return view('Debbug', compact('response'));
    }

    public function createQuestion(Cuestionario $cuestionario)
    {
        error_log($cuestionario."");
        if (Auth::check()) {
            if(Auth::user()->iskiiboy){
                return view('CreateQuestion', compact('cuestionario'));
        }
        else{
            return view('NoEresAdmin');
        }
    }
    }

    public function addQuestion(Request $request, Cuestionario $cuestionario)
    {

        $response = 'Algo ha ido mal';

        if ($request->tipo)
        {
            $this->CreateSelection(
                    $request->pregunta, 
                    $request->respuesta_correcta, 
                    $request->opcion1, 
                    $request->opcion2, 
                    $request->opcion3, 
                    1, 
                    $cuestionario->id);
            $response = 'Todo bien';

        }
        else 
        {
            $this->CreateSelection2(
                    $request->pregunta, 
                    $request->respuesta_correcta, 
                    3, 
                    $cuestionario->id);
            $response = 'Todo bien';
        }

        
        return view('Debbug', compact('response'));
    }
}
