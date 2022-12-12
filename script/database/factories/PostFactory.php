<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'content' => $faker->paragraph,
        'thumbnail' => null,
        'likes' => $faker->numberBetween(1, 1000),
        'audio' => null
    ];
});
