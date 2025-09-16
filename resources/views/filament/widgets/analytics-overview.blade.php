<x-filament-widgets::widget>

    <div class="flex w-full">
        <style>
            .custom_width_25{ width: 25%;}
        </style>

            {{-- Website Sessions --}}
            <div class="w-1/4 p-2 custom_width_25">
                <div class="p-6 bg-white rounded-xl shadow flex flex-col justify-between">
                    <p class="text-gray-500 font-medium">Website Sessions</p>
                    <p class="text-3xl font-bold text-blue-500">{{ $websiteSessions }}</p>
                    <p class="text-green-500 text-sm mt-2">↑ 80% up compared to last 7 days</p>
                </div>
            </div>

        
            {{-- Buy Now Clicks --}}
            <div class="w-1/4 p-2 custom_width_25">
                <div class="p-6 bg-white rounded-xl shadow flex flex-col justify-between">
                    <p class="text-gray-500 font-medium">Buy Now Clicks</p>
                    <p class="text-3xl font-bold text-blue-500">{{ $buyNowClicks }}</p>
                    <p class="text-green-500 text-sm mt-2">↑ 0% up compared to last 7 days</p>
                </div>
            </div>

            {{-- Transactions --}}
            <div class="w-1/4 p-2 custom_width_25">
                <div class="p-6 bg-white rounded-xl shadow flex flex-col justify-between">
                    <p class="text-gray-500 font-medium">Transactions</p>
                    <p class="text-3xl font-bold text-blue-500">{{ $transactions }}</p>
                    <p class="text-green-500 text-sm mt-2">↑ 0% up compared to last 7 days</p>
                </div>
            </div>

            {{-- Revenue --}}
            <div class="w-1/4 p-2 custom_width_25">
                <div class="p-6 bg-white rounded-xl shadow flex flex-col justify-between">
                    <p class="text-gray-500 font-medium">Revenue</p>
                    <p class="text-3xl font-bold text-blue-500">{{ $revenue }}</p>
                    <p class="text-green-500 text-sm mt-2">↑ 0% up compared to last 7 days</p>
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
