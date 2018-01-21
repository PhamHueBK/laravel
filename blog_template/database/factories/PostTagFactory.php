<?php

use Faker\Generator as Faker;

$factory->define(App\PostTag::class, function (Faker $faker) {
    return [
        'post_id' =>  $faker->numberBetween($min = 1, $max = 100),
        'tag_id' =>  $faker->numberBetween($min = 1, $max = 100),
    ];
});
