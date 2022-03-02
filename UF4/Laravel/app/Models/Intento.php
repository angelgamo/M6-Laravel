<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intento extends Model
{
    use HasFactory;

   public function user()
   {
       return $this->belongsTo(User::class, 'id_user');
   }

   public function cuestionario()
   {
       return $this->belongsTo(Cuestionario::class, 'id_cuestionario');
   }

   public function respuesta()
   {
       return $this->hasMany(Respuesta::class);
   }
}
