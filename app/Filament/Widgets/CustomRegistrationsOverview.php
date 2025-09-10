<?php

namespace App\Filament\Widgets;
use Filament\Widgets\Widget;
use App\Models\Student;

class CustomRegistrationsOverview extends Widget
{
    // Yeh widget ka view file link karega
    protected static string $view = 'filament.widgets.custom-registrations-overview';

    // Column span "full" rakha hai, matlab full width lega
    protected int|string|array $columnSpan = 'full';

    // Public properties jisme values store hongi
    public $todayRegistrations;
    public $monthlyRegistrations;
    public $yearlyRegistrations;

    // Mount function jab widget load hota hai tab run hota hai
    public function mount(): void
    {
        $now = now(); // Current date & time

        // ✅ Today registrations count
        $this->todayRegistrations = Student::whereDate('created_at', $now->toDateString())->count();

        // ✅ Monthly registrations count
        $this->monthlyRegistrations = Student::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        // ✅ Yearly registrations count
        $this->yearlyRegistrations = Student::whereYear('created_at', $now->year)->count();
    }
}