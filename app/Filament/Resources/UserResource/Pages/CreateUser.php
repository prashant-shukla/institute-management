<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Role;
use App\Models\Student;
use Spatie\Permission\PermissionRegistrar;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Form submit hone ke baad, create se pehle
     * data mutate kar rahe hain.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! empty($data['role_id'])) {
            $role = Role::find($data['role_id']);

            if ($role) {
                // users table me name = role ka naam save kar rahe ho
                $data['name'] = $role->name;
            }
        }

        return $data;
    }

    /**
     * Record create hone ke baad chalega.
     */
    protected function afterCreate(): void
    {
        $user = $this->record;

        if ($user->role_id) {
            $role = Role::find($user->role_id);

            if ($role) {
                // 🔹 Spatie roles sync
                app(PermissionRegistrar::class)->setPermissionsTeamId(1);
                $user->syncRoles([$role]);

                // 🔹 Agar role "student" hai to Student record auto-create
                if (strtolower($role->name) === 'student') {
                    Student::firstOrCreate(
                        ['user_id' => $user->id],   // same user ke liye duplicate mat banao
                        [
                            'reg_date'  => now(),
                            'is_online' => true,
                            'course_id' => null,
                            'reg_no'    => 'REG-' . $user->id,
                        ]
                    );
                }
            }
        }
    }
}
