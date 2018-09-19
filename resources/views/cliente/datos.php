<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_empleado', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('emp_nom');
            $table->string('emp_dni');
            $table->string('emp_tel');
            $table->text('emp_dir');
            $table->integer('per_id')->unsigned();
            $table->foreign('per_id')->references('per_id')->on('t_persona');
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
        Schema::dropIfExists('t_empleado');
    }
}
//____________________________________________

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_factura', function (Blueprint $table) {
            $table->increments('fac_id');
            $table->string('fac_nro');
            $table->date('fac_fech');
            $table->integer('fac_tipo');
            $table->string('fac_est');
            $table->text('fac_obs');
            $table->integer('prov_id')->unsigned();
            $table->foreign('prov_id')->references('prov_id')->on('t_proveedor');
            $table->integer('emp_id')->unsigned();
            $table->foreign('emp_id')->references('emp_id')->on('t_empleado');
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
        Schema::dropIfExists('t_factura');
    }
}

//_____________________________________________

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
//___________________________________________-
