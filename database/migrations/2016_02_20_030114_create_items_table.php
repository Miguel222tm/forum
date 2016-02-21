<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('itemId');
            $table->integer('memberId');
            $table->integer('categoryId');
            $table->integer('productId');
            $table->integer('brandId');
            $table->integer('modelId');
            $table->string('category_name');
            $table->string('product_name');
            $table->string('brand_name');
            $table->string('model_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('description', 500);
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
        Schema::drop('items');
    }
}