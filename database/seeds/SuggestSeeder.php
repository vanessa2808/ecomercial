<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SuggestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suggest')->insert([
            [
                'user_id' => '3',
                'product_name' => 'Cafe dang',
                'product_image' => 'default.png',
                'description' => 'I like it',
                'reason' => 'I like it',
                'category_id' => '1',
                'status' => '0',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '3',
                'product_name' => 'Cafe dang',
                'product_image' => 'default.png',
                'description' => 'I like it',
                'reason' => 'I like it',
                'category_id' => '2',
                'status' => '0',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '5',
                'product_name' => 'Cafe dang',
                'product_image' => 'default.png',
                'description' => 'I like it',
                'reason' => 'I like it',
                'category_id' => '3',
                'status' => '0',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
