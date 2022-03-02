<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentos', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_model')->default(false);
            $table->integer('id_cuestionario')->index();
            $table->integer('id_user')->index();
            $table->integer('puntos_totales')->default(1);
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
        Schema::dropIfExists('intentos');
    }
}
