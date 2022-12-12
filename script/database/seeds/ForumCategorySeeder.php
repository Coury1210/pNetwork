<?php

use App\Models\ForumCategory;
use Illuminate\Database\Seeder;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = array(
            ['name' => 'Worship'],
            ['name' => 'Church Leadership'],
            ['name' => 'Praise'],
            ['name' => 'Evangelism'],
            ['name' => 'Xtian Lifestyle'],
            ['name' => 'Teaching']
        );
        foreach ($cats as $cat) {
            ForumCategory::create($cat);
        }
    }
}
