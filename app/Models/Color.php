<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;



class Color extends Model
{
    use Translatable;
    public $translationModel = "App\Models\ColorTranslation";
    public $translatedAttributes = ['name'];
}
