<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon  = 'heroicon-o-play-circle';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Tutorial Videos';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('youtube_url')
                ->label('YouTube URL')
                ->required()
                ->url()
                ->placeholder('https://www.youtube.com/watch?v=XXXXXXXX'),

            Forms\Components\TextInput::make('duration')
                ->label('Duration (e.g. 15:32)')
                ->maxLength(20),

            Forms\Components\Toggle::make('is_free')
                ->label('Free Video?')
                ->default(true),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_free')
                    ->boolean()
                    ->label('Free'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->label('Created'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit'   => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
