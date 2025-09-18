<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalaryResource\Pages;
use App\Models\Salary;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SalaryResource extends Resource
{
    protected static ?string $model = Salary::class;

    protected static ?string $navigationGroup = 'User';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?int $navigationSort = 302;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'username')
                    ->searchable()
                    ->required(),


                Forms\Components\TextInput::make('salary_amount')
                    ->label('Salary Amount')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('salary_month')
                    ->label('Salary Month (e.g. September 2025)')
                    ->required(),

                Forms\Components\DatePicker::make('salary_date')
                    ->label('Salary Date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.username')->label('User')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('salary_amount')->label('Amount')->money('INR'),
                Tables\Columns\TextColumn::make('salary_month')->label('Month')->sortable(),
                Tables\Columns\TextColumn::make('salary_date')->label('Date')->date(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalaries::route('/'),
            'create' => Pages\CreateSalary::route('/create'),
            'edit' => Pages\EditSalary::route('/{record}/edit'),
        ];
    }
}
