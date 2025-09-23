<?php

namespace App\Filament\Widgets;

use App\Models\Inquiries;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Inquiry extends BaseWidget
{
    protected static ?string $heading = 'Recent Inquiries';

    // ✅ पुरानी Filament में ऐसे ही काम करेगा
    protected int|string|array $columnSpan = 12;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Inquiries::query()
                    ->where('created_at', '>=', now()->subMonth())
            )
            ->columns([
                Tables\Columns\TextColumn::make('s_no')
                    ->label('S.No')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mobile')
                    ->label('Mobile'),

                Tables\Columns\TextColumn::make('is_online')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => $state ? 'Online' : 'Offline')
                    ->badge()
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date('d-M-Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Inquiry Details')
                    ->modalContent(fn($record) => view('filament.widgets.inquiry-detail', [
                        'record' => $record
                    ]))
                    ->button(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
