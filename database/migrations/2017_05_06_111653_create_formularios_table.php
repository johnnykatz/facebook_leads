<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormulariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('form_id')->nullable();
            $table->string('db_name')->nullable();
            $table->boolean('activo')->default(false);
            $table->boolean('con_estructura')->default(false);
            $table->dateTime('fecha_sincronizacion')->nullable();
            $table->dateTime('fecha_ultimo_lead')->nullable();
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
        Schema::drop('formularios');
    }
}
