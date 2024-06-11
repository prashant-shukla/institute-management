<?php

namespace App\Filament\Resources\FeedbackQuestionResource\Pages;

use App\Filament\Resources\FeedbackQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedbackQuestions extends ListRecords
{
    protected static string $resource = FeedbackQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
