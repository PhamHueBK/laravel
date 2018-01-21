<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'permission' => $faker->numberBetween($min = 0, $max = 2),
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'address' => $faker->streetAddress(),
        'mobile' => $faker->phoneNumber(),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'remember_token' => str_random(10),
    ];
});
