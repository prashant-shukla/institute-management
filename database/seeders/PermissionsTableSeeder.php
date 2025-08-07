<?php

namespace Database\Seeders;

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
        // Generate all permissions using shield
        Artisan::call('shield:generate', [
            '--all' => true,
        ]);

        // Fetch all permissions
        $insertedPermissions = DB::table('permissions')->get();

        // Get super-admin roles
        $roles = DB::table('roles')->where('name', 'super-admin')->get();

        $rolePermissions = [];

        foreach ($roles as $role) {
            foreach ($insertedPermissions as $permission) {
                $rolePermissions[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $role->id,
                ];
            }
        }

        // Avoid duplicate key errors by ignoring duplicates
        DB::table('role_has_permissions')->insertOrIgnore($rolePermissions);
    }
}

