<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormularioEnviadoXServiciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios_enviados_x_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulario_id')->unsigned();
            $table->integer('servicio_crm_id')->unsigned();
            $table->integer('registro_id');
            $table->timestamps();

            $table->foreign('formulario_id')->references('id')->on('formularios');
            $table->foreign('servicio_crm_id')->references('id')->on('servicios_crms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formularios_enviados_x_servicios');
    }
}
