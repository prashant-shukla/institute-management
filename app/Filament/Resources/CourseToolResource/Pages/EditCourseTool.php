<?php

namespace App\Filament\Resources\CourseToolResource\Pages;

use App\Filament\Resources\CourseToolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseTool extends EditRecord
{
    protected static string $resource = CourseToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
