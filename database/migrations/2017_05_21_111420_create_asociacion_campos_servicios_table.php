<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsociacionCamposServiciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociaciones_campos_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campo_formulario')->nullable();
            $table->integer('campo_servicio_crm_id')->unsigned();
            $table->integer('formulario_id')->unsigned();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            $table->foreign('campo_servicio_crm_id')->references('id')->on('campos_servicios_crms');
            $table->foreign('formulario_id')->references('id')->on('formularios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asociaciones_campos_servicios');
    }
}
