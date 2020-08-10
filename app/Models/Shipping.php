<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;



class Shipping extends Model
{
    use Translatable;
    public $translationModel = "App\Models\ShippingTranslation";
    public $translatedAttributes = ['name'];
}
