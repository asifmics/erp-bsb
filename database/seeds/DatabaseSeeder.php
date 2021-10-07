<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "Starting User Seeder" . PHP_EOL;
        $this->call(UserSeeder::class);
        echo "Starting Permissions Seeder" . PHP_EOL;
        $this->call(PermissionSeeder::class);
        echo "Starting Role Seeder" . PHP_EOL;
        $this->call(RoleSeeder::class);
        echo "Starting Account Class and Group Seeder" . PHP_EOL;
        $this->call(AccountClassTableSeeder::class);
        echo "Starting Bank and GL Account Seeder" . PHP_EOL;
        $this->call(AccountTableSeeder::class);
        echo "Super Admin Login Details" . PHP_EOL;
        echo "------------------------------------------------>" . PHP_EOL;
        echo "Email: uzzalbd.creative@gmail.com" . PHP_EOL;
        echo "Password: 12345678" . PHP_EOL;
        echo "------------------------------------------------>" . PHP_EOL;
    }
}
