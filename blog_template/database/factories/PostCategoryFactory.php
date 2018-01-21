<?php

use Faker\Generator as Faker;

$factory->define(App\PostCategory::class, function (Faker $faker) {
    return [
        //
        'post_id' =>  $faker->numberBetween($min = 1, $max = 100),
        'category_id' =>  $faker->numberBetween($min = 1, $max = 100),
    ];
});
