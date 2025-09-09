<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use App\Models\Team;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🟢 Ensure Super Admin Team with id = 1
        $team = Team::firstOrCreate(
            ['id' => 1],
            ['name' => 'Super Admin Team']
        );

        // Other teams
        $teams = ['Admin Team', 'Teacher Team', 'Student Team'];
        foreach ($teams as $teamName) {
            Team::firstOrCreate(['name' => $teamName]);
        }

        // 🟢 Ensure super_admin role exists
        $role = Role::firstOrCreate(
            ['name' => 'super_admin', 'guard_name' => 'web']
        );

        // 🟢 Default admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'super_admin', 'password' => bcrypt('Admin@123')]
        );

        if ($user && $team) {
            // Set current team context for Spatie
            app(PermissionRegistrar::class)->setPermissionsTeamId($team->id);

            // Assign super_admin role if not already assigned
            if (! $user->hasRole('super_admin')) {
                $user->assignRole($role); // safer than using string
            }
        }

        // ✅ Call other seeders (optional, only if they exist)
        if (class_exists(RolesTableSeeder::class)) {
            $this->call(RolesTableSeeder::class);
        }
        if (class_exists(PermissionsTableSeeder::class)) {
            $this->call(PermissionsTableSeeder::class);
        }
        if (class_exists(AdminSeeder::class)) {
            $this->call(AdminSeeder::class);
        }
    }
}
