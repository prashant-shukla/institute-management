<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 708;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),
    
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->maxLength(255),
    
            TextInput::make('phone')
                ->label('Phone')
                ->tel()
                ->required()
                ->maxLength(15),
    
            Textarea::make('message')
                ->label('Message')
                ->required()
                ->maxLength(1000),
        ]);
    }

    public static function table(Table $table): Table
    {
       
return $table
->columns([
    TextColumn::make('name')
        ->label('Name')
        ->sortable()
        ->searchable(),
    
    TextColumn::make('email')
        ->label('Email')
        ->sortable()
        ->searchable(),
    
    TextColumn::make('phone')
        ->label('Phone')
        ->sortable()
        ->searchable(),

    TextColumn::make('message')
        ->label('Message')
        ->limit(50) // Limits the displayed text to 50 characters
        ->wrap()
        ->searchable(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
