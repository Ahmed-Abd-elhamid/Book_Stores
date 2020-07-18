<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'author' => $faker->name,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'released_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'category_id' => $faker->numberBetween($min = 1, $max = 9)
    ];
});
