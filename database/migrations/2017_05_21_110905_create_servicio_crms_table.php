<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicioCrmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_crms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('slug')->nullable();
            $table->string('datos')->nullable();
            $table->boolean('estado')->default(true);
            $table->integer('crm_id')->unsigned();
            $table->timestamps();

            $table->foreign('crm_id')->references('id')->on('crms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios_crms');
    }
}
