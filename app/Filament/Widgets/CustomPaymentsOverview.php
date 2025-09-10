<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomPaymentsOverview extends Widget
{
    protected static string $view = 'filament.widgets.custom-payments-overview';

    // 👇 Always full width
    protected int|string|array $columnSpan = 'full';

    public $todayTotal;
    public $weeklyTotal;
    public $monthlyTotal;
    public $yearlyTotal;


    public function mount(): void
    {
        $now = now();

        // ✅ Today
        $this->todayTotal = \App\Models\StudentFees::whereDate('received_on', $now->toDateString())
            ->sum('fee_amount');

        // // ✅ Weekly
        // $this->weeklyTotal = \App\Models\StudentFees::whereBetween('created_at', [
        //     $now->copy()->startOfWeek(),
        //     $now->copy()->endOfWeek(),
        // ])->sum('fee_amount');

        // ✅ Monthly
        $this->monthlyTotal = \App\Models\StudentFees::whereMonth('received_on', $now->month)
            ->whereYear('received_on', $now->year)
            ->sum('fee_amount');

        // ✅ Yearly
        $this->yearlyTotal = \App\Models\StudentFees::whereYear('received_on', $now->year)
            ->sum('fee_amount');

    }
}
