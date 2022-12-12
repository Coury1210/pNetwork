<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Forum;
use App\Models\ForumDiscussion;
use App\User;
use Faker\Generator as Faker;

$factory->define(ForumDiscussion::class, function (Faker $faker) {
    return [
        'forum_id' => Forum::inRandomOrder()->first()->id,
        'topic' =>  $faker->word(),
        'user_id' => User::inRandomOrder()->first()->id,
        'description' => $faker->paragraph()
    ];
});
