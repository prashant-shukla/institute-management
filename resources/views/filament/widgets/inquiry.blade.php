<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-4">Rating Record</h2>

        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">TOTAL CALLS</th>
                    <th class="p-2 text-left">TREND</th>
                    <th class="p-2 text-left">CALL DURATION</th>
                    <th class="p-2 text-left">RESOLUTION RATE</th>
                    <th class="p-2 text-left">SATISFACTION RATE</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $records = [
                        ['calls'=>5245,'name'=>'Ryan MacLeod','duration'=>'5min','rate'=>70,'stars'=>4,'color'=>'bg-purple-500','bg_color'=>'purple'],
                        ['calls'=>4845,'name'=>'Jacob Sutherland','duration'=>'17min','rate'=>30,'stars'=>3,'color'=>'bg-blue-500','bg_color'=>'blue'],
                        ['calls'=>2736,'name'=>'James Oliver','duration'=>'12min','rate'=>60,'stars'=>4,'color'=>'bg-yellow-500','bg_color'=>'yellow'],
                        ['calls'=>3637,'name'=>'Lisa Nash','duration'=>'25min','rate'=>50,'stars'=>3,'color'=>'bg-red-500','bg_color'=>'red'],
                        ['calls'=>6365,'name'=>'Alan Walsh','duration'=>'10min','rate'=>40,'stars'=>2,'color'=>'bg-indigo-500','bg_color'=>'indigo'],
                        ['calls'=>4269,'name'=>'Pippa Mills','duration'=>'14min','rate'=>80,'stars'=>4,'color'=>'bg-pink-500','bg_color'=>'pink'],
                    ];
                @endphp

                @foreach ($records as $row)
                    <tr class="border-b">
                        <td class="p-2 font-bold">{{ number_format($row['calls']) }}</td>
                        <td class="p-2">{{ $row['name'] }}</td>
                        <td class="p-2">{{ $row['duration'] }}</td>
                        <td class="p-2">

                            <div class="mt-2 h-2 bg-gray-200 rounded-full">
                                <div class="h-2 {{ $row['color'] }} rounded-full " style="width: {{ $row['rate'] }}%; border-width:5px; border-color: {{ $row['bg_color'] }}"></div>
                            </div>
                        </td>
                        <td class="p-2">
                            <div class="flex space-x-1">
                                @for ($i=1;$i<=5;$i++)
                                    <svg class="w-4 h-4 {{ $i <= $row['stars'] ? 'text-yellow' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 
                                        1.902 0l1.286 3.95a1 1 0 00.95.69h4.162c.969 
                                        0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 
                                        00-.364 1.118l1.287 3.95c.3.921-.755 
                                        1.688-1.54 1.118l-3.371-2.449a1 1 
                                        0 00-1.175 0l-3.371 2.449c-.784.57-1.838-.197-1.539-1.118l1.287-3.95a1 
                                        1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.162a1 
                                        1 0 00.95-.69l1.286-3.95z"/>
                                    </svg>
                                @endfor
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            svg.text-yellow {
                color: gold;
            }
        </style>   
    </x-filament::section>
</x-filament-widgets::widget>
