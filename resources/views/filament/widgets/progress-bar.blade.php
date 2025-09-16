@php
    // $record is provided by Filament's ViewColumn
    $value = data_get($record, 'resolution_rate', 0);
    $color = data_get($record, 'color', 'blue');

    $gradients = [
        'purple' => 'linear-gradient(90deg,#7c3aed,#a78bfa)',
        'blue'   => 'linear-gradient(90deg,#3b82f6,#60a5fa)',
        'yellow' => 'linear-gradient(90deg,#f59e0b,#fbbf24)',
        'red'    => 'linear-gradient(90deg,#ef4444,#fb7185)',
        'pink'   => 'linear-gradient(90deg,#ec4899,#f472b6)',
    ];
    $bg = $gradients[$color] ?? $gradients['blue'];
@endphp

<div class="w-48 bg-gray-100 rounded-full h-2 overflow-hidden">
    <div class="h-2 rounded-full" style="width: {{ $value }}%; background: {{ $bg }};"></div>
</div>
