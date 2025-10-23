<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExamResource\Pages;
use App\Models\Exam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Exam Management';
    protected static ?string $pluralModelLabel = 'Exams';
    protected static ?string $modelLabel = 'Exam';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('exam_category_id')
                    ->relationship('category', 'name')
                    ->label('Exam Category')
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->label('Exam Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('total_questions')
                    ->label('Total Questions')
                    ->numeric()
                    ->default(0),

                Forms\Components\TextInput::make('total_marks')
                    ->label('Total Marks')
                    ->numeric()
                    ->default(0),

                Forms\Components\TextInput::make('duration')
                    ->label('Duration (in minutes)')
                    ->numeric()
                    ->default(60),

                Forms\Components\Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Exam Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('total_questions')
                    ->label('Questions'),

                Tables\Columns\TextColumn::make('total_marks')
                    ->label('Marks'),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration (min)'),

                Tables\Columns\ToggleColumn::make('status')
                    ->label('Active'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('exam_category_id')
                    ->relationship('category', 'name')
                    ->label('Filter by Category'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExams::route('/'),
            'create' => Pages\CreateExam::route('/create'),
            'edit' => Pages\EditExam::route('/{record}/edit'),
        ];
    }
}
