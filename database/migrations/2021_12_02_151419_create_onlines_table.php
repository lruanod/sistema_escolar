<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ourl',100);
            $table->text('odescripcion',500);
            $table->dateTime('fecha');
            $table->string('estado',45);
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
        Schema::dropIfExists('onlines');
    }
}
