<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostCommentsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CartTableSeeder::class);
        $this->call(ForumCategorySeeder::class);
        $this->call(ForumSeeder::class); 
        $this->call(ForumDiscussionSeeder::class);
        $this->call(DiscussionOpinionSeeder::class);
        $this->call(SavingsProductSeeder::class);
        $this->call(SavingsVaultSeeder::class);
        $this->call(SavingsTransferSeeder::class);
        $this->call(SavingsWithdrawSeeder::class);  
    }
}
