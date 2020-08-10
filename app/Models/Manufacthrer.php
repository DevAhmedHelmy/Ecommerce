<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;


class Manufacthrer extends Model
{
    use Translatable;
    public $translationModel = "App\Models\ManufacthrerTranslation";
    public $translatedAttributes = ['name','contact_name'];
}
