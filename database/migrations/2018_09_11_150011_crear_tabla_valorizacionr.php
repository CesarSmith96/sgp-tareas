<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaValorizacionr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_valorizacionr', function (Blueprint $table) {
            $table->increments('valr_id');
            $table->integer('valr_nro');
            $table->decimal('valr_cd');
            $table->date('valr_fechin');
            $table->date('valr_fechfin');
            $table->string('valr_tipo');
            $table->decimal('valr_gg');
            $table->decimal('valr_uti');
            $table->decimal('valr_por');
            $table->string('valr_est');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('pro_id')->on('t_proyecto');
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
        Schema::dropIfExists('t_valorizacionr');
    }
}
