<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessLevelFunctionalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_level_functionality', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accessLevelId')->unsigned()->index();
            $table->foreign('accessLevelId')->references('id')->on('access_level')->onDelete('cascade');
            $table->integer('functionalityId')->unsigned()->index();
            $table->foreign('functionalityId')->references('id')->on('functionality')->onDelete('cascade');
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
        Schema::drop('access_level_functionality');
    }
}
