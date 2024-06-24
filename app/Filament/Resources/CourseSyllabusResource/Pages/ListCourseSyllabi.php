<?php

namespace App\Filament\Resources\CourseSyllabusResource\Pages;

use App\Filament\Resources\CourseSyllabusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseSyllabi extends ListRecords
{
    protected static string $resource = CourseSyllabusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
