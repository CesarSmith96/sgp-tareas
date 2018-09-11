<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaIngreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ingreso', function (Blueprint $table) {
            $table->increments('ing_id');
            $table->decimal('ing_monto');
            $table->string('ing_tipo');
            $table->date('ing_fech');
            $table->integer('valr_id')->unsigned();
            $table->integer('adel_id')->unsigned();
            $table->integer('pro_id')->unsigned();
            $table->foreign('valr_id')->references('valr_id')->on('t_valorizacionr');
            $table->foreign('adel_id')->references('adel_id')->on('t_adelanto');
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
        Schema::dropIfExists('t_ingreso');
    }
}
