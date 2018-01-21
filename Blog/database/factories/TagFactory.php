<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        //
    	'name' => $faker->name,
        'post_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
