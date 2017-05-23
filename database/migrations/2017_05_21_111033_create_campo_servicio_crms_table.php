<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampoServicioCrmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campos_servicios_crms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('servicio_crm_id')->unsigned();
            $table->boolean('estado')->default(true);
            $table->timestamps();

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
        Schema::drop('campos_servicios_crms');
    }
}
