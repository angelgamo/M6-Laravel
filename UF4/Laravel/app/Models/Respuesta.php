<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(Question::class);
    }
}
