<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pregunta',
        'respuesta_correcta',
        'opcion_1',
        'opcion_2',
        'opcion_3',
        'tipo',
        'puntos',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'respuesta_correcta'
    ];

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

}
