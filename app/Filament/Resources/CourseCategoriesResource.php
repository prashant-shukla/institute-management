<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCategoriesResource\Pages;
use App\Filament\Resources\CourseCategoriesResource\RelationManagers;
use App\Models\CourseCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CourseCategoriesResource extends Resource
{
    protected static ?string $model = CourseCategory::class;
    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = 401;
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('')
    ->schema([
        Forms\Components\Grid::make(2) // 2 columns per row
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                   
                    ->dehydrated(),
            ]),

        Forms\Components\Grid::make(2)
            ->schema([
                Forms\Components\TextInput::make('sub_title'),
                Forms\Components\TextInput::make('order'),
            ]),

        Forms\Components\FileUpload::make('image'),

        Forms\Components\MarkdownEditor::make('description')
            ->columnSpanFull(), // यह full width लेगा

        Forms\Components\Radio::make('show_on_website')
            ->options([
                1 => 'show',
                0 => 'hide',
            ])
            ->inline(),
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
                Tables\Columns\TextColumn::make(name: 'name')
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
