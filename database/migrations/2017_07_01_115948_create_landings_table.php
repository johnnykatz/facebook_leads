<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLandingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('nombre');
            $table->string('landing_id');
            $table->string('db_name');
            $table->dateTime('fecha_sincronizacion');
            $table->dateTime('fecha_ultimo_registro');
            $table->boolean('activo');
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
        Schema::drop('landings');
    }
}
