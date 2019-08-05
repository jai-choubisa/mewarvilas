<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = array('restaurant_id','image_path');

    public static $rules = array('restaurant_id'=>'required','images'=>'required');

    public static $edit_rules = array('restaurant_id'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
