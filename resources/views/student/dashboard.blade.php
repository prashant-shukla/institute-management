@extends('student.layout')

@section('page_title', 'Dashboard')

@section('content')

<div class="space-y-10">

    {{-- ------------------------------- --}}
    {{-- 🔥 1) Current Enrolled Course Card (Full Width) --}}
    {{-- ------------------------------- --}}
    @if($currentCourse)
    <div class="bg-white shadow-md rounded-xl p-6 flex gap-6 w-full">

        {{-- Image --}}
        <div class="w-64 h-40 rounded-lg overflow-hidden bg-blue-200">
            @if($currentCourse->image)
            <img src="{{ asset('storage/'.$currentCourse->image) }}"
                class="w-full h-full object-cover">
            @endif
        </div>

        {{-- Details --}}
        <div class="flex-1">
            <h2 class="text-2xl font-semibold">{{ $currentCourse->name }}</h2>
            <p class="mt-2 text-gray-600 text-sm leading-6">
                {{ \Illuminate\Support\Str::limit(strip_tags($currentCourse->description), 250) }}
            </p>


            <p class="mt-3 font-medium">
                Duration:
                <span class="text-gray-700">{{ $currentCourse->course_duration }}</span>
            </p>

            <a href="{{ route('course', ['slug' => $currentCourse->slug, 'id' => $currentCourse->id]) }}"
                class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">
                Go to Course
            </a>

        </div>
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