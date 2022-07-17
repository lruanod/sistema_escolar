<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioestudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarioestudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('cefecha');
            $table->double('cepunteo',12,2);
            $table->unsignedBigInteger('cuestionario_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->timestamps();

            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuestionarioestudiantes');
    }
}
