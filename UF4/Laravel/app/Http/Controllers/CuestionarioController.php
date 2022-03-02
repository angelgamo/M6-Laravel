<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CuestionarioController extends Controller
{
    public function test($response){
        $cuestinario = new Cuestionario();
        $cuestinario->nombre = "JuliQuiz";
        $cuestinario->save();
        return view('Debbug', compact('response'));
    }

    public function showEmptyQuestionaryForm()
    {
        if (Auth::check())
            if (Auth::user()->iskiiboy)
                return view('CreateEmptyQuestionary');
            else
                return view('NoEresAdmin');
        else
            return view('auth.login');
    }

    public function createEmpty(Request $request)
    {
        $questionary = new Cuestionario();
        $questionary->nombre = $request->questionary_name;
        $questionary->creador_id = Auth::id();
        $questionary->save();
    }

    public function showQuestionary(Cuestionario $cuestionario){
        if(Auth::check()) {
            if (Auth::user()->iskiiboy) {
                $response = 'editar cuestionario (se implementara mas adelante)';
                return view('Debbug', compact('response'));
            } else{
                return view('DoQuestionary', compact('cuestionario'));
            }
        }
        else
            return view('auth.login');
    }

   
}
