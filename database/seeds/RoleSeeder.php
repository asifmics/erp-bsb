<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Started Seeding Roles" . PHP_EOL;
        $roles = ['Admin', 'Super Admin'];
        $permissions = Permission::all();
        foreach ($roles as $role) {
            Role::updateOrInsert([
                'name'       => $role,
                'guard_name' => 'web',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        $permissionsarray = [];
        foreach ($roles as $key => $role) {
            foreach ($permissions as $permission) {
                $permissionsarray[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $key + 1,
                ];
            }
        }

        DB::table('role_has_permissions')->insert($permissionsarray);
        $user = User::find(1);
        $user->assignRole('Super Admin');
        echo "Ended Seeding Roles" . PHP_EOL;
    }
}
