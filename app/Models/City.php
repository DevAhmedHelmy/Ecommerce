<?php

namespace App\Models;

use App\Models\Country;
use Astrotomic\Translatable\Translatable;

class City extends Model
{
    use Translatable;
    public $translationModel = "App\Models\CityTranslation";
    public $translatedAttributes = ['name'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
