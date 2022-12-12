<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DiscussionOpinion;
use App\Models\ForumDiscussion;
use App\User;
use Faker\Generator as Faker;

$factory->define(DiscussionOpinion::class, function (Faker $faker) {
    return [
        'discussion_id' => ForumDiscussion::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
        'message' => $faker->sentence(),
        'likes' => $faker->numberBetween(1,1000),
        'dislikes' => $faker->numberBetween(1,1000),
        'approved' => true
    ];
});
