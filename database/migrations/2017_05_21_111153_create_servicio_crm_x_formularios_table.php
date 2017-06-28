<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicioCrmXFormulariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_crms_x_formularios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('servicio_crm_id')->unsigned();
            $table->integer('formulario_id')->unsigned();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            $table->foreign('servicio_crm_id')->references('id')->on('servicios_crms');
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
        Schema::drop('servicios_crms_x_formularios');
    }
}
