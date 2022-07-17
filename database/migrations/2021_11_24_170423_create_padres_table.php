<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pnombre',100);
            $table->string('pdireccion',100);
            $table->string('pcel',45);
            $table->string('pcui',24);
            $table->string('ppariente',24);
            $table->string('pcorreo',45)->unique();
            $table->string('ppass',15);
            $table->string('pusuario',45)->unique();
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
        Schema::dropIfExists('padres');
    }
}
