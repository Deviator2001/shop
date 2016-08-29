<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availabilities';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
