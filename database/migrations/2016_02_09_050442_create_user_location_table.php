<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userLocation', function (Blueprint $table) {
            $table->increments('userLocationId');
            $table->integer('userId');
            $table->string('country');
            $table->string('state');
            $table->string('city');   
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
        Schema::drop('userLocation');
    }
}
