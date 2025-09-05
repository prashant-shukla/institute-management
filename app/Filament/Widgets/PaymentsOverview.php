<?php

namespace App\Filament\Widgets;

use App\Models\StudentFees;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class PaymentsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $now = now();
    
        // Monthly total
        $monthlyTotal = \App\Models\StudentFees::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('fee_amount');
    
        // Weekly total (current week: Monday - Sunday)
        $weeklyTotal = \App\Models\StudentFees::whereBetween('created_at', [
                $now->copy()->startOfWeek(),   // default Monday
                $now->copy()->endOfWeek(),     // default Sunday
            ])
            ->sum('fee_amount');
    
        return [
            Stat::make('Monthly Fees Collected', '₹' . number_format($monthlyTotal))
                ->description('Total in ' . $now->format('F'))
                ->color('success'),
    
            Stat::make('Weekly Fees Collected', '₹' . number_format($weeklyTotal))
                ->description('This Week (' . $now->copy()->startOfWeek()->format('d M') . ' - ' . $now->copy()->endOfWeek()->format('d M') . ')')
                ->color('info'),
        ];
    }
    
    
}
