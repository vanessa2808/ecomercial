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
                'product_id' => '3',
                'order_id' => '25',
                'quantity' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '4',
                'order_id' => '26',
                'quantity' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '10',
                'order_id' => '31',
                'quantity' => '2',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
