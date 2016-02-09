<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userRequest', function (Blueprint $table) {
            $table->increments('requestId');
            $table->integer('clubId');
            $table->integer('categoryId');
            $table->integer('productId');
            $table->integer('brandId');
            $table->integer('modelId');
            $table->integer('quantity');
            $table->float('price');
            $table->string('description');
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
        Schema::drop('userRequest');
    }
}
