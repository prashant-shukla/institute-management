<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyMaterialResource\Pages;
use App\Filament\Resources\StudyMaterialResource\RelationManagers;
use App\Models\Studymaterials;
use App\Models\Course;
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

class StudyMaterialResource extends Resource
{
    protected static ?string $model = StudyMaterials::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Institute';

    protected static ?int $navigationSort = -180;

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
                
                Select::make('file_type')
                    ->label('File Type')
                    ->options([
                        'doc' => 'Document',
                        'audio' => 'Audio',
                        'video' => 'Video',
                    ])
                    ->required(),
                
                TextInput::make('file_path')
                    ->label('File Path')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('uploaded_by')
                    ->label('Uploaded By')
                    ->required()
                    ->numeric(),
                
                DatePicker::make('upload_date')
                    ->label('Upload Date')
                    ->required(),
                
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
