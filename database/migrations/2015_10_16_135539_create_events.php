<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("events",function($newtable){
            $newtable->increments("id");
            $newtable->integer('restaurant_id')->unsigned();
            $newtable->string('name');
            $newtable->text('description');
            $newtable->date('from_date');
            $newtable->date('to_date');
            $newtable->string('start_time');
            $newtable->string('end_time');
            $newtable->string("image_path");           
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
        Schema::drop("events");
    }
}
