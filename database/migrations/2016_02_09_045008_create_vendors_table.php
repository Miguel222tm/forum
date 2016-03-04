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
            $table->string('title');
            $table->string('picture_url');
            $table->string('unique_code');
            $table->integer('access_level');
            $table->string('telephone');
            $table->string('ext');
            $table->string('address');
            $table->string('zip_code');
            $table->string('alternative_first_name');
            $table->string('alternative_last_name');
            $table->string('alternative_email');
            $table->string('alternative_title');
            $table->string('alternative_telephone');
            $table->string('alternative_ext');

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
