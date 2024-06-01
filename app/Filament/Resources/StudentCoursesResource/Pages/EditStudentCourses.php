<?php

namespace App\Filament\Resources\StudentCoursesResource\Pages;

use App\Filament\Resources\StudentCoursesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentCourses extends EditRecord
{
    protected static string $resource = StudentCoursesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
