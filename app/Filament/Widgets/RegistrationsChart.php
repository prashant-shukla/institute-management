<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RegistrationsChart extends ChartWidget
{
    protected static ?string $heading = "Registrations Overview";
    protected int|string|array $columnSpan = 6;
    public ?string $filter = 'year';

    protected function getData(): array
    {
        return match ($this->filter) {
            'week' => $this->getWeeklyData(),
            'month' => $this->getMonthlyData(),
            default => $this->getYearlyData(),
        };
    }

    private function getWeeklyData(): array
    {
        $labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

        // 🟢 Current Week Registrations
        $thisWeek = User::select(DB::raw('DAYOFWEEK(created_at) as day'), DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day')
            ->pluck('total', 'day')
            ->toArray();

        // 🔴 Last Week Registrations
        $lastWeek = User::select(DB::raw('DAYOFWEEK(created_at) as day'), DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->groupBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $thisWeekData = [];
        $lastWeekData = [];
        foreach (range(1, 7) as $i) {
            $thisWeekData[] = $thisWeek[$i] ?? 0;
            $lastWeekData[] = $lastWeek[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'This Week',
                    'data' => $thisWeekData,
                    'backgroundColor' => '#3b82f6',
                    'borderWidth' => 0,
                ],
                [
                    'label' => 'Last Week',
                    'data' => $lastWeekData,
                    'backgroundColor' => '#ef4444',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $labels,
        ];
    }

    private function getMonthlyData(): array
    {
        $days = range(1, now()->daysInMonth);

        // 🟢 Current Month
        $thisMonth = User::select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(*) as total'))
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('day')
            ->pluck('total', 'day')
            ->toArray();

        // 🔴 Last Month
        $lastMonth = User::select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(*) as total'))
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->groupBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $thisMonthData = [];
        $lastMonthData = [];
        foreach ($days as $d) {
            $thisMonthData[] = $thisMonth[$d] ?? 0;
            $lastMonthData[] = $lastMonth[$d] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'This Month',
                    'data' => $thisMonthData,
                    'backgroundColor' => '#3b82f6',
                    'borderWidth' => 0,
                ],
                [
                    'label' => 'Last Month',
                    'data' => $lastMonthData,
                    'backgroundColor' => '#ef4444',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => array_map(fn($d) => (string) $d, $days),
        ];
    }

    private function getYearlyData(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                   'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // 🟢 This Year
        $thisYear = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // 🔴 Last Year
        $lastYear = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', now()->subYear()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $thisYearData = [];
        $lastYearData = [];
        foreach (range(1, 12) as $m) {
            $thisYearData[] = $thisYear[$m] ?? 0;
            $lastYearData[] = $lastYear[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => now()->year,
                    'data' => $thisYearData,
                    'backgroundColor' => '#3b82f6',
                    'borderWidth' => 0,
                ],
                [
                    'label' => now()->subYear()->year,
                    'data' => $lastYearData,
                    'backgroundColor' => '#ef4444',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
                'x' => [
                    'grid' => ['display' => false],
                ],
            ],
            'plugins' => [
                'legend' => ['position' => 'top'],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bar chart for comparison
    }

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Weekly',
            'month' => 'Monthly',
            'year' => 'Yearly',
        ];
    }
}
