<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Additional;
use Faker\Generator as Faker;

$factory->define(Additional::class, function (Faker $faker) {
    return [
        'art' => $faker->sentence(2, true),
        'cinema' => $faker->sentence(4, true),
        'music' => $faker->sentence(6, true),
        'iduser' => $faker->numberBetween(1,50),
    ];
});
