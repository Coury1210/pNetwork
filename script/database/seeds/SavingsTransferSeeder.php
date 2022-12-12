<?php

use App\Models\SavingsTransfer;
use Illuminate\Database\Seeder;

class SavingsTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SavingsTransfer::class, 20)->create();
    }
}
