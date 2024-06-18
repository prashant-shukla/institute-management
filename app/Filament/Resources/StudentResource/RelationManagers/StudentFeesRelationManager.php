<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeesRelationManager extends RelationManager
{
    protected static string $relationship = 'fees';
    
    protected static ?string $recordTitleAttribute = 'Fees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fee_amount')
                    ->numeric()
                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                    ->required(),
                
                Forms\Components\DatePicker::make('received_on'),
                
                Forms\Components\TextInput::make('remark')
                    ->columnSpan('full')
                    ->required(),
                
                Forms\Components\ToggleButtons::make('payment_mode')
                    ->inline()
                    ->options([
                        'credit_card' => 'Credit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'paypal' => 'PayPal',
                    ])
                    ->required(),
                    Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('remark')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount')
                    ->sortable()
                    ->money(fn ($record) => $record->currency),
                
                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')->since(),

                Tables\Columns\TextColumn::make('payment_mode')
                    ->label('Method')
                    ->formatStateUsing(fn ($state) => Str::headline($state))
                    ->sortable(),
            ])
            ->filters([
                // Add filters here if needed
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
