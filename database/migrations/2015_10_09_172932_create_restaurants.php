<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("restaurants",function($newtable){
            $newtable->increments("id");
            $newtable->string("restaurant_name");
            $newtable->string("address");
            $newtable->integer('country_id')->unsigned();
            $newtable->integer('state_id')->unsigned();
            $newtable->integer('city_id')->unsigned();
            $newtable->string("phone");
            $newtable->string("price");
            $newtable->text("about");
            $newtable->string("email")->unique();
            $newtable->string("password",60);
            $newtable->string("banner_image_path");
            $newtable->string("facilities");
            $newtable->string("cuisines");
            $newtable->timestamps();
            $newtable->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("restaurants");
    }
}
