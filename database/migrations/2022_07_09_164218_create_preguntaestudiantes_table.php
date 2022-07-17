<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaestudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntaestudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuestionarioestudiante_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->timestamps();

            $table->foreign('cuestionarioestudiante_id')->references('id')->on('cuestionarioestudiantes');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntaestudiantes');
    }
}
