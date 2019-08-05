<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = array('name');

    public static $rules = array('name'=>'required|min:3');
}
