<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ExpensesOverview extends ChartWidget
{
    protected static ?string $heading = "Revenue Report";
    protected int|string|array $columnSpan = 7;
    public ?string $filter = 'year';

    // ❌ Remove this (it forces fixed height)
    // protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        switch ($this->filter) {
            case 'week':
                return $this->getWeeklyData();
            case 'month':
                return $this->getMonthlyData();
            case 'year':
            default:
                return $this->getYearlyData();
        }
    }

    private function getWeeklyData(): array
    {
        $labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $thisWeek = [12000, 15000, 18000, 20000, 17000, 25000, 22000];
        $lastWeek = [10000, 14000, 16000, 18000, 15000, 21000, 19000];

        return [
            'datasets' => [
                [
                    'label' => 'This Week',
                    'data' => $thisWeek,
                    'backgroundColor' => '#3b82f6',
                    'borderWidth' => 0,
                ],
                [
                    'label' => 'Last Week',
                    'data' => $lastWeek,
                    'backgroundColor' => '#ef4444',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $labels,
        ];
    }

    private function getMonthlyData(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                   'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $revenue2025 = [180000, 260000, 140000, 240000, 170000, 150000, 0, 0, 0, 0, 0, 0];
        $revenue2024 = [150000, 250000, 160000, 170000, 40000, 330000, 210000, 225000, 75000, 90000, 165000, 260000];

        return [
            'datasets' => [
                [
                    'label' => '2025',
                    'data' => $revenue2025,
                    'backgroundColor' => '#3b82f6',
                    'borderWidth' => 0,
                ],
                [
                    'label' => '2024',
                    'data' => $revenue2024,
                    'backgroundColor' => '#ef4444',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $months,
        ];
    }

    private function getYearlyData(): array
    {
        $years = ['2021', '2022', '2023', '2024', '2025'];
        $totals = [120000, 150000, 180000, 220000, 250000];

        return [
            'datasets' => [
                [
                    'label' => 'Total Revenue',
                    'data' => $totals,
                    'backgroundColor' => '#10b981',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $years,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'layout' => [
                'padding' => [
                    'top' => 10,
                    'bottom' => 10,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'min' => 0,          // ✅ Y-axis 0 से शुरू होगा
                    'max' => 300000,     // ✅ Y-axis 3 लाख तक फिक्स
                    'ticks' => [
                        'stepSize' => 20000, // ✅ हर 50K पर tick
                        'callback' => 'function(value) { return (value / 1000) + "K"; }',
                        'color' => '#374151',
                    ],
                    'grid' => ['color' => '#e5e7eb'],
                ],
                'x' => [
                    'grid' => ['display' => false],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'labels' => [
                        'color' => '#374151',
                        'font' => ['size' => 12],
                    ],
                ],
                'datalabels' => [
                    'anchor' => 'end',
                    'align' => 'end',
                    'color' => '#111827',
                    'formatter' => 'function(value) { return (value / 1000) + "K"; }',
                    'font' => ['weight' => 'bold'],
                ],
            ],
        ];
    }
    
    
    

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Week',
            'month' => 'Month',
            'year' => 'Year',
        ];
    }
}
