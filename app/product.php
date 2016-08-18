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


    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function parentCategories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\brand');
    }

//вставка изображений

    public function setSlugAttribute($slug)
    {

        if($slug=='') $slug = str_slug(Request::get('name'));
        if($cat= self::where('slug',$slug)->first()){
            $idmax=self::max('id')+1;
            if(isset($this->attributes['id']))
            {
                if ($this->attributes['id'] != $cat->id ){
                    $slug=$slug.'_'.++$idmax;
                }
            }
            else
            {
                if (self::where('slug',$slug)->count() > 0)
                    $slug=$slug.'_'.++$idmax;
            }
        }
        $this->attributes['slug']=$slug;
    }

    public function getPhotosAttribute($value)
    {
        return array_pluck($this->attaches()->get()->toArray(), 'filename');
    }

    public function setPhotosAttribute($images)
    {
        $imgtitles = Request::get('imgtitle');
        $imgalts = Request::get('imgalt');
        $imgdescs = Request::get('imgdesc');
        $this->save();
        $i=0;
        foreach($images as $image)
        {
            $this->updateOrNewAttach($image, $imgtitles[$i], $imgalts[$i], $imgdescs[$i]);
            $i++;
        }
        $path = config('admin.imagesUploadDirectory').'/'.Sentinel::check()->id;
        $files = glob(public_path($path)."/*");
        if (count($files) > 0) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
        $this->keepOnly($images);
    }

}
