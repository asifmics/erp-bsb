<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Started Seeding GL Accounts" . PHP_EOL;
        DB::table('gl_accounts')->insert([
            [
            'name' => 'Cash',
            'group_id' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Test Bank',
            'group_id' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Bank Loans',
            'group_id' => 2,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Main Income',
            'group_id' => 3,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Wages & Salaries',
            'group_id' => 4,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Charges',
            'group_id' => 4,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
        echo "Ended Seeding GL Accounts" . PHP_EOL;
        echo "Started Seeding Bank Accounts" . PHP_EOL;
        DB::table('bank_accounts')->insert([
            [
            'account_name' => 'Cash',
            'bank_name' => null,
            'account_gl_id' => 1,
            'charge_gl_id' => 6,
            'type' => 3,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'account_name' => 'BSB - T Bank',
            'bank_name' => 'T Bank',
            'account_gl_id' => 2,
            'charge_gl_id' => 6,
            'type' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
        echo "Ended Seeding Bank Accounts" . PHP_EOL;
    }
}
