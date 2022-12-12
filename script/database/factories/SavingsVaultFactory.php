<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SavingsProduct;
use App\Models\SavingsVault;
use App\User;
use Faker\Generator as Faker;

$factory->define(SavingsVault::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'amount' => $faker->numberBetween(20000, 500000),
        'savings_product_id' => SavingsProduct::inRandomOrder()->first()->id,
        'status' => $faker->randomElement(['withdrawn', 'active'])
    ];
});
