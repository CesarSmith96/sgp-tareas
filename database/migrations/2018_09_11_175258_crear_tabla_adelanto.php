<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAdelanto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_adelanto', function (Blueprint $table) {
            $table->increments('adel_id');
            $table->decimal('adel_mat');
            $table->decimal('adel_cd');
            $table->string('adel_est');
            $table->integer('pro_id')->unsigned()->unique();
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
        Schema::dropIfExists('t_adelanto');
    }
}
