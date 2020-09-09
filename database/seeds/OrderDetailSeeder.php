<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            [
                'product_id' => '1',
                'order_id' => '1',
                'quantity' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '2',
                'order_id' => '2',
                'quantity' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '3',
                'order_id' => '1',
                'quantity' => '2',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
