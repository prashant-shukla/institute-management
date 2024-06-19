<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers\FeesRelationManager; // Correct reference
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class StudentResource extends Resource
{
    public static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Users';

    protected static ?int $navigationSort = -200;


    public static function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('User')
                   // Fieldset::make('User')
                    ->relationship('user')
                            ->schema([
                                TextInput::make('firstname')->required(),
                                TextInput::make('lastname')->required(),
                                TextInput::make('username')->required()->unique(ignoreRecord: true),
                                TextInput::make('email')->required()->unique(ignoreRecord: true),
                                TextInput::make('password')
                                ->password()
                                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                ->dehydrated(fn ($state) => filled($state)), 
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('PERSONAL DETAILS')
                            ->schema([
                                FileUpload::make('photo')
                                ->image()
                                ->imageEditor(),
                                TextInput::make('father_name')->required()->maxLength(255),
                                DatePicker::make('date_of_birth')
                                    ->label('Date of Birth')
                                    ->required(),
                                TextInput::make('mobile_no')->label('Phone No')->required()->numeric(),
                                Textarea::make('correspondence_add')->required()->label('Correspondence Address')
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set, $get) {
                                    if ($get('same_Address')) {
                                        $set('permanent_add', $state);
                                    }
                                })
                                ->autosize(),
                                Checkbox::make('same_Address')
                                ->label('Same Address')
                                    ->inline(false)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        if ($state) {
                                            $set('permanent_add', $get('correspondence_add'));
                                        }
                                    }),
                                Textarea::make('permanent_add')
                                ->required()
                                ->label('Permanent Address')
                                ->autosize(),
                                TextInput::make('qualification')->required(),
                                TextInput::make('college_workplace')->label('College/Workplace'),
                                TextInput::make('residential_no')->label('Residential No'),
                                TextInput::make('office_no')->label('Office No'),
                                
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('REGISTRATION DETAILS')
                            ->schema([
                                DatePicker::make('reg_date')->label('Reg Date'),
                                TextInput::make('reg_no')->label('Reg No')->maxLength(255),            
                            ]),

                        Forms\Components\Section::make('COURSE DETAILS')
                            ->schema([
                                Select::make('course_id')->required()->relationship('course', 'name'),
                                TextInput::make('course_fee')
                                   ->label('Course Fee')
                                   ->required()
                                   ->numeric(),
       
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
        
    }

   // public static function form_old(Form $form): Form
    //{
        //return $form
          //  ->schema([
               

                //     Section::make('User')
                //    // Fieldset::make('User')
                //     ->relationship('user')
                //     ->schema([
                //         TextInput::make('firstname')->required(),
                //         TextInput::make('lastname')->required(),
                //         TextInput::make('username')->required()->unique(ignoreRecord: true),
                //         TextInput::make('email')->required()->unique(ignoreRecord: true),
                //         TextInput::make('password')
                //             ->required()
                //             ->password()
                //             ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                //             ->dehydrated(fn ($state) => filled($state)),                        
                //     ])->columns(1)->columnSpan(['lg' => 2]),
                //     Section::make('REGISTRATION DETAILS')
                //     ->schema([
                // ])->columns(1)->columnSpan(['lg' => 1]),
                // Section::make('PERSONAL DETAILS')
                //     ->schema([
                            
                //         TextInput::make('father_name')->required()->maxLength(255),
                //         DatePicker::make('date_of_birth')
                //             ->label('Date of Birth')
                //             ->required(),
                //         TextInput::make('mobile_no')->label('Phone No')->required()->numeric(),
                //         Textarea::make('correspondence_add')->required()->label('Correspondence Address')
                //         ->reactive()
                //         ->afterStateUpdated(function ($state, callable $set, $get) {
                //             if ($get('is_admin')) {
                //                 $set('permanent_add', $state);
                //             }
                //         })
                //         ->autosize(),
                //         Checkbox::make('is_admin')
                //             ->inline(false)
                //             ->reactive()
                //             ->afterStateUpdated(function ($state, callable $set, $get) {
                //                 if ($state) {
                //                     $set('permanent_add', $get('correspondence_add'));
                //                 }
                //             }),
                //         Textarea::make('permanent_add')
                //         ->required()
                //         ->label('Permanent Address')
                //         ->autosize(),
                //         TextInput::make('qualification')->required(),
                //         TextInput::make('college_workplace')->label('College/Workplace'),
                //         TextInput::make('residential_no')->label('Residential No'),
                //         TextInput::make('office_no')->label('Office No'),
                        
                //         ])->columns(2)->columnSpan(['lg' => 2]),

                // Section::make('Photo')
                //         ->schema([
                //         FileUpload::make('photo')
                //         ->image()
                //         ->imageEditor()
                //         ])->columns(1)->columnSpan(['lg' => 1]),

                // Section::make('COURSE DETAILS')
                //          ->schema([
                //          ])->columns(2)->columnSpan(['lg' => 2]),

                //         ]) ->columns(3);;
   // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reg_no')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('user.name')->label('Name')->searchable()->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('course.name')->searchable()->sortable()->toggleable()->label('Course'),
                Tables\Columns\TextColumn::make('reg_date')->searchable()->sortable()->toggleable(),
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

    public static function getRelations(): array
    {
        return [
            FeesRelationManager::class,
        ];
    }
}
