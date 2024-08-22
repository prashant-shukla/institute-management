<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiriesResource\Pages;
use App\Filament\Resources\InquiriesResource\RelationManagers;
use App\Models\Inquiries;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InquiriesResource extends Resource
{
    protected static ?string $model = Inquiries::class;

    protected static ?string $navigationGroup = 'Users';

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?int $navigationSort = -30;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                  ->label('Name')
                  ->required()
                  ->maxLength(255),
                Forms\Components\TextInput::make('email')
                  ->required()
                  ->email(),
                Forms\Components\Textarea::make('message')
                  ->required()
                  ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->label('Name')
                  ->searchable()
                  ->sortable(),
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
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiries::route('/create'),
            'edit' => Pages\EditInquiries::route('/{record}/edit'),
        ];
    }
}
