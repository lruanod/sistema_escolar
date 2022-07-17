<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes',45);
            $table->string('ngrado',45);
            $table->string('nivel',45);
            $table->double('abono',12,2);
            $table->date('cfecha');
            $table->unsignedBigInteger('asignaciongrado_id');
            $table->timestamps();

            $table->foreign('asignaciongrado_id')->references('id')->on('asignaciongrados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuotas');
    }
}
