<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoFechaToLandings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('landings', function (Blueprint $table) {
		    $table->string('campo_fecha');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('landings', function (Blueprint $table) {
		    $table->dropColumn('campo_fecha');
	    });
    }
}
