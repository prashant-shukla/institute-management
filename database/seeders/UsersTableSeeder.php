<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create or update the superadmin user
        User::updateOrCreate([
            'username' => 'superadmin'
        ], [
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@unnatischoolofdesign.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin'),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Call the custom command to create or update the super admin
        Artisan::call('shield:super-admin', [
            '--user' => 'superadmin@unnatischoolofdesign.com'
        ]);

        // Ensure that all roles exist
        $roles = Role::whereNot('name', 'super-admin')->get();

        foreach ($roles as $role) {
            for ($i = 0; $i < 10; $i++) {
                // Create or update users
                $user = User::updateOrCreate([
                    'email' => $faker->unique()->safeEmail
                ], [
                    'username' => $faker->unique()->userName,
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Check if the role-user relationship already exists
                $roleUserExists = DB::table('model_has_roles')
                    ->where('role_id', $role->id)
                    ->where('model_type', User::class)
                    ->where('model_id', $user->id)
                    ->exists();

                if (!$roleUserExists) {
                    DB::table('model_has_roles')->insert([
                        'role_id' => $role->id,
                        'model_type' => User::class,
                        'model_id' => $user->id,
                    ]);
                }
            }
        }
    }
}
