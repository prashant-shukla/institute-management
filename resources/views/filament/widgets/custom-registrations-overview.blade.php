<x-filament-widgets::widget>
    <div class="flex w-full">
    <style>
        .custom_width_25{ width: 25%;}
    </style>

        {{-- Card 1 --}}
        <div class="w-1/4 p-2 custom_width_25">
            <div class="p-6 rounded-xl shadow text-white flex justify-between items-center"
                 style="background-color:#6d28d9;">
                <div>
                    <p class="text-3xl font-bold">{{ number_format($todayRegistrations) }}</p>
                    <p class="mt-1">Today Student Registrations</p>
                </div>
                <x-heroicon-o-paper-airplane class="w-10 h-10 opacity-70" />
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="w-1/4 p-2 custom_width_25">
            <div class="p-6 rounded-xl shadow text-white flex justify-between items-center"
                 style="background-color:#db2777;">
                <div>
                    <p class="text-3xl font-bold">{{ number_format($monthlyRegistrations) }}</p>
                    <p class="mt-1">Monthly Student Registrations</p>
                </div>
                <x-heroicon-o-chart-bar class="w-10 h-10 opacity-70" />
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="w-1/4 p-2 custom_width_25">
            <div class="p-6 rounded-xl shadow text-white flex justify-between items-center"
                 style="background-color:#059669;">
                <div>
                    <p class="text-3xl font-bold">{{ number_format($yearlyRegistrations) }}</p>
                    <p class="mt-1">Yearly Student Registrations</p>
                </div>
                <x-heroicon-o-currency-dollar class="w-10 h-10 opacity-70" />
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="w-1/4 p-2 custom_width_25">
            <div class="p-6 rounded-xl shadow text-white flex justify-between items-center"
                 style="background-color:#2563eb;">
                <div>
                    <p class="text-3xl font-bold">{{ number_format($todayTotal) }}</p>
                    <p class="mt-1">Today Collected</p>
                </div>
                <x-heroicon-o-shopping-cart class="w-10 h-10 opacity-70" />
            </div>
        </div>

    </div>
</x-filament-widgets::widget>
