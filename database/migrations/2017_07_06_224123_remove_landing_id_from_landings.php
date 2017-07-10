<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveLandingIdFromLandings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('landings', function (Blueprint $table) {
	    	$table->boolean('con_estructura')->default(false);
		    $table->dropColumn('landing_id');
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
		    $table->string('landing_id');
		    $table->dropColumn('con_estructura')
;	    });
    }
}
