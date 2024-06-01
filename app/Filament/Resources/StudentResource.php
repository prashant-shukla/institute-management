<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Center;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Collection;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Institute';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
       Section::make('REGISTRATION DETAILS')
       ->schema([
        Forms\Components\DatePicker::make('reg_date')
        ->required()
        ->label('Reg Date')
        ->columns(2),
        Forms\Components\TextInput::make('reg_no')
        ->required()
        ->label('Reg No')
        ->maxLength(255)
        ->columns(2),
        Forms\Components\Select::make('center_id')
             ->label('Center Code')
             ->options(Center::all()->pluck('center_code', 'id'))
             ->searchable()
            ])->columns(3),
       
        Section::make('PERSONAL DETAILS') 
        ->schema([
            Forms\Components\TextInput::make('name')
            ->label('Name')
            ->dehydrated()
            ->required()
            ->maxLength(255),
            Forms\Components\TextInput::make('father_name')
            ->label('Father Name')
                        ->dehydrated()
                        ->required()
                        ->maxLength(255),
            Forms\Components\DatePicker::make('date_of_birth')
            ->required()
            ->label('Date of Birth'),     
            Forms\Components\TextInput::make('email')
            ->required()
            ->label('Email')
            ->email(),
            Forms\Components\Textarea::make('correspondence_add')
                ->autosize()
                ->required()
                ->label('Correspondence_add'), 
            Forms\Components\Textarea::make('permanent_add')
                ->autosize()  
                ->required()
                ->label('Permanent Address'),
            Forms\Components\TextInput::make('qualification')
            ->required()
            ->label('Qualification'),  
            Forms\Components\TextInput::make('college_workplace')
            ->required()
            ->label('College/Workplace'), 
            Forms\Components\FileUpload::make('photo')
            ->required()
            ->label('Photo')
            ->columnSpanFull(),
            ])->columns(2),
     
        
            Section::make('COURSE DETAILS') 
            ->schema([
            Forms\Components\TextInput::make('residential_no')
            ->required()
            ->label('Residential No'), 
            Forms\Components\TextInput::make('office_no')
            ->required()
            ->label('Office No'),
            Forms\Components\TextInput::make('mobile_no')
            ->label('Phone No')
            ->required()
            ->numeric(),
             Forms\Components\Select::make('branch_id')
             ->label('Branch')
             ->options(Branch::all()->pluck('name', 'id'))
             ->searchable()
             ->live(), 
             Forms\Components\Select::make('course_id')
             ->label('Course')
             ->options(Course::all()->pluck('name', 'id'))
             ->searchable(),
            
             Forms\Components\CheckboxList::make('software_covered')
             ->options([
              'AutoCAD' => 'AutoCAD',
              'Photoshop' => 'Photoshop',
              'v-ray' => 'v-ray',
              '3ds Max' => '3ds Max',
              'Solid Works' => 'Solid Works',
              'Fusion 360' => 'Fusion 360',
             ])
             ->label('Software Covered'),
            Forms\Components\TextInput::make('course_fee')
            ->label('Course Fee')
            ->required()
            ->numeric()
            ->live(onBlur: true) 
            ->afterStateUpdated(function(Set $set, ?string $state, Get $get) {
                $gst = 0;
                if($get('apply_gst')) {
                    $gst = $state*.18;
                    $set('gst', $gst);
                } 
                $set('total', $state+$gst);
                
            }),

            Forms\Components\Checkbox::make('apply_gst')
                ->label('Apply GST')
                ->live(),
            Forms\Components\TextInput::make('gst')
            ->label('GST')
            ->required()
            ->numeric()
            ->hidden(fn (Get $get): bool => ! $get('apply_gst')),
            Forms\Components\TextInput::make('total')
            ->label('Total')
            ->required()
            ->numeric(),
        ]),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
          ->columns([
            Tables\Columns\TextColumn::make(name:'reg_no')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make(name:'name')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make(name:'course.name')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make(name:'reg_date')
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
            RelationManagers\StudentFeesRelationManager::class,
        ];
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
