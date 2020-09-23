<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => '1',
                'product_name' => 'Milk Coffee',
                'description' => 'Bring you a good favor',
                'product_image' => 'default.png',
                'price' => '10.000',
                'amount' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'category_id' => '2',
                'product_name' => 'orange juice',
                'description' => 'Bring you a good favor',
                'product_image' => 'default.png',
                'price' => '20.000',
                'amount' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'category_id' => '2',
                'product_name' => 'Coca',
                'description' => 'Bring you a good favor',
                'product_image' => 'default.png',
                'price' => '5.000',
                'amount' => '4',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
