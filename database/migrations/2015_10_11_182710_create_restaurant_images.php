<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("restaurant_images",function($newtable){
            $newtable->increments("id");
            $newtable->integer('restaurant_id')->unsigned();
            $newtable->string('title');
            $newtable->string('description');
            $newtable->string('image_path');
            $newtable->timestamps();
            $newtable->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("restaurant_images");
    }
}
