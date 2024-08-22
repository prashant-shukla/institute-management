<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Blog\Post;
use App\Models\Blog\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = -130;

    public static function form(Form $form): Form
    {
      
        return $form
        ->schema([
            Forms\Components\Section::make('Image')
                ->schema([
                   FileUpload::make('media')->hiddenLabel()
                      
                        ->multiple()
                        ->reorderable()
                        ->required(),
                ])
                ->collapsible(),
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->maxLength(255)
                        ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                  
                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique(Post::class, 'slug', ignoreRecord: true),
                    
                    Forms\Components\Toggle::make('is_featured')
                        ->required(),

                    Forms\Components\RichEditor::make('content')
                        ->columnSpan('full'), 

                    Forms\Components\MarkdownEditor::make('content')
                        ->required()
                        ->columnSpan('full'),

                    // Forms\Components\Select::make('blog_author_id')
                    // ->options(User::all()->pluck('name', 'id'))
                    //     ->searchable(['name'])
                    //     ->required(),

                    // Forms\Components\Select::make('blog_category_id')
                    //     ->relationship('category', 'name')
                    //     ->searchable()
                    //     ->required(),

                    Forms\Components\DatePicker::make('published_at')
                        ->label('Published Date'),

                        Forms\Components\TagsInput::make('tags')
                ])
                ->columns(2),
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
