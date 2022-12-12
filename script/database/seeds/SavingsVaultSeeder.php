<?php

use App\Models\SavingsVault;
use Illuminate\Database\Seeder;

class SavingsVaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(SavingsVault::class, 20)->create();
    }
}
