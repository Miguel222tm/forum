<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->increments('vendorProductId');
            $table->integer('vendorId');
            $table->integer('categoryId')->nullable();
            $table->integer('productId')->nullable();
            $table->integer('brandId')->nullable();
            $table->integer('modelId')->nullable();
            $table->string('category_name');
            $table->string('product_name');
            $table->string('brand_name');
            $table->string('model_name');
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
        Schema::drop('vendor_products');
    }
}
