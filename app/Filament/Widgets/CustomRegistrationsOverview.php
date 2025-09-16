<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Student;
use App\Models\StudentFees;

class CustomRegistrationsOverview extends Widget
{
    protected static string $view = 'filament.widgets.custom-registrations-overview';
    protected int|string|array $columnSpan = 12;

    public $todayRegistrations;
    public $monthlyRegistrations;
    public $yearlyRegistrations;
    public $todayTotal;

    public function mount(): void
    {
        $now = now();

        // ✅ Today registrations count
        $this->todayRegistrations = Student::whereDate('created_at', $now->toDateString())->count();

        // ✅ Monthly registrations count
        $this->monthlyRegistrations = Student::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        // ✅ Yearly registrations count
        $this->yearlyRegistrations = Student::whereYear('created_at', $now->year)->count();

        // ✅ Today total fees received
        $this->todayTotal = StudentFees::whereDate('received_on', $now->toDateString())
            ->sum('fee_amount');
    }
}
