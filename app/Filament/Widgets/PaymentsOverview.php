<?php

namespace App\Filament\Widgets;

use App\Models\StudentFees;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class PaymentsOverview extends BaseWidget
{ 
    protected static ?int $navigationSort = -10;
    protected function getStats(): array
    {
        $now = now();
    
        // Monthly total
        $monthlyTotal = StudentFees::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('fee_amount');
    
        // Weekly total
        $weeklyTotal = StudentFees::whereBetween('created_at', [
                $now->copy()->startOfWeek(),
                $now->copy()->endOfWeek(),
            ])
            ->sum('fee_amount');
    
        // Collected fees
        $collectedFee = StudentFees::sum('fee_amount');
    
        // Total fees from all student courses
        $totalFee = Student::with('course')->get()->sum(fn ($student) => $student->course->fee ?? 0);
    
        // Pending fees
        $pendingFee = $totalFee - $collectedFee;
    
        return [
            Stat::make('Monthly Fees Collected', '₹' . number_format($monthlyTotal))
                ->description('Total in ' . $now->format('F'))
                ->color('success'),
    
            Stat::make('Weekly Fees Collected', '₹' . number_format($weeklyTotal))
                ->description('This Week (' . $now->copy()->startOfWeek()->format('d M') . ' - ' . $now->copy()->endOfWeek()->format('d M') . ')')
                ->color('info'),
    
            Stat::make('Pending Fees', '₹' . number_format($pendingFee))
                ->description('Total fees still pending')
                ->color('danger'),
        ];
    }
    
    
}