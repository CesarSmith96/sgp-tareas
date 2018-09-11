<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaValorizacionc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_valorizacionc', function (Blueprint $table) {
            $table->increments('valc_id');
            $table->integer('valc_nro');
            $table->decimal('valc_cd');
            $table->date('valc_fechin');
            $table->date('valc_fechfin');
            $table->string('valc_tipo');
            $table->decimal('valc_gg');
            $table->decimal('valc_uti');
            $table->decimal('valc_por');
            $table->string('valc_est');
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
        Schema::dropIfExists('t_valorizacionc');
    }
}
