<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Team;
use Z3d0X\FilamentFabricator\Resources\PageResource;
use Spatie\Permission\PermissionRegistrar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Register custom Role/Permission models (agar aapne extend kiya hai)
        app(PermissionRegistrar::class)
            ->setPermissionClass(Permission::class)
            ->setRoleClass(Role::class);

        // ✅ Default Team set karna
        $defaultTeam = Team::first();
        if ($defaultTeam) {
            app(PermissionRegistrar::class)->setPermissionsTeamId($defaultTeam->id);
        }
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        // Filament navigation settings
        PageResource::navigationGroup('CMS');
        PageResource::navigationSort(1);
        PageResource::navigationIcon('heroicon-o-cube');
    }

   


}
