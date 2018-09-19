<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturadetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_facturadetalle', function (Blueprint $table) {
            $table->increments('facd_id');
            $table->text('facd_desc');
            $table->integer('facd_cant');
            $table->decimal('facd_punit');
            $table->integer('fac_id')->unsigned();
            $table->foreign('fac_id')->references('fac_id')->on('t_factura');
            $table->integer('gtip_id')->unsigned();
            $table->foreign('gtip_id')->references('gtip_id')->on('t_gastotipo');
            $table->integer('um_id')->unsigned();
            $table->foreign('um_id')->references('um_id')->on('t_unidadmedida');
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
        Schema::dropIfExists('t_facturadetalle');
    }
}
