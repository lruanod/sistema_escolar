<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gnombre',45);
            $table->string('gseccion',45);
            $table->double('monto',12,2);
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();

            $table->foreign('nivel_id')->references('id')->on('nivels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grados');
    }
}
