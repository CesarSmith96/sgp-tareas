<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReajustecategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_reajustecategoria', function (Blueprint $table) {
            $table->increments('reac_id');
            $table->string('reac_nom');
            $table->integer('reaf_id')->unsigned();
            $table->foreign('reaf_id')->references('reaf_id')->on('t_reajustefamilia');
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
        Schema::dropIfExists('t_reajustecategoria');
    }
}
