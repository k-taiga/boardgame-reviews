<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'id' => mt_rand(1,85),
        'shop_id' => mt_rand(1,85),
        'filename' => Str::random(12) . '.jpg',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
