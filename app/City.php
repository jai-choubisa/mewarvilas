<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = array('name','country_id','state_id');

    public static $rules = array('name'=>'required|min:3','country_id'=>'required','state_id'=>'required');

    public function state()
    {
    	//return $this->hasMany('App\State');
    	return $this->belongsTo('App\State');
    }
}
