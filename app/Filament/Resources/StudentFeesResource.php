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
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

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
                ->options(Student::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Select::make('course_id')
                ->label('Course')
                ->options(Course::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\TextInput::make('course_fee')
                ->label('Course Fee')
                ->required()
                ->numeric(),
               
                Forms\Components\DatePicker::make('received_on')
                ->label('Received On')
                ->required(),
                Forms\Components\TextInput::make('payment_mode')
                ->label('Payment Mode')
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
            'index' => Pages\ListStudentFees::route('/'),
            'create' => Pages\CreateStudentFees::route('/create'),
            'edit' => Pages\EditStudentFees::route('/{record}/edit'),
        ];
    }
}
