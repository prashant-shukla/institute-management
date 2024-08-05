<?php

namespace App\Filament\Resources\FeedbackQuestionResource\Pages;

use App\Filament\Resources\FeedbackQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedbackQuestion extends CreateRecord
{
    protected static string $resource = FeedbackQuestionResource::class;
}
