<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;



class Weight extends Model
{
    use Translatable;
    public $translationModel = "App\Models\WeightTranslation";
    public $translatedAttributes = ['name'];
}
