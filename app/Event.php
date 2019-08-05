<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = array('restaurant_id','from_date','to_date','name','description','start_time','end_time','image_path');

    public static $rules = array('name'=>'required','from_date'=>'required','to_date'=>'required');

    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}
