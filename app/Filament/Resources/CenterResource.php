<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CenterResource\Pages;
use App\Filament\Resources\CenterResource\RelationManagers;
use App\Models\Center;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CenterResource extends Resource
{
    protected static ?string $model = Center::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Institute';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
               Section::make('REGISTRATION DETAILS')
               ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->columnSpanFull(),
                Forms\Components\FileUpload::make('logo')
                ->label('Logo')
                ->columnSpanFull(),
                Forms\Components\Radio::make('receipt_header')
                ->options([
                    'Name' => 'Name',
                    'Logo' => 'Logo',
                ])
                ->label('Receipt Header')
                ->inline(),
                Forms\Components\TextInput::make('center_code')
                ->label('Center Code'),
                Forms\Components\TextInput::make('reg_no_start_from')
                ->numeric()
                ->label('Reg No Start From'),
                Forms\Components\TextInput::make('receipt_no_start_from')
                ->numeric()
                ->label('Receipt No Start From'),
                Forms\Components\TextInput::make('email')
                ->email()
                ->label('Email'),
                Forms\Components\TextInput::make('mobile_no')
                ->numeric()
                ->label('Mobile'),
                Forms\Components\TextInput::make('phone_no')
                ->numeric()
                ->label('Phone'),
                Forms\Components\TextInput::make('gstin')
                ->label(' GSTIN'),
                Forms\Components\Textarea::make('address')
                ->autosize()
                ->label('Address')
                ->columnSpanFull(),
                Forms\Components\TextInput::make('state')
                ->label('State')
                ->columnSpanFull(),
                Forms\Components\TextInput::make('city')
                ->label('City')
                ->columnSpanFull(),
                // Forms\Components\Select::make('State')
                // ->label('Author')
                // ->options(State::all()->pluck('name', 'id'))
                // ->searchable(),
                // Forms\Components\Select::make('City')
                // ->label('Author')
                // ->options(City::all()->pluck('name', 'id'))
                // ->searchable(),
                Forms\Components\Checkbox::make('nonatc')
                ->label('INon ATC'),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            
                    Tables\Columns\TextColumn::make(name:'name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    Tables\Columns\TextColumn::make(name:'mobile_no')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    Tables\Columns\TextColumn::make(name:'city')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    
                    Tables\Columns\IconColumn::make('nonatc')
                    ->boolean()
                    ->sortable()
                    ->toggleable()
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
            'index' => Pages\ListCenters::route('/'),
            'create' => Pages\CreateCenter::route('/create'),
            'edit' => Pages\EditCenter::route('/{record}/edit'),
        ];
    }
}
