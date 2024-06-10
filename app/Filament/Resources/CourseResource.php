<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Toggle;
use App\Models\Student;
use App\Models\Branch;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Navigation\NavigationItem;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = -140;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->columnSpanFull()
                ->required(),
                Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->dehydrated()
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('course_duration')
                ->label('Course Duration'),
                Forms\Components\Select::make('branch_id')
                ->label('Branch')
                ->options(Branch::all()->pluck('name', 'id'))
                ->searchable(),
            
                Forms\Components\TextInput::make('sub_title')
                ->label('Sub Title'),
                
                Forms\Components\Toggle::make('popular_course')
                ->label('Is Popular Course')
                ->required(),
                Forms\Components\FileUpload::make('image')
                ->label('Image'),
                Forms\Components\MarkdownEditor::make('description')
                ->label('Description'),
            ]),
                
            Section::make('SCO')
            ->schema([
                Forms\Components\TextInput::make('site_title')
                ->label('Site Title')
                ->columnSpanFull(),
                Forms\Components\Textarea::make('meta_keyword')
                ->label('Meta Keywords')
                ->autosize(),
                Forms\Components\Textarea::make('meta_description')
                ->label('Meta Description')
                ->autosize(),
               
            ])->columns(1),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make(name:'name')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make('branch.name')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\ToggleColumn::make('popular_course')
            ->onIcon('heroicon-m-bolt')
            ->offIcon('heroicon-m-user'),
            
            
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }

}
