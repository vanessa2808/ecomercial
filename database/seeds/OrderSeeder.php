<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => '3',
                'total_price' => '20.000',
                'status' => '0',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '4',
                'total_price' => '20.000',
                'status' => '0',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '5',
                'total_price' => '20.000',
                'status' => '1',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
