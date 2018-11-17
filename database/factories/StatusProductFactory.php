<?php

use Faker\Generator as Faker;

$factory->define(App\StatusProduct::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(3),
    ];
});
