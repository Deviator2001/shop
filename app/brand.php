<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class brand extends Model
{
    use OrderableModel;

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function getOrderField()
    {
        return 'order';
    }
}
