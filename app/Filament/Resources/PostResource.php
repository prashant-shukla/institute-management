<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Blog\Post;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Blog\Category;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';
    protected static ?string $navigationLabel = 'Blog';
    protected static ?int $navigationSort = 704;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ====== BLOG IMAGE ======
                Forms\Components\Section::make('Blog Media')
                    ->schema([
                        // Step 1: Select media type first
                        Forms\Components\Select::make('media_type')
                            ->label('Select Media Type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->reactive()
                            ->required(),

                        // Step 2: Image Upload (visible only if image selected)
                        Forms\Components\FileUpload::make('image')
                            ->label('Upload Blog Image')
                            ->image()
                            ->directory('blog')
                            ->visibility('public')
                            ->columnSpan('full')
                            ->reactive()
                            ->hidden(fn(callable $get) => $get('media_type') !== 'image'),

                        // Step 3: Video URL Input (visible only if video selected)
                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL (YouTube / Vimeo)')
                            ->placeholder('https://youtu.be/example')
                            ->url()
                            ->columnSpan('full')
                            ->reactive()
                            ->hidden(fn(callable $get) => $get('media_type') !== 'video'),
                    ])
                    ->columns(1)
                    ->collapsible(),



                // ====== BLOG DETAILS ======
                Forms\Components\Section::make('Blog Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(
                                fn(string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(static::getModel(), 'slug', ignoreRecord: true),

                        Forms\Components\Select::make('blog_category_id')
                            ->label('Category')
                            ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\Textarea::make('short_description')
                            ->label('Short Description')
                            ->rows(3)
                            ->maxLength(500),

                        Forms\Components\RichEditor::make('content')
                            ->label('Blog Content')
                            ->columnSpan('full')
                            ->required(),

                        Forms\Components\TagsInput::make('tags')
                            ->label('Tags')
                            ->placeholder('Type and press enter'),

                        Forms\Components\TextInput::make('link')
                            ->label('External or Reference Link')
                            ->maxLength(256),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Post')
                            ->default(false),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Published Date'),
                    ])
                    ->columns(2),

                // ====== SEO SECTION ======
                Forms\Components\Section::make('SEO Settings')
                    ->schema([
                        Forms\Components\TextInput::make('site_title')
                            ->label('Meta Title')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->rows(2),

                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // SpatieMediaLibraryImageColumn::make('media')->label('Image')
                //     ->collection('blog/posts')
                //     ->wrap(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Tables\Columns\TextColumn::make('author.name')
                //     ->searchable(['firstname', 'lastname'])
                //     ->sortable()
                //     ->toggleable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn(Post $record): string => $record->published_at?->isPast() ? 'Published' : 'Draft')
                    ->colors([
                        'success' => 'Published',
                    ]),

                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
