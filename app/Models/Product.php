<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use App\Models\Mall;
class Product extends Model
{
    use Translatable;
    public $translationModel = "App\Models\ProductTranslation";
    public $translatedAttributes = ['title','content'];


    public function files()
    {
        return $this->hasMany('App\Models\File', 'relation_id', 'id')->where('file_type','product');;
    }

    public function product_additionals()
    {
        return $this->hasMany(ProductAdditional::class, 'product_id', 'id');
    }

    public function malls()
    {
        return $this->belongsToMany(Mall::class,'product_mall','product_id','mall_id');
    }
}
