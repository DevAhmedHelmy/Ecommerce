<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $faker = Faker\Factory::create('ar_SA');
    return [
        'name' => $faker->country ,
        'currency' => $faker->currency,
        'iso_code' => $faker->country,
        'code' => $faker->country

    ];
});
