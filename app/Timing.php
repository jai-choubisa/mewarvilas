<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $fillable = array('restaurant_id','start_time','end_time');

    public static $rules = array('restaurant_id'=>'required','start_time'=>'required','end_time'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
