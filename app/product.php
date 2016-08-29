<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Angrydeer\Attachfiles\AttachableTrait;
use Angrydeer\Attachfiles\AttachableInterface;
use Request;
use Sentinel;

class product extends Model implements AttachableInterface
{
    use AttachableTrait;

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

//вставка изображений

    public function getImagesAttribute($value)//получение и запись нескольких путей к картинкам в одно поле таблицы
    {
        return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }
    public function setImagesAttribute($images)//получение и запись нескольких путей к картинкам в одно поле таблицы
    {
        $this->attributes['images'] = implode(',', $images);
    }

}
