<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendorId');
            $table->integer('userId');
            $table->string('name');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('second_email');
            $table->string('picture_url');
            $table->string('unique_code');
            $table->integer('access_level');
            $table->string('website');
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
        Schema::drop('vendors');
    }
}
