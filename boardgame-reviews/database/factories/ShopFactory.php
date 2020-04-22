<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Shop::class, function (Faker $faker) {
    return [
        'id' => mt_rand(),
        'ward_id' => mt_rand(1,24),
        'shop_name' => Str::random(12),
        'address' => Str::random(12),
        'boardgame_num' => mt_rand(),
        'content' => Str::random(150),
        'home_url' => Str::random(16),
        'price' => mt_rand(1,3000),
        'byo_flg' => '0',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
