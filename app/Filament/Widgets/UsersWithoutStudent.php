<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;

class UsersWithoutStudent extends TableWidget
{
    protected static ?string $heading = 'Users Without Student';

    protected static ?int $sort = 2;

    /**
     * ✅ Main Query
     */
    protected function getTableQuery(): Builder
    {
        return User::query()
            ->whereDoesntHave('student');
    }

    /**
     * ✅ Table Columns
     */
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('firstname')
                ->label('First Name')
                ->searchable(),

            Tables\Columns\TextColumn::make('lastname')
                ->label('Last Name')
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Joined')
                ->date(),
        ];
    }

    /**
     * ✅ Filters (THIS WAS MISSING / WRONG)
     */
    protected function getTableFilters(): array
    {
        return [

            // 🔹 Today Filter
            Filter::make('today')
                ->label('Today')
                ->query(fn (Builder $query) =>
                    $query->whereDate('created_at', today())
                ),

            // 🔹 This Month Filter
            Filter::make('this_month')
                ->label('This Month')
                ->query(fn (Builder $query) =>
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year)
                ),

            // 🔹 Custom Date Range
            Filter::make('date_range')
                ->form([
                    DatePicker::make('from')->label('From'),
                    DatePicker::make('to')->label('To'),
                ])
                ->query(function (Builder $query, array $data) {
                    return $query
                        ->when(
                            $data['from'] ?? null,
                            fn ($q) => $q->whereDate('created_at', '>=', $data['from'])
                        )
                        ->when(
                            $data['to'] ?? null,
                            fn ($q) => $q->whereDate('created_at', '<=', $data['to'])
                        );
                }),
        ];
    }
}
