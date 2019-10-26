<?php

use Illuminate\Support\Facades\Hash;

$factory->define(App\Models\Users::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->email,
        'password' => Hash::make(123456)
    ];
});

$factory->define(App\Models\Colors::class, function (Faker\Generator $faker) {
    return [
        'color' => $faker->colorName,
        'code' => $faker->hexcolor
    ];
});

$factory->define(App\Models\Products::class, function (Faker\Generator $faker) {
    return [
        'product' => $faker->word,
        'description' => $faker->paragraph,
        'quantity' => $faker->randomFloat(10, 1, 100),
        'color' => $faker->randomFloat(0, 1, 5),
        'color_variant' => "[" . $faker->randomFloat(0, 1, 5) . "," . $faker->randomFloat(0, 1, 5) . "," . $faker->randomFloat(0, 1, 5) ."]",
    ];
});
