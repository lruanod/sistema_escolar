<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mnombre',100);
            $table->string('mdireccion',100);
            $table->string('mcui',24);
            $table->string('mcel',45);
            $table->string('mpass',15);
            $table->string('musuario',45)->unique();
            $table->string('mcorreo',45)->unique();
            $table->string('mestado',15);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestros');
    }
}
