<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoFormulariosEnvaidosServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formularios_enviados_x_servicios', function (Blueprint $table) {
            $table->integer('estado_id')->nullable()->unsigned();
            $table->foreign('estado_id','form_env_x_serv_foreign')->references('id')->on('estados_envios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
