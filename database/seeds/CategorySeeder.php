<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Cafe',
                'created_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Fruit',
                'created_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Soda',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}

