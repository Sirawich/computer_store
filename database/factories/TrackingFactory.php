<?php

use Faker\Generator as Faker;

$factory->define(App\Tracking::class, function (Faker $faker) {
    return [
       'code' => $faker->unique()->numberBetween(1000,9999),
        'product'=>$faker->name,
        'detail' => $faker->sentence(rand(5,10),true),
        'price' => $faker->numberBetween(100,5000),
        'user_id' => App\User::pluck('id')->random(),
        'note' =>$faker->sentence(rand(0,3),true),
    ];
});
