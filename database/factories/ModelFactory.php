<?php

use Illuminate\Support\Facades\Hash;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->email,
        'password' => Hash::make(123456)
    ];
});
