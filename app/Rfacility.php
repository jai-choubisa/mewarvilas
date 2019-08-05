<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfacility extends Model
{
    protected $fillable = array('restaurant_id','name');

    public static $rules = array('restaurant_id'=>'required','name'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
