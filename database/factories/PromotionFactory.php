<?php

use faker\generator as faker;

$factory->define(App\Promotion::class, function (faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(3, 5))),
        'body' => $faker->paragraph(rand(10, 30), true),
        'views' => rand(0, 10),
    ];
});
