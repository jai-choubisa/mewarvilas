<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = array('restaurant_id','from_date','to_date','discount','deal');

    public static $rules = array('restaurant_id'=>'required','from_date'=>'required','to_date'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
