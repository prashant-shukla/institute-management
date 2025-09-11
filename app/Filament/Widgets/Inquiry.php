<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Inquiries;
use Filament\Widgets\TableWidget as BaseWidget;

class Inquiry extends BaseWidget
{
    // pura width le

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Inquiries::query()
                    ->where('created_at', '>=', now()->subMonth()) // ✅ last 1 month
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                // Tables\Columns\TextColumn::make('message')
                //     ->label('Message')
                //     ->limit(50),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('Date')
                //     ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
