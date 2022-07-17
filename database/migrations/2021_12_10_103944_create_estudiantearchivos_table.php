<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantearchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantearchivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('eurl',200);
            $table->string('etitulo',100);
            $table->unsignedBigInteger('entregatarea_id');
            $table->unsignedBigInteger('estudiantecurso_id');
            $table->timestamps();

            $table->foreign('entregatarea_id')->references('id')->on('entregatareas');
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
        Schema::dropIfExists('estudiantearchivos');
    }
}
