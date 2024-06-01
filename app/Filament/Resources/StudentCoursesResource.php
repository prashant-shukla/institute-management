<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentCoursesResource\Pages;
use App\Filament\Resources\StudentCoursesResource\RelationManagers;
use App\Models\StudentCourses;
use App\Models\Student;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentCoursesResource extends Resource
{
    protected static ?string $model = StudentCourses::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                ->searchable(),
                Forms\Components\TextInput::make('certificate_number')
                ->label('Certificate no')
                ->numeric() 
                ->integer(),
                Forms\Components\DatePicker::make('enrolled_at')
                ->label('Enrolled Date'),
                Forms\Components\DatePicker::make('certificate_issued_at')
                ->label(' Certificate Issu'),
                Forms\Components\TextInput::make('remark')
                ->label(' Remark'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name:'student.name')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make(name:'course.name')
                ->searchable()
                ->sortable()
                ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStudentCourses::route('/'),
            'create' => Pages\CreateStudentCourses::route('/create'),
            'edit' => Pages\EditStudentCourses::route('/{record}/edit'),
        ];
    }
}
