<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentFeesResource\Pages;
use App\Filament\Resources\StudentFeesResource\RelationManagers;
use App\Models\StudentFees;
use App\Models\StudentCourses;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class StudentFeesResource extends Resource
{
    protected static ?string $model = StudentFees::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';
    protected static ?string $navigationGroup = 'Institute';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                ->label('Student')
                ->options(Student::all()->mapWithKeys(function ($student) {
                    // dd($student->user->firstname);
                    $student_name = $student->user->firstname.' '.$student->user->lastname;
                    // dd($student_name);
                    return [$student->id => $student_name];
                })->toArray())
                ->searchable()
                ->required(),
                Forms\Components\Select::make('course_id')
                ->label('Course')
                ->options(Course::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\TextInput::make('fee_amount')
                ->label('Course Fee')
                ->required()
                ->numeric(),
               
                Forms\Components\DatePicker::make('received_on')
                ->label('Received On')
                ->required(),
                Forms\Components\ToggleButtons::make('payment_mode')
                    ->inline()
                    ->options([
                        'credit_card' => 'Credit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'Online' => 'Online',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.full_name')
                ->label('Student Name')
                ->searchable()
                ->sortable()
                ->toggleable(),
                TextColumn::make('course.name')->searchable()->sortable()->toggleable()->label('Course'),
                TextColumn::make('fee_amount')
                    ->label('Course Fee')
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
            'index' => Pages\ListStudentFees::route('/'),
            'create' => Pages\CreateStudentFees::route('/create'),
            'edit' => Pages\EditStudentFees::route('/{record}/edit'),
        ];
    }
}
