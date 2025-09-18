<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\BannerCategory;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 701;
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Select::make('banner_page')
                ->options([
                    'home' => 'Home',
                    'categories' => 'Categories',
                    'course' => 'Course',
                    'event'=>'Event',
                    'about us' => 'About us',
                    'contact us' => 'Contact us',
                ])->required(),
            Forms\Components\TextInput::make('sort')
                ->required()
                ->numeric()
                ->default(0),
            Forms\Components\TextInput::make('title')
                ->maxLength(255),
            Forms\Components\TextInput::make('description')
                ->maxLength(500),
                Forms\Components\FileUpload::make('image_url')
                ->directory('banner_images')
                ->multiple()
                ->reorderable()
                ->required(),
            Forms\Components\Toggle::make('is_visible')
                ->required(),
            Forms\Components\DateTimePicker::make('start_date'),
            Forms\Components\DateTimePicker::make('end_date'),
            Forms\Components\TextInput::make('click_url')
                ->maxLength(255),
            Forms\Components\Select::make('click_url_target')
                ->options([
                    '_blank' => 'New Tab',
                    '_self' => 'Current Tab',
                    // '_parent',
                    // '_top'
                ])
                ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->lineClamp(2)
                    ->description(fn (Model $record): string => \Illuminate\Support\Str::limit($record->description, 50) ?? '')->wrap()
                    ->searchable(),
              
                Tables\Columns\IconColumn::make('is_visible')->label('Active')
                    ->boolean()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('click_url')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
