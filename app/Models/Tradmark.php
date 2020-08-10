<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class Tradmark extends Model
{
    use Translatable;
    public $translationModel = "App\Models\TradmarkTranslation";
    public $translatedAttributes = ['name'];
}
