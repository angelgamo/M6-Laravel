<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller2;
use App\Http\Controllers\CreateQuestionary;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\IntentoController;
use App\Http\Controllers\CuestionarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// New Questionary con solo preguntas de respuesta multiple
Route::get('/Questionario', [CreateQuestionary::class, 'showQuestionaryForm']);
Route::post('/Questionario/Create', [CreateQuestionary::class, 'create']);

// WTF
Route::get('/ranking', [IntentoController::class, 'showRanking']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});



// Questionary Empty 
Route::get('/Questionario/Empty', [CuestionarioController::class, 'showEmptyQuestionaryForm']);
Route::post('/Questionario/CreateEmpty', [CuestionarioController::class, 'createEmpty']);

//Respondre questionari
Route::get('/do/{cuestionario}', [CuestionarioController::class, 'showQuestionary']);
Route::post('/Intent/Create/{cuestionario}', [IntentoController::class, 'create']);

//Mostrar ranking de un questionari
Route::get('/ranking', [IntentoController::class, 'showRanking']);

//Question del tipus resposta lliure
Route::get('/add/{cuestionario}', [QuestionController::class, 'createQuestion']);
Route::post('/Question/Create/{cuestionario}', [QuestionController::class, 'addQuestion']);

// Other (crear qualsevol cosa a lo hardcode) no usar que ta obsoleto
Route::get('/pregunta/{pregunta}, {respuesta_correcta}, {opcion_1}, {opcion_2}, {opcion_3}, {puntos}', [QuestionController::class, 'CreateSelection']);
Route::get('/intento/{response}', [IntentoController::class, 'test']);
Route::get('/cuestionario/{response}', [CuestionarioController::class, 'test']);

