<?php

namespace App\Filament\Resources\ProudStudentResource\Pages;

use App\Filament\Resources\ProudStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProudStudent extends EditRecord
{
    protected static string $resource = ProudStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
