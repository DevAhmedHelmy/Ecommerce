<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Factory;
use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $localfaker = Factory::create('ar_EG');

    return [
        'name' => $localfaker->country ,
        'currency' => 'LE',
        'iso_code' => $localfaker->country,
        'code' => $localfaker->country

    ];
});
