<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::firstOrCreate(['name' => 'Default Team']);

        Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::where('email', 'admin@example.com')->first();

        if ($user && $team) {
            // Set default team context for Spatie
            app(PermissionRegistrar::class)->setPermissionsTeamId($team->id);

            // Assign super_admin role in the context of team
            if (! $user->hasRole('super_admin', $team->id)) {
                $user->assignRole('super_admin', $team->id);
            }
        }

        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
