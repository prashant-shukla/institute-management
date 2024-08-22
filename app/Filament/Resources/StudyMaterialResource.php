<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyMaterialResource\Pages;
use App\Filament\Resources\StudyMaterialResource\RelationManagers;
use App\Models\StudyMaterial;
use App\Models\Course;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Get;

class StudyMaterialResource extends Resource
{
    protected static ?string $model = StudyMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Institute';
    protected static ?string $navigationLabel = 'Study Materials';
    protected static ?int $navigationSort = -110;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(100),
                
                TextInput::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(255),
                
                
                  Section::make('FILE DETAILS')
                ->schema([
                    ToggleButtons::make('file_type')
                        ->label('File Type')
                        ->inline()
                        ->options([
                            'doc' => 'Document',
                            'audio' => 'Audio',
                            'video' => 'Video',
                        ])
                        ->required()
                        ->reactive(),

                    FileUpload::make('file_path')
                        ->label('Upload File')
                        ->required()
                        ->acceptedFileTypes(['application/pdf'])
                        ->hidden(fn (Get $get): bool => $get('file_type') != 'doc'),


                    FileUpload::make('file_path')
                        ->label('Upload File')
                        ->required()
                        ->acceptedFileTypes(['audio/mpeg', 'audio/wav', 'audio/aac', 'audio/ogg'])
                        ->hidden(fn (Get $get): bool => $get('file_type') != 'audio'),
                         
                    FileUpload::make('file_path')
                         ->label('Upload Video')
                         ->required()
                         ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mpeg', 'video/quicktime', 'video/x-ms-wmv', 'video/x-matroska', 'video/webm', 'video/ogg'])
                         ->hidden(fn (Get $get): bool => $get('file_type') != 'video'),
                     ]),
                Select::make('uploaded_by')
                        ->label('Uploaded By')
                        ->options(Staff::with('user')->get()->mapWithKeys(function ($staff) {
                        // Check if the user relationship exists before accessing properties
                        if ($staff->user) {
                        $staff_name = $staff->user->firstname . ' ' . $staff->user->lastname;
                            return [$staff->id => $staff_name];
                        }
                        return [];
                        })->toArray())
                        ->searchable()
                        ->required(),
                //    Forms\Components\DatePicker::make('upload_date')
                //     ->label('Upload Date')
                //     ->disabled(),
                
                    Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->options(Course::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                
                TextColumn::make('file_type')
                    ->label('File Type')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                
                
                TextColumn::make('upload_date')
                    ->label('Upload Date')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                
                    Tables\Columns\TextColumn::make('course.name')
                    ->sortable()
                    ->toggleable(),
               
            ])
            ->filters([
                // Define your table filters here if needed
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
            // Define your resource relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyMaterials::route('/'),
            'create' => Pages\CreateStudyMaterial::route('/create'),
            'edit' => Pages\EditStudyMaterial::route('/{record}/edit'),
        ];
    }
}
