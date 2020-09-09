<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            [
                'user_id' => '1',
                'product_id' => '1',
                'comment' => 'Good tasty',
                'rate' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'product_id' => '1',
                'comment' => 'Good tasty',
                'rate' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'product_id' => '1',
                'comment' => 'not Good tasty',
                'rate' => '3',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
