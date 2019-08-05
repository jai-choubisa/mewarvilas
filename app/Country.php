<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = array('name');

    public static $rules = array('name'=>'required|min:3');

    public function states()
    {
    	return $this->hasMany('App\State');
    }
}
