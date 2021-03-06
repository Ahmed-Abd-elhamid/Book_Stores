<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'city' => $faker->city,
        'location' => $faker->address,
        'telephone' => $faker->phoneNumber 
    ];
});
