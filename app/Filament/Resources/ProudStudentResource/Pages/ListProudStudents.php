<?php

namespace App\Filament\Resources\ProudStudentResource\Pages;

use App\Filament\Resources\ProudStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProudStudents extends ListRecords
{
    protected static string $resource = ProudStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
