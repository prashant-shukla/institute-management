<?php

namespace App\Filament\Resources;


use App\Models\Branch;
use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form; // Corrected namespace for Form class
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ToggleButtons;
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
use Illuminate\Support\Facades\Hash;


class StudentResource extends Resource
{
    public static ?string $model = Student::class;

    // Other class methods...

    protected static ?string $navigationIcon = 'heroicon-o-user';

    //public static $model = Student::class; // Removed duplicate declaration

    protected static ?string $navigationGroup = 'Users';

    protected static ?int $navigationSort = -200;


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

                    Fieldset::make('User')
                        ->relationship('user')
                        ->schema([
                            TextInput::make('firstname'),
                            TextInput::make('lastname'),
                            TextInput::make('username')->unique(ignoreRecord: true),
                            TextInput::make('email')->unique(ignoreRecord: true),
                            TextInput::make('password')
                                ->password()
                                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                ->dehydrated(fn ($state) => filled($state)),
                        ]), 

                        

                        TextInput::make('father_name')->required()->maxLength(255),
                        DatePicker::make('date_of_birth')->required(),
                        Textarea::make('correspondence_add')->required()->label('Correspondence Address')->autosize(),
                        Textarea::make('permanent_add')->required()->label('Permanent Address')->autosize(),
                        TextInput::make('qualification')->required(),
                        TextInput::make('college_workplace')->required()->label('College/Workplace'),
                        FileUpload::make('photo')->required()->columnSpanFull(),
                           
                        TextInput::make('residential_no')->required()->label('Residential No'),
                        TextInput::make('office_no')->required()->label('Office No'),
                        TextInput::make('mobile_no')->label('Phone No')->required()->numeric(),
                    ]),
                Section::make('COURSE DETAILS')
                    ->schema([
                        
                        Select::make('name')->relationship('course', 'name'), 
                        TextInput::make('course_fee')
                            ->label('Course Fee')
                            ->required()
                            ->numeric(),
                      ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('reg_no')->searchable()->sortable()->toggleable(),
                TextColumn::make('user.name')->searchable()->sortable()->toggleable(),
                TextColumn::make('course.name')->searchable()->sortable()->toggleable()->label('Course'),
                TextColumn::make('reg_date')->searchable()->sortable()->toggleable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),
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
