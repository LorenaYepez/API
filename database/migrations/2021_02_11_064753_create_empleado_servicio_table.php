<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmpleado')->unsigned();
            $table->integer('idServicio')->unsigned();
            $table->foreign('idEmpleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('idServicio')->references('id')->on('servicios')->onDelete('cascade');
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
        Schema::dropIfExists('empleado_servicio');
    }
}
