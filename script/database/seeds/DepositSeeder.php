<?php

use App\Models\Deposit;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Deposit::class, 10)->create();
    }
}
