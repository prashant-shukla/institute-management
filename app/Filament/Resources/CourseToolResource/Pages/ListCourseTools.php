<?php

namespace App\Filament\Resources\CourseToolResource\Pages;

use App\Filament\Resources\CourseToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseTools extends ListRecords
{
    protected static string $resource = CourseToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
