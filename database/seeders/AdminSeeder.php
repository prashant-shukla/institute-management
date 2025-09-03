<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'username' => 'admin',
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'status' => 1,
                'password' => bcrypt('123456'),
            ]
        );

        $team = Team::firstOrCreate(['name' => 'Default Team']); // Ensure default team exists

        if (! $user->hasRole('super_admin', $team->id)) {
            // Pass team_id, not the object
            $user->assignRole('super_admin', $team->id);
        }
    }
}
