<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Filament\Widgets\ChartWidget;

class ExpensesOverview extends ChartWidget
{
    protected static ?string $heading = 'Expenses Overview (2025)';

    protected function getData(): array
    {
        $year = 2025;

        // ✅ Labels for 12 months
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        // ✅ Monthly Data for 2025
        $monthlyData = [];
        foreach (range(1, 12) as $month) {
            $monthlyData[] = Expense::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->sum('amount');
        }

        // ✅ Yearly Total for 2025
        $yearlyTotal = Expense::whereYear('created_at', $year)->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => "Monthly Expenses ($year)",
                    'data' => $monthlyData,
                    'backgroundColor' => '#2563eb',
                ],
                [
                    'label' => "Yearly Total ($year)",
                    'data' => array_fill(0, 12, $yearlyTotal), // flat line for yearly
                    'type' => 'line',
                    'borderColor' => '#f97316',
                    'borderWidth' => 2,
                    'fill' => false,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // main chart type
    }
}
