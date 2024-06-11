<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsResource\Pages;
use App\Filament\Resources\EventsResource\RelationManagers;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsResource extends Resource
{
    protected static ?string $model = Events::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift-top';
    protected static ?string $navigationGroup = 'Institute';

    protected static ?int $navigationSort = -160;
    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Forms\Components\TextInput::make('name')->label('Name')->required()->maxLength(255),
        Forms\Components\TextInput::make('slug')->dehydrated()->required()->maxLength(255),
        Forms\Components\TextInput::make('organizer')->dehydrated()->required()->maxLength(255),
        Forms\Components\DateTimePicker::make('start_date')->required(),
        Forms\Components\DateTimePicker::make('end_date')->required(),
        Forms\Components\TextInput::make('paid')->required()->numeric(),
        Forms\Components\FileUpload::make('photo')->nullable(),
        Forms\Components\Textarea::make('address')->required()->maxLength(255),
        Forms\Components\Textarea::make('location')->nullable()->maxLength(255),
        Forms\Components\Textarea::make('description')->nullable()->maxLength(255),
        Forms\Components\TextInput::make('site_title')->nullable()->maxLength(255),
        Forms\Components\TextInput::make('meta_keyword')->nullable(),
        Forms\Components\TextInput::make('meta_description')->nullable()->maxLength(255),
    ]);

    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start_date')->label('Start Date')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('end_date')->label('End Date')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('paid')->label('Paid')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('address')->label('Address')->searchable()->sortable(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
        ];
    }
}
