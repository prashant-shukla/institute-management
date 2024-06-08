<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput\Masks\Pattern;



class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\TextInput::make('user_id')
                ->label('User ID')
                ->numeric()
                ->required(),
                
                Forms\Components\Select::make('department')
                ->label('Department')
                ->options([
                    'HR' => 'HR',
                    'Finance' => 'Finance',
                    'IT' => 'IT',
                    'Marketing' => 'Marketing',
                ])
                ->required(),
                
                Forms\Components\TextInput::make('phone')
                ->label('Phone')
                ->required(),
                
                Forms\Components\DatePicker::make('date_joined')
                ->label('Date Joined')
                ->required(),
                
                Forms\Components\TextInput::make('salary')
                ->label('Salary')
                ->numeric()
                ->required(),
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                ->label('User ID')
                ->sortable(),
                Tables\Columns\TextColumn::make('department')
                ->label('Department')
                ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                ->label('Phone'),
                Tables\Columns\TextColumn::make('date_joined')
                ->label('Date Joined')
                ->date()
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}