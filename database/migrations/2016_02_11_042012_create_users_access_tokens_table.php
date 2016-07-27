<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_access_tokens', function (Blueprint $table) {
            $table->increments('userAccessTokensId');
            $table->integer('usersId')->nullable();
            $table->string('tokenSource', 255);
            $table->text('access_token');
            $table->integer('expires_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_access_tokens');
    }
}
