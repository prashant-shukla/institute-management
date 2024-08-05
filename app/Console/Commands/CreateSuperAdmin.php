<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    protected $signature = 'shield:super-admin {--user=}';
    protected $description = 'Create or update a super admin user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userEmail = $this->option('user');

        if (!$userEmail) {
            $this->error('The --user option is required.');
            return;
        }

        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            $user = User::create([
                'username' => 'superadmin',
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'email' => $userEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('superadmin'),
                'status' => 'active',
            ]);
        }

        $user->assignRole('super-admin'); // This should now work if the trait is added

        $this->info('Super admin created or updated successfully.');
    }
}
