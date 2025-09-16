<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CourseOverview extends ChartWidget
{
    protected static ?string $heading = 'Customer satisfaction';
    protected int|string|array $columnSpan = 5;
    protected function getData(): array
    {
        // Dummy data: total = 98,000
        $online   = 30800; // 31.4%
        $offline  = 38500; // 39.3%
        $referral = 28700; // 29.3%

        return [
            'datasets' => [
                [
                    'data' => [$online, $offline, $referral],
                    'backgroundColor' => ['#1cc88a', '#36b9cc', '#f6c23e'], // Green, Blue, Orange
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Online', 'Offline', 'Referrals'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // Matches donut chart style
    }

    protected function getMaxHeight(): ?string
    {
        return '300px';
    }

    protected function getOptions(): array
    {
        return [
            'cutout' => '70%', // Donut thickness
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



// namespace App\Filament\Widgets;

// use App\Models\Course;
// use Filament\Widgets\ChartWidget;

// class CourseOverview extends ChartWidget
// {
//     protected static ?string $heading = 'Course Overview';

//     protected function getData(): array
//     {
//         $online  = Course::where('mode', 'online')->count();
//         $offline = Course::where('mode', 'offline')->count();
//         $both    = Course::where('mode', 'both')->count();

//         return [
//             'datasets' => [
//                 [
//                     'label' => 'Courses',
//                     'data' => [$online, $offline, $both],
//                     'backgroundColor' => ['#36A2EB', '#FF6384', '#4BC0C0'],
//                 ],
//             ],
//             'labels' => ['Online', 'Offline', 'Both'],
//         ];
//     }

//     protected function getType(): string
//     {
//         return 'pie';
//     }

//     // 👇 Add this method
//     protected function getMaxHeight(): ?string
//     {
//         return '250px'; // string dena zaroori hai
//     }
// }
