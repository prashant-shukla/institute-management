<x-filament-widgets::widget>
    <style>
        .deep {
            width: 100%; /* ✅ Mobile: 1 per row */
        }
        @media (min-width: 640px) { /* ✅ Tablet (sm: 640px–1023px) */
            .deep {
                width: 50%; /* 2 per row */
            }
        }
        @media (min-width: 1024px) { /* ✅ Desktop (lg: 1024px+) */
            .deep {
                width: 25%; /* 4 per row */
            }
        }
    </style>

    <div class="max-w-screen-xl mx-auto px-3">
        <div class="flex flex-wrap -mx-3">

            {{-- Card 1 --}}
            <div class="deep p-3">
                <div class="h-full p-6 rounded-xl shadow text-white"
                     style="background-color:#2563eb;">
                    <h3 class="text-lg font-bold">Today Registrations</h3>
                    <p class="text-2xl mt-2">{{ number_format($todayRegistrations) }}</p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="deep p-3">
                <div class="h-full p-6 rounded-xl shadow text-white"
                     style="background-color:#09ad95;">
                    <h3 class="text-lg font-bold">Monthly Registrations</h3>
                    <p class="text-2xl mt-2">{{ number_format($monthlyRegistrations) }}</p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="deep p-3">
                <div class="h-full p-6 rounded-xl shadow text-white"
                     style="background-color:#9333ea;">
                    <h3 class="text-lg font-bold">Yearly Registrations</h3>
                    <p class="text-2xl mt-2">{{ number_format($yearlyRegistrations) }}</p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="deep p-3">
                <div class="h-full p-6 rounded-xl shadow text-white"
                     style="background-color:#f97316;">
                    <h3 class="text-lg font-bold">Today Collected</h3>
                    <p class="text-2xl mt-2">₹ {{ number_format($todayTotal, 2) }}</p>
                </div>
            </div>

        </div>
    </div>
</x-filament-widgets::widget>

