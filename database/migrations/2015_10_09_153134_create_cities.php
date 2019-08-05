<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("cities",function($newtable){
            $newtable->increments("id");
            $newtable->string("name");
            $newtable->integer('country_id')->unsigned();
            $newtable->integer('state_id')->unsigned();
            $newtable->timestamps();
            $newtable->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("cities");
    }
}
