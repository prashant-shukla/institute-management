<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbacksResource\Pages;
use App\Filament\Resources\FeedbacksResource\RelationManagers;
use App\Models\Feedback;
use App\Models\Student;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbacksResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Institute';
    protected static ?int $navigationSort = 605;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->columnSpanFull()
                ->required(),
                Forms\Components\MarkdownEditor::make('description')
                ->label('Description'),
                Forms\Components\Select::make('student_id')
                ->label('Student')
                ->options(Student::all()->mapWithKeys(function ($student) {
                    $student_name = $student->user->firstname . ' ' . $student->user->lastname;
                    return [$student->id => $student_name];
                })->toArray())
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
                    $student = Student::find($state);
                    $set('reg_no', $student ? $student->reg_no : null);
                }),
            
            Forms\Components\TextInput::make('reg_no')
                ->label('Reg No')
                ->columnSpanFull()
                ->required()
                ->disabled(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('description')
                ->searchable()
                ->sortable(),
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
            'index' => Pages\ListFeedbacks::route('/'),
            'create' => Pages\CreateFeedbacks::route('/create'),
            'edit' => Pages\EditFeedbacks::route('/{record}/edit'),
        ];
    }
}
