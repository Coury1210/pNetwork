<?php

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cart::class, 6)->create();
    }
}
