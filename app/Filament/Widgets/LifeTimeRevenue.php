<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class LifeTimeRevenue extends Widget
{
    protected static ?string $heading = 'Life Time Revenue';
    protected static string $view = 'filament.widgets.life-time-revenue';
    protected int|string|array $columnSpan = 3;

    public $lifeTimeRevenue = 900;
}
