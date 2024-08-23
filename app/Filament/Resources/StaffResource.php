<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = -40;
    public static function form(Form $form): Form
    {
        return $form
           ->schema([
             Section::make('PERSONAL DETAILS')
                 ->schema([
                Fieldset::make('User')
                    ->relationship('user')
                    ->schema([
                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('username')->unique(ignoreRecord: true),
                TextInput::make('email')->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)),
                 ]), 
                ]),
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
            TextColumn::make('user.full_name')
                ->label('Name')
                ->searchable()
                ->sortable()
                ->toggleable(),
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
