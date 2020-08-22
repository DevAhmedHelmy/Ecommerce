<?php

namespace App\Models;
use App\Models\City;
use App\Models\Mall;
use Astrotomic\Translatable\Translatable;

class Country extends Model
{
    use Translatable;
    public $translationModel = "App\Models\CountryTranslation";
    public $translatedAttributes = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function malls()
    {
        return $this->hasMany(Mall::class);
    }
}
