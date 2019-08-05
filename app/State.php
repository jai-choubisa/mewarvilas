<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     protected $fillable = array('name','country_id');

    public static $rules = array('name'=>'required|min:3','country_id'=>'required');

    public function cities()
    {
    	return $this->hasMany('App\City');
    }

    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
}
