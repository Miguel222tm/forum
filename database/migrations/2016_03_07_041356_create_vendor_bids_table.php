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
            $table->integer('brandId')->nullable();
            $table->integer('modelId')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('model_name')->nullable();
            $table->integer('total_items');
            $table->integer('min_price');
            $table->integer('max_price');
            $table->integer('average_price');
            $table->integer('offer');
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
