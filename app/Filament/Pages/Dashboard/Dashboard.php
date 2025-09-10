<?php
namespace App\Filament\Pages\Dashboard;

use App\Filament\Widgets\AdmissionsChart;
use App\Filament\Widgets\CourseOverview;
use App\Filament\Widgets\CustomPaymentsOverview;
use App\Filament\Widgets\CustomRegistrationsOverview;
use App\Filament\Widgets\Inquiry;
use App\Filament\Widgets\PaymentsOverview;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = 'Dashboard';

    public function getColumns(): int | string | array
    {
        return 2;
    }

    function getWidgets(): array
    {
        return [
            // AccountWidget::class,
            CustomRegistrationsOverview::class,
            CustomPaymentsOverview::class,
            // PaymentsOverview::class,
            AdmissionsChart::class,
            CourseOverview::class, 
            Inquiry::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            // You can add footer widgets here if needed
        ];
    }


    
}
