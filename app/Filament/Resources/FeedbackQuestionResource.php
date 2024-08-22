<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackQuestionResource\Pages;
use App\Filament\Resources\FeedbackQuestionResource\RelationManagers;
use App\Models\FeedbackQuestions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackQuestionResource extends Resource
{
    protected static ?string $model = FeedbackQuestions::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';
    protected static ?string $navigationGroup = 'Institute';
    protected static ?int $navigationSort = -60;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                  ->label('Question')
                  ->required()
                  ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                   ->label('Question')
                   ->sortable()
                   ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeedbackQuestions::route('/'),
            'create' => Pages\CreateFeedbackQuestion::route('/create'),
            'edit' => Pages\EditFeedbackQuestion::route('/{record}/edit'),
        ];
    }
}
