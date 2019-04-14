<?php

use Faker\Generator as Faker;

$factory->define(App\Models\student::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
    ];
});
