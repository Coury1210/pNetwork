<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "seller_id" => User::inRandomOrder()->first()->id,
        "name" => $faker->word(),
        "price" => $faker->numberBetween(1, 100000000),
        "available" => $faker->randomElement([true, false]),
        "quantity" => $faker->numberBetween(1, 1000),
        "description" => $faker->paragraph(),
        "image" => 'uploads/cover.jpg',
        "weight" => $faker->numberBetween(1, 1000),
        "units" => $faker->randomElement(['Kgs', 'Tonnes', 'Gms']),
        "color" => $faker->colorName
    ];
});
