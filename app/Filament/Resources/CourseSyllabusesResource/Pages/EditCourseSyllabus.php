<?php

namespace App\Filament\Resources\CourseSyllabusesResource\Pages;

use App\Filament\Resources\CourseSyllabusesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseSyllabus extends EditRecord
{
    protected static string $resource = CourseSyllabusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
