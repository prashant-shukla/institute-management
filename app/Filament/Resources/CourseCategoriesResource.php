<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCategoriesResource\Pages;
use App\Filament\Resources\CourseCategoriesResource\RelationManagers;
use App\Models\CourseCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseCategoriesResource extends Resource
{
    protected static ?string $model = CourseCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = -130;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                ->dehydrated()
                ->required()
                ->label('Slug')
                ->maxLength(255),
                Forms\Components\TagsInput::make('software')
                ->label('Software'),
                Forms\Components\MarkdownEditor::make('description')
                ->label('Description'),
                Forms\Components\TextInput::make('sub_title')
                ->label('Sub Title'),
                Forms\Components\FileUpload::make('image')
                ->label('Image'),
                Forms\Components\TextInput::make('order')
                ->label('Order'),
                Forms\Components\Radio::make('show_on_website')
                ->label('Show on Website')
                ->options([
                    1 => 'show',
                    0 => 'hide',
                ])->inline(),
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
            ]),
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
            'index' => Pages\ListCourseCategories::route('/'),
            'create' => Pages\CreateCourseCategories::route('/create'),
            'edit' => Pages\EditCourseCategories::route('/{record}/edit'),
        ];
    }
}
