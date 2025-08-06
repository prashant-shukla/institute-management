<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Artisan::call('shield:generate', [
            '--all' => true,
        ]);
        $insertedPermissions = DB::table('permissions')->get();
        $roles = DB::table('roles')->where('name','super-admin')->get();
        $rolePermissions = [];
        foreach ($roles as $role) {
            foreach ($insertedPermissions as $permission) {
                $rolePermissions[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $role->id,
                ];
            }
        }
        DB::table('role_has_permissions')->insert($rolePermissions);
    }
}
