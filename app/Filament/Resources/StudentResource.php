<?php

namespace App\Filament\Resources;


use App\Models\Branch;
use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Student;

use Filament\Forms\Form; // Corrected namespace for Form class
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Support\Collection;

class StudentResource extends Resource
{
    public static ?string $model = Student::class;

    // Other class methods...


    //public static $model = Student::class; // Removed duplicate declaration

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('REGISTRATION DETAILS')
                    ->schema([
                        DatePicker::make('reg_date')->required()->label('Reg Date')->columns(2),
                        TextInput::make('reg_no')->required()->label('Reg No')->maxLength(255)->columns(2),
                    ]),
                Section::make('PERSONAL DETAILS')
                    ->schema([
                        TextInput::make('name')->label('Name')->required()->maxLength(255),
                        TextInput::make('father_name')->label('Father Name')->required()->maxLength(255),
                        DatePicker::make('date_of_birth')->required()->label('Date of Birth'),
                        TextInput::make('email')->required()->label('Email')->email(),
                        Textarea::make('correspondence_add')->required()->label('Correspondence Add')->autosize(),
                        Textarea::make('permanent_add')->required()->label('Permanent Address')->autosize(),
                        TextInput::make('qualification')->required()->label('Qualification'),
                        TextInput::make('college_workplace')->required()->label('College/Workplace'),
                        FileUpload::make('photo')->required()->label('Photo')->columnSpanFull(),
                    ]),
                Section::make('COURSE DETAILS')
                    ->schema([
                        TextInput::make('residential_no')->required()->label('Residential No'),
                        TextInput::make('office_no')->required()->label('Office No'),
                        TextInput::make('mobile_no')->label('Phone No')->required()->numeric(),
                      ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('reg_no')->searchable()->sortable()->toggleable(),
                TextColumn::make('name')->searchable()->sortable()->toggleable(),
                TextColumn::make('course.name')->searchable()->sortable()->toggleable()->label('Course'),
                TextColumn::make('reg_date')->searchable()->sortable()->toggleable(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
