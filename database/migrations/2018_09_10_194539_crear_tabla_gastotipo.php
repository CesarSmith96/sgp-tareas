<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGastotipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_gastotipo', function (Blueprint $table) {
            $table->increments('gtip_id');
            $table->text('gtip_nom');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('pro_id')->on('t_proyecto');
            $table->integer('gcat_id')->unsigned();
            $table->foreign('gcat_id')->references('gcat_id')->on('t_gastocategoria');
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
        Schema::dropIfExists('t_gastotipo');
    }
}
