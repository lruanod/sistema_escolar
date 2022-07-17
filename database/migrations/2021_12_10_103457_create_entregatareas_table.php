<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregatareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregatareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('enfecha');
            $table->double('calificacion',12,2);
            $table->text('endescripcion',500);
            $table->unsignedBigInteger('tarea_id');
            $table->unsignedBigInteger('estudiantecurso_id');
            $table->timestamps();

            $table->foreign('tarea_id')->references('id')->on('tareas');
            $table->foreign('estudiantecurso_id')->references('id')->on('estudiantecursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregatareas');
    }
}
