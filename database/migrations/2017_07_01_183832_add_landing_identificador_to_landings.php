<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLandingIdentificadorToLandings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('landings', function (Blueprint $table) {
		    $table->string('landing_identificador');
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
		    $table->dropColumn('landing_identificador');
	    });
    }
}
