<x-filament-widgets::widget>
    <style>
        .card-col {
            width: 100%; /* default mobile */
        }
       
        @media (min-width: 1024px) { /* Desktop (lg) */
            .card-col {
                width: 50%;
            }
        }
    </style>

    <div class="flex flex-wrap -mx-3 gap-y-6">

        {{-- Monthly Revenue --}}
        <div class="px-3 card-col">
            <div class="p-6 rounded-xl shadow text-black" style="background-color:#ffffff;">
                <h3 class="text-lg font-bold">Monthly Revenue</h3>
                <p class="text-2xl mt-2">₹ {{ number_format($monthlyTotal ?? 0, 2) }}</p>
            </div>
        </div>

        {{-- Yearly Revenue --}}
        <div class="px-3 card-col">
            <div class="p-6 rounded-xl shadow text-black" style="background-color:#ffffff;">
                <h3 class="text-lg font-bold">Yearly  Revenue</h3>
                <p class="text-2xl mt-2">₹ {{ number_format($yearlyTotal ?? 0, 2) }}</p>
            </div>
        </div>

        {{-- Monthly Expense --}}
        <div class="px-3 card-col">
            <div class="p-6 rounded-xl shadow text-black" style="background-color:#ffffff;">
                <h3 class="text-lg font-bold">Monthly Expense</h3>
                <p class="text-2xl mt-2">₹ {{ number_format($monthlyExpense ?? 0, 2) }}</p>
            </div>
        </div>

        {{-- Yearly Expense --}}
        <div class="px-3 card-col">
            <div class="p-6 rounded-xl shadow text-black" style="background-color:#ffffff;">
                <h3 class="text-lg font-bold">Yearly  Expense</h3>
                <p class="text-2xl mt-2">₹ {{ number_format($yearlyExpense ?? 0, 2) }}</p>
            </div>
        </div>

    </div>
</x-filament-widgets::widget>
