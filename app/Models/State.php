<?php

namespace App\Models;


use App\Models\City;
use App\Models\Country;
use Astrotomic\Translatable\Translatable;

class State extends Model
{
    use Translatable;
    public $translationModel = "App\Models\StateTranslation";
    public $translatedAttributes = ['name'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
