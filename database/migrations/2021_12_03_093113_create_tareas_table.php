<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fcreado');
            $table->dateTime('ffinalizacion');
            $table->text('tdescripcion',500);
            $table->string('titulo',75);
            $table->double('punteo',12,2);
            $table->unsignedBigInteger('maestrocurso_id');
            $table->timestamps();

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
        Schema::dropIfExists('tareas');
    }
}
