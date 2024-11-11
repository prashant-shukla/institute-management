<?php

namespace App\Filament\Installation;

use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Shipu\WebInstaller\Concerns\InstallationContract;
use Spatie\Permission\Models\Role;


class InstallationFinish implements InstallationContract
{
  public function run($data): bool
  {
    try {

      Artisan::call('migrate:fresh', [
        '--force' => true,
      ]);

      if ($data && isset($data['import_demo_data']) && $data['import_demo_data']) {
        Artisan::call('db:seed', [
          '--force' => true,
        ]);
      }

      $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);

      $user = User::create([
        'firstname'       => array_get($data, 'applications.admin.name'),
        'lastname'       => array_get($data, 'applications.admin.name'),
        'status'       => 'active',
        'email'      => array_get($data, 'applications.admin.email'),
        'username'      => array_get($data, 'applications.admin.email'),
        'password'   => array_get($data, 'applications.admin.password'),
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      $user->assignRole($role);
      file_put_contents(storage_path('installed'), 'installed');
      return true;
    } catch (\Exception $exception) {
      return false;
    }
  }

  public function redirect(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
  {
    try {
      if (class_exists(Filament::class)) {
        return redirect()->intended(Filament::getUrl());
      }
      return redirect(config('installer.redirect_route'));
    } catch (\Exception $exception) {
      Log::info("route not found...");
      Log::info($exception->getMessage());
      return redirect()->route('installer.success');
    }
  }

  public function dehydrate(): void
  {
    Log::info("installation dehydrate now...");
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
  }
}
