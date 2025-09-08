<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomPaymentsOverview extends Widget
{
    protected static string $view = 'filament.widgets.custom-payments-overview';

    protected int|string|array $columnSpan = 'full'; // 👈 ye add karo

    public $monthlyTotal;
    public $weeklyTotal;
    public $pendingFee;

    public function mount(): void
    {
        $now = now();

        $this->monthlyTotal = \App\Models\StudentFees::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('fee_amount');

        $this->weeklyTotal = \App\Models\StudentFees::whereBetween('created_at', [
            $now->copy()->startOfWeek(),
            $now->copy()->endOfWeek(),
        ])->sum('fee_amount');

        $collectedFee = \App\Models\StudentFees::sum('fee_amount');
        $totalFee     = \App\Models\Student::with('course')->get()->sum(fn ($s) => $s->course->fee ?? 0);

        $this->pendingFee = $totalFee - $collectedFee;
    }
}
