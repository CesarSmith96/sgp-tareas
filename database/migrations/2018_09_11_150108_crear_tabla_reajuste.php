<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReajuste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_reajuste', function (Blueprint $table) {
            $table->increments('rea_id');
            $table->string('rea_nom');
            $table->decimal('rea_monto');
            $table->string('rea_oper');
            $table->integer('reac_id')->unsigned();
            $table->integer('valr_id')->unsigned();
            $table->foreign('react_id')->references('react_id')->on('t_reajustecategoria');
            $table->foreign('valr_id')->references('valr_id')->on('t_valorizacionr');
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
        Schema::dropIfExists('t_reajuste');
    }
}
