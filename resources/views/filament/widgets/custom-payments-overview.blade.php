<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Price -->
            <div class="p-4 bg-white rounded shadow">
                <h3 class="text-sm text-gray-500">Total Price</h3>
                <p class="text-3xl font-bold text-black">4,657</p>

                <!-- Progress bar -->
                <div class="mt-2 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-purple-600 rounded-full progress_bar_border_red" style="width: 70%;"></div>
                </div>

                <p class="mt-1 text-sm text-black">
                    <span class="text-green-600">▲</span> 10% increases
                </p>
            </div>

            <!-- Total Stock -->
            <div class="p-4 bg-white rounded shadow">
                <h3 class="text-sm text-gray-500">Total Stock</h3>
                <p class="text-3xl font-bold text-black">2,592</p>

                <!-- Progress bar -->
                <div class="mt-2 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-pink-500 rounded-full progress_bar_border_pink" style="width: 50%"></div>
                </div>

                <p class="mt-1 text-sm text-black">
                    <span class="text-red-600">▼</span> 12% decrease
                </p>
            </div>

            <!-- Total Revenue -->
            <div class="p-4 bg-white rounded shadow">
                <h3 class="text-sm text-gray-500">Total Revenue</h3>
                <p class="text-3xl font-bold text-black">3,517</p>

                <!-- Progress bar -->
                <div class="mt-2 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-teal-500 rounded-full progress_bar_border_blue" style="width: 40%"></div>
                </div>

                <p class="mt-1 text-sm text-black">
                    <span class="text-red-600">▼</span> 5% decrease
                </p>
            </div>

            <!-- Total Investment -->
            <div class="p-4 bg-white rounded shadow">
                <h3 class="text-sm text-gray-500">Total Investment</h3>
                <p class="text-3xl font-bold text-black">5,759</p>

                <!-- Progress bar -->
                <div class="mt-2 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-blue-600 rounded-full progress_bar_border_yellow" style="width: 80%"></div>
                </div>

                <p class="mt-1 text-sm text-black">
                    <span class="text-green-600">▲</span> 15% increase
                </p>
            </div>
        </div>
        <style>
            .progress_bar_border_red{
                border-width: 5px;
                border-color: red;
            } 
            
            .progress_bar_border_pink{
                border-width: 5px;
                border-color: pink;
            } 
            .progress_bar_border_blue{
                border-width: 5px;
                border-color: blue;
            } 
            .progress_bar_border_yellow{
                border-width: 5px;
                border-color: yellow;
            }
        </style>
    </x-filament::card>
</x-filament::widget>
