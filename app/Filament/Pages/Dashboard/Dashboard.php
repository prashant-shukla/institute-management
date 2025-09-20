<?php
namespace App\Filament\Pages\Dashboard;

use App\Filament\Widgets\AdmissionsChart;
use App\Filament\Widgets\AnalyticsOverview;
use App\Filament\Widgets\CourseOverview;
use App\Filament\Widgets\CustomPaymentsOverview;
use App\Filament\Widgets\CustomRegistrationsOverview;
use App\Filament\Widgets\ExpensesOverview;
use App\Filament\Widgets\Inquiry;
use App\Filament\Widgets\LifeTimeRevenue;
use App\Filament\Widgets\PaymentsOverview;
use App\Filament\Widgets\RegistrationsChart;
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
            // PaymentsOverview::class,
            CustomRegistrationsOverview::class,
           
            ExpensesOverview::class,
            CourseOverview::class, 
            RegistrationsChart::class,
          
            CustomPaymentsOverview::class,
            Inquiry::class,
            AnalyticsOverview::class,
            LifeTimeRevenue::class
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            // You can add footer widgets here if needed
        ];
    }


    
}
