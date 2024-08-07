<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerCategoryResource\Pages;
use App\Filament\Resources\BannerCategoryResource\RelationManagers;
use App\Models\BannerCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BannerCategoryResource extends Resource
{
    protected static ?string $model = BannerCategory::class;
    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

            Forms\Components\TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(255)
                ->unique(BannerCategory::class, 'slug', ignoreRecord: true),

            Forms\Components\MarkdownEditor::make('description')
                ->columnSpan('full'),

            Forms\Components\Toggle::make('is_active')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
                ->searchable(),
            Tables\Columns\TextColumn::make('is_active')->label('Status')
                ->badge()
                ->alignCenter()
                ->formatStateUsing(fn (string $state, $record) => match ($state) {
                    '' => 'Not Active',
                    '1' => 'Active',
                })
                ->color(fn (string $state): string => match ($state) {
                    '' => 'danger',
                    '1' => 'success',
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBannerCategories::route('/'),
            'create' => Pages\CreateBannerCategory::route('/create'),
            'edit' => Pages\EditBannerCategory::route('/{record}/edit'),
        ];
    }
}
