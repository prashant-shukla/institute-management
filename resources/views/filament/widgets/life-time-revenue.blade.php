<x-filament-widgets::widget>
    <div class="flex w-full gap-4">
        {{-- LifeTime Revenue Card --}}
        <div class="flex-1 p-6 bg-white rounded-xl shadow flex flex-col justify-between">
            <p class="text-gray-500 font-medium">Lifetime Revenue</p>
            <p class="text-3xl font-bold text-blue-500">₹{{ number_format($lifeTimeRevenue, 2) }}</p>
        </div>

        {{-- Quick Actions --}}
        <div class="flex-1 flex flex-col gap-4">
            <a href="#"
               class="flex items-center justify-between p-4 bg-blue-50 rounded-xl text-blue-500 font-medium shadow hover:bg-blue-100 transition">
               <span class="flex items-center gap-2">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2-3-.895-3-2 1.343-2 3-2z"/>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 12v6m0 0H8m4 0h4"/>
                   </svg>
                   View Transactions
               </span>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M9 5l7 7-7 7"/>
               </svg>
            </a>

            <a href="#"
               class="flex items-center justify-between p-4 bg-blue-50 rounded-xl text-blue-500 font-medium shadow hover:bg-blue-100 transition">
               <span class="flex items-center gap-2">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 16v-8a4 4 0 014-4h8a4 4 0 014 4v8"/>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 16h16"/>
                   </svg>
                   Generate Reports
               </span>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M9 5l7 7-7 7"/>
               </svg>
            </a>
        </div>
    </div>
</x-filament-widgets::widget>
