<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Role;
use App\Models\Student;
use Spatie\Permission\PermissionRegistrar;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Save se pehle form data ko tweak karna (role ka name -> users.name)
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (! empty($data['role_id'])) {
            $role = Role::find($data['role_id']);

            if ($role) {
                // update time pe naam save karega
                $data['name'] = $role->name;
            }
        }

        return $data;
    }

    /**
     * Record save hone ke baad chalega.
     */
    protected function afterSave(): void
    {
        $user = $this->record;

        if ($user->role_id) {
            $role = Role::find($user->role_id);

            if ($role) {
                // 🔹 Spatie role sync
                app(PermissionRegistrar::class)->setPermissionsTeamId(1);
                $user->syncRoles([$role]);

                // 🔹 Agar role student hai to Student record ensure karo
                if (strtolower($role->name) === 'student') {
                    $user->student()->firstOrCreate(
                        [],                              // existing student ho to wahi rahe
                        [
                            'reg_date'  => now(),
                            'is_online' => true,
                        ]
                    );
                } else {
                    // OPTIONAL: agar ab student nahi raha to student row delete karni ho to:
                    // $user->student()?->delete();
                }
            }
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
