<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['role_id'])) {
            $role = \App\Models\Role::find($data['role_id']);

            if ($role) {
                $data['name'] = $role->name; // update time pe name save karega
            }
        }

        return $data;
    }

    protected function afterSave(): void
    {
        $record = $this->record;

        if ($record->role_id) {
            $role = \App\Models\Role::find($record->role_id);

            app(\Spatie\Permission\PermissionRegistrar::class)
                ->setPermissionsTeamId(1);

            $record->syncRoles([$role]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
