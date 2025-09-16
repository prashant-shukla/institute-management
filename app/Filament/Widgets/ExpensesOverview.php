<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Filament\Widgets\ChartWidget;

class ExpensesOverview extends ChartWidget
{
    protected static ?string $heading = "Expenses Overview";
    protected int|string|array $columnSpan = 7;
    protected function getData(): array
    {
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        // Fake test data simulating Revenue and Support Cost
        $revenueData = [15, 18, 12, 14, 10, 14, 8, 18, 16, 12, 14, 9];
        $supportCostData = [10, 14, 10, 15, 9, 13, 15, 19, 14, 10, 15, 9];

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $revenueData,
                    'backgroundColor' => '#ec4899', // pink-500
                    'barThickness' => 12,
                ],
                [
                    'label' => 'Support Cost',
                    'data' => $supportCostData,
                    'backgroundColor' => '#3b82f6', // blue-500
                    'barThickness' => 12,
                ],
            ],
            'labels' => $months,
        ];
    }


    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => ['stepSize' => 2],
                    'grid' => ['color' => '#e5e7eb'], // gray-200 lines
                ],
                'x' => [
                    'grid' => ['display' => false],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'labels' => [
                        'color' => '#374151', // text-gray-700
                        'font' => ['size' => 12],
                    ],
                ],
            ],
        ];
    }


    protected function __getData(): array
    {
        $year = 2025;

        // ✅ Labels for 12 months
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        // ✅ Monthly Data for 2025
        $monthlyData = [];
        $yearlyData = [];
        foreach (range(1, 12) as $month) {
            // $monthlyData[] = Expense::whereYear('created_at', $year)
            //     ->whereMonth('created_at', $month)
            //     ->sum('amount');
            $monthlyData[] = rand(10,1000); //only for testing
            $yearlyData[] = rand(10,1000); //only for testing
        }

        // ✅ Yearly Total for 2025
        $yearlyTotal = Expense::whereYear('created_at', $year)->sum('amount');
        $yearlyTotal = 1000;

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
                    'data' => $yearlyData, // flat line for yearly
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
