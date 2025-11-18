<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['role_id'])) {
            $role = \App\Models\Role::find($data['role_id']);

            if ($role) {
                $data['name'] = $role->name; // users table me save karega
            }
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        if ($record->role_id) {
            $role = \App\Models\Role::find($record->role_id);

            app(\Spatie\Permission\PermissionRegistrar::class)
                ->setPermissionsTeamId(1);

            $record->syncRoles([$role]);
        }
    }
}
