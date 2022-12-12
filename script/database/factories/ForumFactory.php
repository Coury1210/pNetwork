<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Forum;
use App\Models\ForumCategory;
use App\User;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'user_id' => User::inRandomOrder()->first()->id,
        'category_id' => ForumCategory::inRandomOrder()->first()->id
    ];
});
