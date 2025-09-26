<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewsResource\Pages;
use App\Filament\Resources\ReviewsResource\RelationManagers;
use App\Models\Reviews;
use App\Models\Student;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewsResource extends Resource
{
    protected static ?string $model = Reviews::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';
    protected static ?string $navigationGroup = 'Institute';
    protected static ?int $navigationSort = 603;
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
                ->options(Student::all()->mapWithKeys(function ($student) {
                    $student_name = $student->user->firstname.' '.$student->user->lastname;
                    return [$student->id => $student_name];
                })->toArray())
                ->searchable()
                ->required()
                ->createOptionAction(function (string $newValue) {
                    // Split the newValue into first and last name
                    $parts = explode(' ', $newValue, 2);
                    $firstname = $parts[0];
                    $lastname = $parts[1] ?? '';

                    // Create User
                    $user = \App\Models\User::create([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                    ]);

                    // Create Student
                    $student = \App\Models\Student::create([
                        'user_id' => $user->id,
                    ]);

                    return $student->id; // Return new student ID for the select field
                }),

            Forms\Components\Select::make('course_id')
                ->label('Course')
                ->options(Course::all()->pluck('name', 'id'))
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
            TextColumn::make('student.full_name')
                ->label('Student Name')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->formatStateUsing(function ($state, $record) {
                    // Safely return student name even if student was deleted
                    return $record->student?->full_name ?? 'N/A';
                }),

            TextColumn::make('review')
                ->label('Review')
                ->sortable()
                ->toggleable(),
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
