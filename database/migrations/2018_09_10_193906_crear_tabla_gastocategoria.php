<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGastocategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_gastocategoria', function (Blueprint $table) {
            $table->increments('gcat_id');
            $table->string('gcat_nom');
            $table->integer('gfam_id')->unsigned();
            $table->foreing('gfam_id')->references('gfam_id')->on('t_gastofamilia');
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
        Schema::dropIfExists('t_gastocategoria');
    }
}
