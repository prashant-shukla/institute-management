<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Blogs';
    protected static ?string $pluralLabel = 'Blogs';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->directory('blogs')
                    ->image(),
                Forms\Components\TextInput::make('slug')->maxLength(556),
                Forms\Components\TextInput::make('tags')->placeholder('comma,separated,tags'),
                Forms\Components\Textarea::make('short_description')->rows(3),
                Forms\Components\RichEditor::make('description')->columnSpan('full'),
                Forms\Components\TextInput::make('link')->maxLength(256),
                Forms\Components\TextInput::make('site_title')->maxLength(255),
                Forms\Components\Textarea::make('meta_keywords')->rows(2),
                Forms\Components\Textarea::make('meta_description')->rows(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('tags'),
                Tables\Columns\TextColumn::make('created')->dateTime('d M Y'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
