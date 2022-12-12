<?php

use App\Models\SavingsProduct;
use Illuminate\Database\Seeder;

class SavingsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            [
                'name' => 'Starter Savers',
                'min_savings_amount' => 50000,
                'max_savings_amount' => 200000,
                'annual_rate' => 7.12,
                'duration' => 30,
                'interval' => 'days'
            ],
            [
                'name' => 'Intermediate Savers',
                'min_savings_amount' => 200001,
                'max_savings_amount' => 500000,
                'annual_rate' => 10.00,
                'duration' => 60,
                'interval' => 'days'
            ],
            [
                'name' => 'Goal Savers',
                'min_savings_amount' => 500001,
                'max_savings_amount' => 2000000,
                'annual_rate' => 12.4,
                'duration' => 6,
                'interval' => 'months'
            ],
            [
                'name' => 'Big Savers',
                'min_savings_amount' => 2000001,
                'max_savings_amount' => 10000000,
                'annual_rate' => 18.2,
                'duration' => 12,
                'interval' => 'months'
            ]
        );

        foreach ($products as $product) {
            SavingsProduct::create($product);
        }
    }
}
