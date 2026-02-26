<?php

namespace App\Filament\Resources\StudentFeesResource\Pages;

use App\Filament\Resources\StudentFeesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentFees extends EditRecord
{
    protected static string $resource = StudentFeesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
