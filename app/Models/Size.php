<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;



class Size extends Model
{
    use Translatable;
    public $translationModel = "App\Models\SizeTranslation";
    public $translatedAttributes = ['name'];
}
