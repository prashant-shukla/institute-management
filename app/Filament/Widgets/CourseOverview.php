<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CourseOverview extends ChartWidget
{
    protected static ?string $heading = 'Course Overview';
    protected int|string|array $columnSpan = 5;

    protected function getData(): array
    {
        // Dummy data
        $online   = 30800; // 31.4%
        $offline  = 38500; // 39.3%
        $referral = 28700; // 29.3%

        return [
            'datasets' => [
                [
                    'data' => [$online, $offline, $referral],
                    'backgroundColor' => ['#1cc88a', '#36b9cc', '#f6c23e'],
                    'borderWidth' => 0, // border remove
                ],
            ],
            'labels' => ['Online', 'Offline', 'Referrals'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getMaxHeight(): ?string
    {
        return '160px'; // height fix
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'aspectRatio' => 300 / 160, // width / height
            'cutout' => '70%',
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
        ];
    }
}
