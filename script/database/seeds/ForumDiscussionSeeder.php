<?php

use App\Models\ForumDiscussion;
use Illuminate\Database\Seeder;

class ForumDiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ForumDiscussion::class, 5)->create();
    }
}
