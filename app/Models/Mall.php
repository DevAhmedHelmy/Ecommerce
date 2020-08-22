<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;


class Mall extends Model
{
    use Translatable;
    public $translationModel = "App\Models\MallTranslation";
    public $translatedAttributes = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_mall','mall_id','product_id');
    }
}
