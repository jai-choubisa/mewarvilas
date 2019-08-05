<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = array('restaurant_id','address','lat','lng');

    public static $rules = array('restaurant_id'=>'required','lat'=>'required','lng'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
