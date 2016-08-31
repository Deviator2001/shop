<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Sentinel;

class product extends Model
{

    protected $table = 'products';//указываем с какой таблицей базы данных работает данная модель


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function parentCategory()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\brand');
    }
    public function availability()
    {
        return $this->belongsTo('App\Availability');
    }
    public function getImagesAttribute($value)
    {
        return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }
    public function setImagesAttribute($images)
    {
        $this->attributes['images'] = implode(',', $images);
    }

}
