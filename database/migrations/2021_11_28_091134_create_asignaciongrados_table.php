<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaciongradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciongrados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->string('estado',45);
            $table->timestamps();

            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaciongrados');
    }
}
