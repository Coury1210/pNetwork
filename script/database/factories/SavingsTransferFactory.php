<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SavingsTransfer;
use App\User;
use Faker\Generator as Faker;

$factory->define(SavingsTransfer::class, function (Faker $faker) {
    $receiver = User::inRandomOrder()->first()->id;
    return [
        'user_id' => User::inRandomOrder()->whereNotIn('id', [$receiver])->first()->id,
        'receiver_id' => $receiver,
        'amount' => $faker->numberBetween(2000, 10000000),
        'tx_id' => uniqid(),
        'status' => $faker->randomElement(['rolled_back', 'pending', 'transfered']),
        'reason' => $faker->word()
    ];
});
