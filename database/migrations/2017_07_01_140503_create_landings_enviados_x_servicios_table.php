<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLandingsEnviadosXServiciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings_enviados_x_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicios_crm_id')->unsigned();
            $table->integer('landing_id')->unsigned();
            $table->integer('estados_envio_id')->unsigned();
            $table->string('registro_id');
            $table->timestamps();

	        $table->foreign('servicios_crm_id')->references('id')->on('servicios_crms');
	        $table->foreign('landing_id')->references('id')->on('landings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('landings_enviados_x_servicios');
    }
}
