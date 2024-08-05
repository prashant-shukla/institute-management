<?php

namespace App\Filament\Resources\FeedbackQuestionResource\Pages;

use App\Filament\Resources\FeedbackQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedbackQuestion extends EditRecord
{
    protected static string $resource = FeedbackQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
