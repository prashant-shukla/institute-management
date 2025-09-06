<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class AdmissionsChart extends ChartWidget
{
    protected static ?string $heading = 'New Admissions (Last 12 Months)';

    protected function getData(): array
    {
        // Online admissions (students whose course->mode = 'online')
        $online = Trend::query(
                Student::query()->whereHas('course', fn ($q) => $q->where('mode', 'online'))
            )
            ->between(
                start: now()->subMonths(11)->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        // Offline admissions (students whose course->mode = 'offline')
        $offline = Trend::query(
                Student::query()->whereHas('course', fn ($q) => $q->where('mode', 'offline'))
            )
            ->between(
                start: now()->subMonths(11)->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Online Admissions',
                    'data' => $online->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.3)',
                ],
                [
                    'label' => 'Offline Admissions',
                    'data' => $offline->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.3)',
                ],
            ],
            'labels' => $online->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // 'line' bhi kar sakte ho
    }
}
