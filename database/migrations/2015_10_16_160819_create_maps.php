<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("maps",function($newtable){
            $newtable->increments("id");
            $newtable->integer('restaurant_id')->unsigned();
            $newtable->string('address');
            $newtable->decimal('lat', 10, 6);
            $newtable->decimal('lng', 10, 6);
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
        Schema::drop("maps");
    }
}
