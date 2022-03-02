<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta')->unique;
            $table->string('respuesta_correcta')->unique;
            $table->string('opcion_1')->nullable();
            $table->string('opcion_2')->nullable();
            $table->string('opcion_3')->nullable();
            $table->boolean('tipo')->default(false); //false es escrita, true es de opciones
            $table->integer('puntos')->default(1);
            $table->integer('cuestionario_id')->unsigned()->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
