<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_location', function (Blueprint $table) {
            $table->increments('bidLocationId');
            $table->integer('bidId');
            $table->string('countryId')->nullable();
            $table->string('stateId')->nullable();
            $table->string('cityId')->nullable();
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
        Schema::drop('bid_location');
    }
}
