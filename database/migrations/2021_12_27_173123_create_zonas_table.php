<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zestado',45);
            $table->double('zona',12,2);
            $table->double('total',12,2);
            $table->double('aspecto',12,2);
            $table->unsignedBigInteger('estudiantecurso_id');
            $table->timestamps();

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
        Schema::dropIfExists('zonas');
    }
}
