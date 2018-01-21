<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //'title', 'description', 'content','type', 'thumbnail', 'status', 'views', 'key_md5', 'user_id'
    	'title' => $faker->name,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true), // secret
        'type' => $faker->numberBetween($min = 0, $max = 8),
        'thumbnail' => $faker->imageUrl($width = 640, $height = 480),
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'views' => $faker->randomDigitNotNull,
        'user_id' => /*$faker->numberBetween($min = 1, $max = 101)*/101,
    ];
});
