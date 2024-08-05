<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update the super-admin role
        Role::updateOrCreate(['name' => 'super-admin'], ['guard_name' => 'web']);

        // Other roles
        $roles = ["admin", "teacher", "student"];
        
        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role], ['guard_name' => 'web']);
        }
    }
}
