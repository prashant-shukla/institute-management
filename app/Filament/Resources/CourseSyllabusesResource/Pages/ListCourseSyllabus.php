<?php

namespace App\Filament\Resources\CourseSyllabusesResource\Pages;

use App\Filament\Resources\CourseSyllabusesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseSyllabus extends ListRecords
{
    protected static string $resource = CourseSyllabusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
