<?php

use App\Models\SavingsWithdraw;
use Illuminate\Database\Seeder;

class SavingsWithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SavingsWithdraw::class, 10)->create();
    }
}
