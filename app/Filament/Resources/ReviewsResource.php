<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewsResource\Pages;
use App\Filament\Resources\ReviewsResource\RelationManagers;
use App\Models\Reviews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use App\Models\Student;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewsResource extends Resource
{
    protected static ?string $model = Reviews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Institute';

    protected static ?int $navigationSort = -150;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('review')
                ->label('Review')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('student_id')
                ->label('Student')
                ->options(Student::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Toggle::make('status')
                ->label('Status')
                ->onColor('success')
                ->offColor('danger')
                ->required(),
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReviews::route('/create'),
            'edit' => Pages\EditReviews::route('/{record}/edit'),
        ];
    }
}
