<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('memberId');
            $table->integer('userId');
            $table->string('name');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('picture_url');
            $table->string('unique_code');
            $table->integer('access_level');
            $table->string('rating');
            $table->boolean('active');
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
        Schema::drop('members');
    }
}
