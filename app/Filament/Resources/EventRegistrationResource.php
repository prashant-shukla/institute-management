<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegistrationResource\Pages;
use App\Models\EventRegistration;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EventRegistrationResource extends Resource
{
    protected static ?string $model = EventRegistration::class;
    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?int $navigationSort = 706;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('mobile')->required(),
                Textarea::make('comments')->nullable(),
                Radio::make('attending')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('mobile')->sortable(),
                TextColumn::make('attending')->sortable(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers if needed.
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventRegistrations::route('/'),
            'create' => Pages\CreateEventRegistration::route('/create'),
            'edit' => Pages\EditEventRegistration::route('/{record}/edit'),
        ];
    }
}
