<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiciosCrmsXLandingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_crms_x_landings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicios_crm_id')->unsigned();
            $table->integer('landing_id')->unsigned();
            $table->boolean('estado');
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
        Schema::drop('servicios_crms_x_landings');
    }
}
