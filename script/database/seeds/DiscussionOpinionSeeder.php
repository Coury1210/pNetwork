<?php

use App\Models\DiscussionOpinion;
use Illuminate\Database\Seeder;

class DiscussionOpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DiscussionOpinion::class, 5)->create();
    }
}
