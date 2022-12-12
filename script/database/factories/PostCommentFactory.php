<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\PostComment;
use App\User;
use Faker\Generator as Faker;

$factory->define(PostComment::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'post_id' => Post::inRandomOrder()->first()->id,
        'content' => $faker->paragraph,
    ];
});
