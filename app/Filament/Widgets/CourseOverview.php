<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Widgets\ChartWidget;

class CourseOverview extends ChartWidget
{
    protected static ?string $heading = 'Course Overview';

    protected function getData(): array
    {
        $online  = Course::where('mode', 'online')->count();
        $offline = Course::where('mode', 'offline')->count();
        $both    = Course::where('mode', 'both')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Courses',
                    'data' => [$online, $offline, $both],
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#4BC0C0'],
                ],
            ],
            'labels' => ['Online', 'Offline', 'Both'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    // 👇 Add this method
    protected function getMaxHeight(): ?string
    {
        return '250px'; // string dena zaroori hai
    }
}
