<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcuisines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("rcuisines",function($newtable){
            $newtable->increments("id");
            $newtable->integer('restaurant_id')->unsigned();
            $newtable->string('name');
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
        Schema::drop("rcuisines");
    }
}
