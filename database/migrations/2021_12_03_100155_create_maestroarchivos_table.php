<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestroarchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestroarchivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('murl',200);
            $table->unsignedBigInteger('tarea_id');
            $table->unsignedBigInteger('maestrocurso_id');
            $table->timestamps();

            $table->foreign('tarea_id')->references('id')->on('tareas');
            $table->foreign('maestrocurso_id')->references('id')->on('maestrocursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestroarchivos');
    }
}
