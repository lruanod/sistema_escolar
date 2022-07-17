<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonaevaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonaevaluacions', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('bimestre',45);
            $table->double('zepunteo',12,2);
            $table->unsignedBigInteger('zona_id');
            $table->timestamps();

            $table->foreign('zona_id')->references('id')->on('zonas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zonaevaluacions');
    }
}
