<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;



class Category extends Model
{
    use Translatable;
    public $translationModel = "App\Models\CategoryTranslation";
    public $translatedAttributes = ['name','description','keywords'];


    public function parents()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

}
