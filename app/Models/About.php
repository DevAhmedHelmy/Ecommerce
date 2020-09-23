<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class About extends Model
{
    use Translatable;
    public $translationModel = "App\Models\AboutTranslation";
    public $translatedAttributes = ['title','description'];
}
