<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bids', function (Blueprint $table) {
            $table->increments('bidId');
            $table->integer('vendorId');
            $table->string('type');
            $table->integer('categoryId')->nullable();
            $table->integer('productId')->nullable();
            $table->integer('brandId')->nullable();
            $table->integer('modelId')->nullable();
            $table->string('category_name')->nullable();;
            $table->string('product_name')->nullable();;
            $table->string('brand_name')->nullable();;
            $table->string('model_name')->nullable();;
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
        Schema::drop('vendor_bids');
    }
}
