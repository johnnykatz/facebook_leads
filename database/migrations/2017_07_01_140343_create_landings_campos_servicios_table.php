<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLandingsCamposServiciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings_campos_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campo_formulario');
            $table->integer('campos_servicios_crm_id')->unsigned();
            $table->integer('landing_id')->unsigned();
            $table->boolean('estado');
            $table->timestamps();

	        $table->foreign('campos_servicios_crm_id')->references('id')->on('campos_servicios_crms');
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
        Schema::drop('landings_campos_servicios');
    }
}
