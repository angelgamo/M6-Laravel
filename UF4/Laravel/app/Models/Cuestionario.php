<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
    ];

    public function preguntas()
    {
        return $this->hasMany(Question::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class);
    }

    public function intentos()
    {
        return $this->hasMany(Intento::class);
    }
}
