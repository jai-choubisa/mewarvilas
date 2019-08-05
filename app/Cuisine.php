<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = array('name');

    public static $rules = array('name'=>'required|min:3');
}
