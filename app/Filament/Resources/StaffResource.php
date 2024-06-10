<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationLabel = 'Mis Clientes';

    protected static ?string $navigationGroup = 'Users';

    protected static ?int $navigationSort = -190;
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user_id')
                    ->label('User ID')
                    ->numeric()
                    ->required(),

                Select::make('department')
                    ->label('Department')
                    ->options([
                        'HR' => 'HR',
                        'Finance' => 'Finance',
                        'IT' => 'IT',
                        'Marketing' => 'Marketing',
                    ])
                    ->required(),

                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),

                DatePicker::make('date_joined')
                    ->label('Date Joined')
                    ->required(),

                TextInput::make('salary')
                    ->label('Salary')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('User ID')
                    ->sortable(),
                TextColumn::make('department')
                    ->label('Department')
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Phone'),
                TextColumn::make('date_joined')
                    ->label('Date Joined')
                    ->date()
                    ->sortable(),
                TextColumn::make('salary')
                    ->label('Salary')
                    ->sortable(),
            ])
            ->filters([
                // Define your table filters here if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define your resource relations here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
