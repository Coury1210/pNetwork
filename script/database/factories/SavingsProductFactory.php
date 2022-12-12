<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SavingsProduct;
use Faker\Generator as Faker;

$factory->define(SavingsProduct::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'min_savings_amount' => $faker->numberBetween(50000, 200000),
        'max_savings_amount' => $faker->numberBetween(2000001, 5000000),
        'annual_rate' => $faker->randomElement(['7.12', '10.00.', '12.4', '14.8', '18.2', '25.00']),
        'duration' => $faker->numberBetween(1, 1000),
        'interval' => $faker->randomElement(['months', 'days', 'years'])
    ];
});
