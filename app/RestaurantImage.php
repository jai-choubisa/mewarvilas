<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    protected $fillable = array('restaurant_id','title','image_path','description');

    public static $rules = array('restaurant_id'=>'required','title'=>'required','image'=>'required');

    public static $edit_rules = array('restaurant_id'=>'required','title'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
