<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Started Seeding Super User" . PHP_EOL;
        DB::table('users')->insert([
            'name' => 'Saidul Islam Uzzal',
            'email' => 'uzzalbd.creative@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        echo "Ended Seeding Super User" . PHP_EOL;
    }
}
