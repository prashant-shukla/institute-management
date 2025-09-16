<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AnalyticsOverview extends Widget
{
    protected static ?string $heading = 'Analytics Overview';
    protected static string $view = 'filament.widgets.analytics-overview';
    protected int|string|array $columnSpan = 12;

    // Example dynamic data
    public $websiteSessions = 9;
    public $buyNowClicks = 0;
    public $transactions = 0;
    public $revenue = 0;
}
