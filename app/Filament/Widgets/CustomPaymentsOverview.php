<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\StudentFees;
use App\Models\Expense;

class CustomPaymentsOverview extends Widget
{
    protected static string $view = 'filament.widgets.custom-payments-overview';

    // full width
    // protected int|string|array $columnSpan = 'full';

    // initialize default values to avoid "undefined" issues
   
    public $monthlyTotal = 0;
    public $yearlyTotal = 0;
    public $monthlyExpense = 0;
    public $yearlyExpense = 0;

    public function mount(): void
    {
        $now = now();

        // Fees
        $this->monthlyTotal = (float) StudentFees::whereMonth('received_on', $now->month)
            ->whereYear('received_on', $now->year)
            ->sum('fee_amount');

        $this->yearlyTotal = (float) StudentFees::whereYear('received_on', $now->year)
            ->sum('fee_amount');

        // Expenses
        $this->monthlyExpense = (float) Expense::whereMonth('date', $now->month)
            ->whereYear('date', $now->year)
            ->sum('amount');

        $this->yearlyExpense = (float) Expense::whereYear('date', $now->year)
            ->sum('amount');
    }
}
