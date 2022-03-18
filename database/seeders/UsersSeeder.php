<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('awdawdawd'),
        ]);

        DB::table('users')->insert([
            'name' => "notADmin",
            'email' => 'notADmin@gmail.com',
            'password' => Hash::make('awdawdawd'),
        ]);
    }
}
