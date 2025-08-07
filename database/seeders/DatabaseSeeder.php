<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
           // Ensure role exists
    Role::firstOrCreate(['name' => 'super_admin']);

    // Assign role to first user (or any user)
    $user = User::find(1); // or use email lookup
    if ($user) {
        $user->assignRole('super_admin');
    }
        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
        ]);
    }
    
}
