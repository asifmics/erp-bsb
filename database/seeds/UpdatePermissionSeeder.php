<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
class UpdatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        echo "Started Seeding Permissions" . PHP_EOL;
        $permissions =[

        ];


        foreach (range(1,1) as $index) {
            foreach ($permissions as $permission) {
                Permission::updateOrInsert([
                    'name'       => $permission,
                    'guard_name' => 'web',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            }
        }
        echo "Ended Seeding Permissions" . PHP_EOL;
    }
}
