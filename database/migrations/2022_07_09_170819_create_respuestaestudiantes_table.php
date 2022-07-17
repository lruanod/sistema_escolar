<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaestudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestaestudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('rerespuesta',500);
            $table->string('reestado',45);
            $table->double('repunteo',12,2);
            $table->unsignedBigInteger('preguntaestudiante_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->unsignedBigInteger('cuestionarioestudiante_id');
            $table->timestamps();

            $table->foreign('preguntaestudiante_id')->references('id')->on('preguntaestudiantes');
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');
            $table->foreign('cuestionarioestudiante_id')->references('id')->on('cuestionarioestudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestaestudiantes');
    }
}
