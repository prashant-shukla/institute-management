@extends('student.layout')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @forelse ($liveClasses as $class)

        @php
            $now   = \Carbon\Carbon::now();
            $start = $class->start_time ? \Carbon\Carbon::parse($class->start_time) : null;
            $end   = $class->end_time ? \Carbon\Carbon::parse($class->end_time) : null;

            $status = 'upcoming';

            if ($start && $end && $now->between($start, $end)) {
                $status = 'running';
            } elseif ($end && $now->greaterThan($end)) {
                $status = 'completed';
            }
        @endphp

        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-semibold">{{ $class->title }}</h2>

            <p class="text-gray-600 mt-2">
                📅 {{ \Carbon\Carbon::parse($class->start_time)->format('d M Y, h:i A') }}
            </p>

            <p class="mt-3 text-gray-700">
                {!! $class->description !!}
            </p>

            {{-- Status badge --}}
            <p class="text-sm mt-2">
                Status:
                @if($status === 'running')
                    <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs">Live Now</span>
                @elseif($status === 'completed')
                    <span class="px-2 py-1 rounded-full bg-gray-200 text-gray-700 text-xs">Completed</span>
                @else
                    <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">Upcoming</span>
                @endif
            </p>

            {{-- Join button --}}
            <div class="mt-4">
                @if($status === 'running' && $class->meeting_link)
                    <a href="{{ $class->meeting_link }}"
                       target="_blank"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Join Class
                    </a>
                @else
                    <button class="px-4 py-2 bg-gray-300 text-gray-600 rounded cursor-not-allowed">
                        Join Class
                    </button>
                @endif
            </div>
        </div>

@empty
    <div class="col-span-2 text-center py-10 text-gray-500">
        No live classes available.
    </div>
@endforelse

</div>
@endsection
