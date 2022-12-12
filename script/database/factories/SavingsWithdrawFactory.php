<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SavingsWithdraw;
use App\User;
use Faker\Generator as Faker;

$factory->define(
    SavingsWithdraw::class,
    function (Faker $faker) {
        $method = $faker->randomElement(['btc', 'swift', 'paypal']);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'amount' => $faker->numberBetween(10000,100000000),
            'method' => $method,
            'paypal_email' => $method == 'paypal' ? $faker->email : null,
            'btc_address' => $method == 'btc' ? $faker->email : null,
            'txn_id' => uniqId('withdraw')
        ];
});
