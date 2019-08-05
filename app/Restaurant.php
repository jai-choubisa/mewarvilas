<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Restaurant extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'restaurant_name',
        'save_to'    => 'slug',
    ];


    protected $fillable = array('user_id','restaurant_name','address','country_id','state_id','city_id','phone','price','about','banner_image_path');

    //public static $rules = array('name'=>'required|min:3','country_id'=>'required','state_id'=>'required','restaurant_name'=>'required','address'=>'required','country_id'=>'required','state_id'=>'required','city_id'=>'required','email'=>'required','password'=>=>'required');
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }
    public function maps()
    {
        return $this->hasMany('App\Map');
    }
    public function menus()
    {
        return $this->hasMany('App\Menu');
    }
    public function restaurantimages()
    {
        return $this->hasMany('App\RestaurantImage');
    }
    public function timings()
    {
        return $this->hasMany('App\Timing');
    }
}
