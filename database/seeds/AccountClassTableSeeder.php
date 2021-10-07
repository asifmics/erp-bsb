<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccountClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Started Seeding Account Classes" . PHP_EOL;
        DB::table('account_classes')->insert([
            [
            'name' => 'Assets',
            'type' => 'Assets',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Liabilities',
            'type' => 'Liabilities',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Income',
            'type' => 'Income',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Expense',
            'type' => 'Expense',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
        echo "Ended Seeding Account Classes" . PHP_EOL;
        echo "Started Seeding Account Groups" . PHP_EOL;
        DB::table('account_groups')->insert([
            [
            'name' => 'Current Assets',
            'class_id' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Current Liabilities',
            'class_id' => 2,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Income',
            'class_id' => 3,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
            'name' => 'Costs',
            'class_id' => 4,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
        echo "Ended Seeding Account Groups" . PHP_EOL;
    }
}
