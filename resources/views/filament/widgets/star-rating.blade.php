@php
    $value = data_get($record, 'satisfaction_rate', 0);
@endphp

<div class="flex items-center space-x-1">
    @for ($i = 1; $i <= 5; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 {{ $i <= $value ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 
            3.95a1 1 0 00.95.69h4.162c.969 0 1.371 
            1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 
            1.118l1.287 3.95c.3.921-.755 
            1.688-1.54 1.118l-3.371-2.449a1 
            1 0 00-1.175 0l-3.371 2.449c-.784.57-1.838-.197-1.539-1.118l1.287-3.95a1 
            1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.162a1 
            1 0 00.95-.69l1.286-3.95z"/>
        </svg>
    @endfor
</div>
