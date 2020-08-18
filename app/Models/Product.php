<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
 
class Product extends Model
{
    use Translatable;
    public $translationModel = "App\Models\ProductTranslation";
    public $translatedAttributes = ['title','content'];


    public function files()
    {
        return $this->hasMany('App\Models\File', 'relation_id', 'id')->where('file_type','product');;
    }
}
