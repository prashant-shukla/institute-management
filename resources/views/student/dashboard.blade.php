@extends('student.layout')

@section('page_title', 'Dashboard')

@section('content')

<div class="space-y-10">

<h2 class="text-2xl font-bold mb-6 text-gray-800">📚 My Courses</h2>

@if($myCourses->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($myCourses as $item)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border">

                {{-- Course Title --}}
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ $item->course->name }}
                </h3>

                {{-- Meta Info --}}
                <div class="text-sm text-gray-600 space-y-1">
                    <p>
                        <span class="font-medium">Mode:</span>
                        {{ ucfirst($item->course->mode ?? 'online') }}
                    </p>

                    <p>
                        <span class="font-medium">Fee:</span>
                        <span class="text-green-600 font-semibold">
                            ₹{{ number_format($item->course_fee) }}
                        </span>
                    </p>
                </div>

                {{-- Status Badge --}}
                <div class="mt-3">
                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                        {{ $item->status === 'active'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>

              

            </div>
        @endforeach

    </div>
@else
    <div class="bg-white border rounded-xl p-6 text-center text-gray-500">
        You have not enrolled in any course yet.
    </div>
@endif



  


    {{-- ------------------------------- --}}
    {{-- 🔥 2) FILTER TABS WITH SPACING --}}
    {{-- ------------------------------- --}}
    <div class="flex gap-4 mt-6 mb-4">

        <a href="{{ route('student.dashboard') }}"
            class="px-4 py-2 rounded-lg {{ !$filter ? 'bg-blue-600 text-white' : 'bg-white shadow' }}">
            All Courses
        </a>

        <a href="?category=offline"
            class="px-4 py-2 rounded-lg {{ $filter=='offline' ? 'bg-blue-600 text-white' : 'bg-white shadow' }}">
            Offline Courses
        </a>

        <a href="?category=online"
            class="px-4 py-2 rounded-lg {{ $filter=='online' ? 'bg-blue-600 text-white' : 'bg-white shadow' }}">
            Online Courses
        </a>

        <a href="?category=certifications"
            class="px-4 py-2 rounded-lg {{ $filter=='certifications' ? 'bg-blue-600 text-white' : 'bg-white shadow' }}">
            Certifications
        </a>

    </div>


    {{-- ------------------------------- --}}
    {{-- 🔥 3) COURSE GRID (Correct Layout) --}}
    {{-- ------------------------------- --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($allCourses as $course)

        <div class="bg-white shadow rounded-xl p-4">

            {{-- IMAGE WITH FALLBACK BLUE --}}
            <div class="w-full h-40 rounded-lg overflow-hidden mb-4 
                    {{ !$course->image ? 'bg-blue-300' : '' }}">

                @if($course->image)
                <img src="{{ asset('storage/'.$course->image) }}"
                    class="w-full h-full object-cover">
                @endif

            </div>

            {{-- Name --}}
            <h3 class="font-semibold text-lg">
                {{ $course->name }}
            </h3>

            {{-- Duration --}}
            <p class="text-gray-600 text-sm mt-1">
                {{ $course->course_duration ?? '' }}
            </p>

            {{-- Price --}}
            <p class="text-blue-600 font-bold mt-2">
                ₹{{ number_format($course->offer_fee, 2) }}
            </p>

            <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}"
                class="block mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg text-center">
                Join Now
            </a>

        </div>

        @empty

        <div class="col-span-3 text-center text-gray-500 py-10">
            No courses found.
        </div>

        @endforelse

    </div>

</div>

@endsection