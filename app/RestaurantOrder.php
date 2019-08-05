<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantOrder extends Model
{
    protected $fillable = array('restaurant_id','user_id','date','time','people','booking_no');

    public static $rules = array('restaurant_id'=>'required','date'=>'required','time'=>'required','people'=>'required');

    // protected $dates = ['date'];

    // protected $dateFormat = 'd-m-YY';

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
