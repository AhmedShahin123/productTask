<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'),
        'type' => 'merchant'
    ]);
    }
}
