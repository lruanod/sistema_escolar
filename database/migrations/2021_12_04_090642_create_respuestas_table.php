<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('respuesta',150);
            $table->string('restado',45);
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('maestrocurso_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->timestamps();

            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('maestrocurso_id')->references('id')->on('maestrocursos');
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
        Schema::dropIfExists('respuestas');
    }
}
