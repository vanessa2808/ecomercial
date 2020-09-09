<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorite')->insert([
            [
                'product_id' => '1',
                'user_id' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '2',
                'user_id' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => '3',
                'user_id' => '5',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
