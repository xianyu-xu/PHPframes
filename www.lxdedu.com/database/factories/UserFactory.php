<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username'=>$faker->name,
        'password'=>bcrypt('admin'),
        'email'=>$faker->email,
    ];
});
