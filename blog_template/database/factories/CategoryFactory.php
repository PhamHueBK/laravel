<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'parent_id' =>$faker->numberBetween($min = 1, $max = 100),
        'left' =>$faker->numberBetween($min = 1, $max = 100),
        'right' =>$faker->numberBetween($min = 1, $max = 100),
        'slug' => $faker->unique()->name,
    ];
});
