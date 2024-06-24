<?php

namespace App\Filament\Resources\CourseSyllabusResource\Pages;

use App\Filament\Resources\CourseSyllabusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseSyllabus extends EditRecord
{
    protected static string $resource = CourseSyllabusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
