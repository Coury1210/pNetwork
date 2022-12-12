<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use App\Models\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
        'status' => $faker->randomElement(['complete', 'pending', 'cancelled'])
    ];
});
