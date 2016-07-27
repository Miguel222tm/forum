<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId')->unsigned()->index();
            $table->foreign('categoryId')->references('categoryId')->on('category')->onDelete('cascade');
            $table->integer('tagId')->unsigned()->index();
            $table->foreign('tagId')->references('tagId')->on('tags')->onDelete('cascade');
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
        Schema::drop('category_tag');
    }
}
