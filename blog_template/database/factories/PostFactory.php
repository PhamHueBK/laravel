<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->name,
        'description' => $faker->text($maxNbChars = 500),
        'content' => $faker->text($maxNbChars = 2000), // secret
        'type' => $faker->numberBetween($min = 0, $max = 6),
        'thumbnail' => $faker->imageUrl($width = 640, $height = 480),
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'views' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'user_id' =>  $faker->numberBetween($min = 1, $max = 100),
        'slug' => $faker->unique()->name,
    ];
});
