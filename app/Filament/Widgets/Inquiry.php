<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Collection;
use Filament\Widgets\Widget;

class Inquiry extends Widget
{
    protected static ?string $heading = 'Inquiry';
    protected int|string|array $columnSpan = 6;    
    protected static string $view = 'filament.widgets.inquiry';

    public function table(Table $table): Table
    {
        // static dummy / random-ish data for testing
        $names = [
            'Ryan MacLeod',
            'Jacob Sutherland',
            'James Oliver',
            'Lisa Nash',
            'Alan Walsh',
            'Pippa Mills',
        ];

        $colors = ['purple', 'blue', 'yellow', 'red', 'pink'];

        $records = collect([]);
        foreach ($names as $name) {
            $records->push([
                'total_calls'       => rand(2000, 8000),
                'name'              => $name,
                'call_duration'     => rand(3, 30) . 'min',
                'resolution_rate'   => rand(20, 90),    // percentage
                'satisfaction_rate' => rand(2, 5),      // 1..5 stars
                'color'             => $colors[array_rand($colors)],
            ]);
        }

        return $table
            ->records($records) // <<< use records() for array/collection data
            ->columns([
                Tables\Columns\TextColumn::make('total_calls')
                    ->label('TOTAL CALLS')
                    ->alignCenter()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('name')
                    ->label('TREND')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('call_duration')
                    ->label('CALL DURATION')
                    ->alignCenter(),

                // show a blade view for the progress bar (we pass record to the view)
                Tables\Columns\ViewColumn::make('resolution_rate')
                    ->label('RESOLUTION RATE')
                    ->view('filament.components.progress-bar'),

                // show a blade view for stars
                Tables\Columns\ViewColumn::make('satisfaction_rate')
                    ->label('SATISFACTION RATE')
                    ->view('filament.components.star-rating'),
            ]);
    }
}




// namespace App\Filament\Widgets;

// use Filament\Tables;
// use Filament\Tables\Table;
// use App\Models\Inquiries;
// use Filament\Widgets\TableWidget as BaseWidget;

// class Inquiry extends BaseWidget
// {
//     // pura width le

//     public function table(Table $table): Table
//     {
//         return $table
//             ->query(
//                 Inquiries::query()
//                     ->where('created_at', '>=', now()->subMonth()) // ✅ last 1 month
//             )
//             ->columns([
//                 Tables\Columns\TextColumn::make('name')
//                     ->label('Name')
//                     ->searchable()
//                     ->sortable(),

//                 Tables\Columns\TextColumn::make('email')
//                     ->label('Email')
//                     ->searchable(),

//                 // Tables\Columns\TextColumn::make('message')
//                 //     ->label('Message')
//                 //     ->limit(50),

//                 // Tables\Columns\TextColumn::make('created_at')
//                 //     ->label('Date')
//                 //     ->sortable(),
//             ])
//             ->defaultSort('created_at', 'desc');
//     }
// }
