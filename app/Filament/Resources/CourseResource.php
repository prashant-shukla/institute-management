<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;

use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Toggle;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseTool;
use App\Models\CourseMentor;
use App\Models\CourseSyllabuses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Navigation\NavigationItem;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = 402;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required(),
                Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->dehydrated()
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('course_duration')
                ->label('Course Duration'),
                Forms\Components\Select::make('course_categories_id')
                ->options(CourseCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->label('Course Category'),
            
                Forms\Components\TextInput::make('sub_title')
                ->label('Sub Title'),
                Forms\Components\TextInput::make('status')
                ->label('Status')
                ->default('active'),
               
                Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->columnSpan('full'),
                Forms\Components\MarkdownEditor::make('description')
                ->label('Description')
                ->columnSpan('full'),
                TextInput::make('site_title')
                ->label('Site Title')
                ->nullable(),
                Textarea::make('meta_keyword')
                ->label('Meta Keywords')
                ->nullable(),
                Textarea::make('meta_description')
                ->label('Meta Description')
                ->nullable(),
                Select::make('mode')
                ->label('Mode')
                ->options([
                    'online' => 'Online',
                    'offline' => 'Offline',
                    'both' => 'Both',
                ])
                ->nullable(),
                TextInput::make('sessions')
                ->label('Sessions')
                ->default(0)
                ->numeric(),
                TextInput::make('projects')
                ->label('Projects')
                ->numeric(),
                TextInput::make('fee')
                ->label('Fee')
                ->numeric(),
                TextInput::make('offer_fee')
                ->label('Offer Fee')
                ->numeric(),

                Repeater::make('faqs')
                    ->schema([
                        TextInput::make('question')
                            ->required()
                            ->live(onBlur: true),
                        TextInput::make('answer')
                            ->required()
                            ->live(onBlur: true),
                    ])
                    ->columnSpan('full')
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),

                    Forms\Components\Toggle::make('popular_course')
                    ->label('Is Popular Course')
                    ->required(),
            ])->columns(2),
                
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
            Tables\Columns\TextColumn::make('courseCategory.name')
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
            CourseResource\RelationManagers\CourseMentorRelationManager::class,
            CourseResource\RelationManagers\CourseSyllabusesRelationManager::class,
            CourseResource\RelationManagers\CourseToolRelationManager::class,
            
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
