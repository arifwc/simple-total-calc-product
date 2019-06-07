<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'menu' => $faker->word,
        'harga'=> $faker->numberBetween(10000, 15000),
        'path_image' => $faker->image($dir = 'public/image/', $width = 128, $height = 128, 'food', false)
    ];
});
