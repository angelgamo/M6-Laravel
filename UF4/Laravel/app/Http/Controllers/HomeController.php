<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Intento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->iskiiboy)
            return view('dashboard');

        $cuestionarios = Cuestionario::all()->sortByDesc('id');
        $id = Auth::id();

        $intentos = [];
        foreach ($cuestionarios as $cuestionario){
            $val = Intento::get()->where('id_cuestionario', $cuestionario->id)->where('id_user', $id)->sortByDesc('puntos_totales')->first();
            if (is_null($val))
                $val = array('puntos_totales' => -1);
            array_push($intentos, $val);
        }
        //te he escrito en el otro lado, pero en princiopio se lo tiene que comer pues he entrado como admin y no me sale nada, con una nueva cuenta
        //itera por cada cuestionario
        // que no te sale?, el menu de la izquierda? los cuestionarios, lo demas me sale
        // es que peta porque admin no puede hacer cuestionarios, lo he puesto expresamente aaaaaaaa va
        //entonces esta perfe
        // el creado por tiene que tener algun nombre? my bad, en la bd no habia id
        //pues yo lo dejaria asi la vd
        // ahora ya esta
        // loque nose porque no funciona el User::get('name)->where('id', creator_id)    osea me devuelve []
        // bueno se ve que el orden de los factores importa ahora es User::where('id', creator_id)->get('name)  a h  b ueno si si, entonces no pasa na
        // anque debuelve un objecto con un array dentro {['name': "aaaaaa"]}, se queda asi, si, si no ya se quejara, yo tambien, buenas noches, bueno despues de entregar
        // seh, lo entregas a pelo no? creo que no hace falta git ni na, perfe, pos voy a dormir ya, gn
        // le dejo este texto? jajajajaj si quieres vale
        // ahi se queda
        // holamarc si lees esto que pases buen dia
        return view('dashboard', compact('cuestionarios', 'intentos'));
    }
}
