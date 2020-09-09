<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name' => 'admin',
                'role_id' => '0', //admin
                'phone' => '0376381262',
                'email' => 'admin@gmail.com',
                'address' => 'Da Nang',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_name' => 'user',
                'role_id' => '1', //user
                'phone' => '0376381262',
                'email' => 'user@gmail.com',
                'address' => 'Da Nang',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_name' => 'vanessa',
                'role_id' => '1',
                'phone' => '0376381262',
                'email' => 'vanessa@gmail.com',
                'address' => 'Da Nang',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_name' => 'lucy',
                'role_id' => '1',
                'phone' => '0376381262',
                'email' => 'lucy@gmail.com',
                'address' => 'Da Nang',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_name' => 'Iris',
                'role_id' => '1',
                'phone' => '0376381262',
                'email' => 'iris@gmail.com',
                'address' => 'Da Nang',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],

        ]);
    }

}
