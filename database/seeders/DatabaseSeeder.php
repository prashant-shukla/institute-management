<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        // Call the custom command to create the super admin
        Artisan::call('shield:super-admin', [
            '--user' => 'superadmin@unnatischoolofdesign.com'
        ]);
    }
}
