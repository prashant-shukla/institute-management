
     @include('layout.headers') 

    <!-- Hero Banner -->
    <section id="home"
        class="relative bg-gradient-to-br from-blue-500 via-blue-400 to-indigo-500 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div
                class="absolute top-20 left-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float">
            </div>
            <div class="absolute bottom-20 right-10 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"
                style="animation-delay: 3s;"></div>
        </div>

        <div class="relative container mx-auto px-4 py-16 md:py-24">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Left Side: Heading, Subheading & CTA -->
                    <div class="text-center lg:text-left slide-in-left">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                            Design Your Future
                        </h1>
                        <p class="text-lg md:text-xl mb-6 text-blue-100">
                            Get-ready, Get hired! Hands-on CAD & Interior training with real projects.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                            <a href="{{ url('/Course') }}">
                                <button
                                    class="px-6 py-3 bg-white text-blue-500 font-bold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    Explore Courses
                                </button>
                            </a>
                            <button
                                class="px-6 py-3 bg-transparent text-white border-2 border-white font-bold rounded-full hover:bg-white hover:text-blue-500 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                Free 3-Day Trial
                            </button>
                        </div>
                    </div>

                    <!-- Right Side: Features -->
                    <div class="space-y-6 slide-in-right">
                        <!-- What You'll Get Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-center lg:text-left">
                                What You'll Get
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="flex items-center space-x-3 p-3 bg-white bg-opacity-10 backdrop-blur rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                                    style="animation-delay: 0.2s;">
                                    <div
                                        class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold">Certified Mentors</h3>
                                        <p class="text-blue-200 text-xs">Autodesk certified professionals</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3 p-3 bg-white bg-opacity-10 backdrop-blur rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                                    style="animation-delay: 0.4s;">
                                    <div
                                        class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold">Studio Critiques</h3>
                                        <p class="text-blue-200 text-xs">Expert feedback on your work</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3 p-3 bg-white bg-opacity-10 backdrop-blur rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                                    style="animation-delay: 0.6s;">
                                    <div
                                        class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold">Portfolio Reviews</h3>
                                        <p class="text-blue-200 text-xs">Build professional portfolio</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3 p-3 bg-white bg-opacity-10 backdrop-blur rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                                    style="animation-delay: 0.8s;">
                                    <div
                                        class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold">Placement Guidance</h3>
                                        <p class="text-blue-200 text-xs">Career support & job assistance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="py-8 bg-gray-900 dark:bg-black relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-blue-900/20 to-indigo-900/20"></div>
            <div
                class="absolute top-5 right-5 w-24 h-24 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10">
            </div>
            <div
                class="absolute bottom-5 left-5 w-24 h-24 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10">
            </div>
        </div>

        <div class="relative container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                    style="animation-delay: 0.3s;">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                        <span class="counter" data-target="5" data-suffix="K+">0</span>
                    </div>
                    <div class="text-blue-200 text-xs">Students Trained</div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                    style="animation-delay: 0.4s;">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                        <span class="counter" data-target="20" data-suffix="+">0</span>
                    </div>
                    <div class="text-blue-200 text-xs">Courses Available</div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                    style="animation-delay: 0.5s;">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                        <span class="counter" data-target="4.7" data-suffix="/5">0</span>
                    </div>
                    <div class="text-blue-200 text-xs">Average Rating</div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                    style="animation-delay: 0.6s;">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                        <span class="counter" data-target="5" data-suffix="L+">0</span>
                    </div>
                    <div class="text-blue-200 text-xs">Training Hours</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Courses Section -->
    <section class="py-20 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 dark:text-white transition-colors duration-300">
                        Featured Courses
                    </h2>

                    <!-- Key Benefits -->
                    <div class="flex flex-wrap justify-center items-center gap-6 mb-8">
                        <div class="flex items-center space-x-2 text-green-600 dark:text-green-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-semibold">100% Job Assistance</span>
                        </div>
                        <div class="flex items-center space-x-2 text-blue-600 dark:text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-semibold">Become Job Ready</span>
                        </div>
                        <div class="flex items-center space-x-2 text-purple-600 dark:text-purple-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-semibold">Life Time Support</span>
                        </div>
                    </div>

                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                </div>

                <!-- Featured Courses Grid -->
                @php
                // Different background color sets for fallback
                $bgColors = [
                'bg-gradient-to-r from-blue-500 to-indigo-600',
                'bg-gradient-to-r from-green-500 to-emerald-600',
                'bg-gradient-to-r from-pink-500 to-rose-600',
                ];

                // Different button colors
                $btnColors = [
                'bg-blue-500 hover:bg-blue-600',
                'bg-green-500 hover:bg-green-600',
                'bg-pink-500 hover:bg-pink-600',
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach ($latestCourses as $index => $course)
                    @php
                    $bgClass = $bgColors[$index % count($bgColors)];
                    $btnClass = $btnColors[$index % count($btnColors)];
                    @endphp

                    <div
                        class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100 dark:border-gray-600 overflow-hidden">

                        {{-- ✅ Header (Course Image or Default Background) --}}
                        <div
                            class="relative h-48 overflow-hidden flex items-center justify-center {{ !$course->image ? $bgClass : '' }}">
                            @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}"
                                class="w-full h-full object-cover">
                            @endif

                            @if ($course->popular_course)
                            <div
                                class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                POPULAR
                            </div>
                            @endif


                        </div>

                        {{-- ✅ Content --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2"
                                style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">
                                {{ $course->name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-300 mb-3">{{ $course->sub_title }}</p>

                            {{-- Course Details --}}
                            <div class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                                <p>{{ $course->course_duration ?? 'N/A' }} Online</p>
                                <p>{{ $course->projects ?? '0' }} Projects</p>
                            </div>

                            {{-- Price --}}
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-2xl font-bold text-gray-800 dark:text-white">
                                    ₹{{ number_format($course->offer_fee, 2) }}
                                </div>
                                <div class="text-sm text-gray-500 line-through">
                                    ₹{{ number_format($course->fee, 2) }}
                                </div>
                            </div>

                            {{-- ✅ Enroll Button --}}
                            <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}"
                                class="block w-full py-3 {{ $btnClass }} text-white text-center font-semibold rounded-lg transform hover:scale-105 transition-all duration-300 shadow-lg">
                                Enroll Now
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>



                <!-- View All Courses Button -->
                <div class="text-center">
                    <a href="{{ url('/Course') }}">
                        <button
                            class="px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-lg hover:from-blue-600 hover:to-indigo-600 transform hover:scale-105 transition-all duration-300 shadow-xl">
                            View All Courses
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About CADADDA & Highlights Section -->
    <section
        class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 dark:text-white transition-colors duration-300">
                        About CADADDA
                    </h2>
                    <p
                        class="text-xl text-gray-700 dark:text-gray-300 mb-8 max-w-3xl mx-auto transition-colors duration-300 leading-relaxed">
                        We are constantly improving our course content and the process of learning so that our students
                        can get industry-standard training from us at CADADDA. Our commitment to excellence drives
                        everything we do.
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                </div>

                <!-- Highlights Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Highlight 1 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            Autodesk Authorized</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            Official Autodesk Authorized training Institute since 2017, ensuring you receive certified,
                            industry-recognized education.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-blue-600 dark:text-blue-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>

                    <!-- Highlight 2 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            Certified Instructors</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            All our instructors are Autodesk Certified Professionals with extensive industry experience
                            and proven teaching methodologies.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-green-600 dark:text-green-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>

                    <!-- Highlight 3 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            Technical Excellence</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            Every faculty member is a technical expert with engineering backgrounds and interior design
                            expertise.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-purple-600 dark:text-purple-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>

                    <!-- Highlight 4 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            Specialized Focus</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            We are a specialized CAD training institute, focusing exclusively on CAD/CAM technologies -
                            no other courses to dilute our expertise.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-orange-600 dark:text-orange-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>

                    <!-- Highlight 5 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            10+ Years Experience</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            Over a decade of experience in CAD training, continuously evolving our curriculum to meet
                            industry demands.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-red-600 dark:text-red-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>

                    <!-- Highlight 6 -->
                    <div
                        class="group bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                            300+ Job Queries</h3>
                        <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300 leading-relaxed">
                            Every year we receive over 300 job queries from companies seeking our well-trained
                            graduates.
                        </p>
                        <!-- <div class="mt-4 flex items-center text-indigo-600 dark:text-indigo-400 font-medium">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div> -->
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="text-center mt-16">
                    <div
                        class="bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl p-8 md:p-12 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32">
                        </div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24">
                        </div>

                        <div class="relative z-10">
                            <h3 class="text-3xl md:text-4xl font-bold mb-4">Ready to Transform Your Career?</h3>
                            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">
                                Join thousands of successful students who have already taken the first step towards
                                their dream career in CAD design.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <button
                                    class="px-8 py-4 bg-white text-blue-500 font-bold rounded-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    Start Your Journey
                                </button>
                                <a href="{{ asset('brochure.pdf') }}" download>
                                    <button
                                        class="px-8 py-4 bg-transparent text-white border-2 border-white font-bold rounded-lg hover:bg-white hover:text-blue-500 transform hover:scale-105 transition-all duration-300">
                                        Download Brochure
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Student Testimonials / Reviews Section -->
    <!-- Student Testimonials / Reviews Section -->
    <section
        class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">

                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 dark:text-white transition-colors duration-300">
                        Our students, making us proud everyday!
                    </h2>
                    <p
                        class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Hear from our successful students and recruiters who trust CADADDA for industry-ready talent.
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                </div>

                <!-- Reviews Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($reviews as $review)
                    @php
                    $student = $review->student; // student_id se aaya
                    $course = $review->course; // course_id se aaya

                    // student photo column: photo / image jo bhi ho
                    $studentImage = $student->photo ?? $student->image ?? null;
                    $imagePath = $studentImage
                    ? asset('storage/' . $studentImage)
                    : asset('images/blue-circle-with-white-user_78370-4707.avif');
                    @endphp

                    <div
                        class="bg-white dark:bg-gray-700 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">

                        <!-- Top Section -->
                        <div class="flex items-center mb-6">
                            <div
                                class="w-16 h-16 rounded-full overflow-hidden mr-4 shadow-md ring-2 ring-blue-200 dark:ring-blue-500/40">
                                <img src="{{ $imagePath }}"
                                    alt="{{ $student->name ?? 'User' }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <div>
                                <h3 class="text-lg font-bold line-clamp-2 text-gray-800 dark:text-white">
                                    {{ $student->user->firstname ?? '' }} {{ $student->user->lastname ?? '' }}
                                </h3>

                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $course->name ?? 'Course Student' }}
                                </p>
                            </div>
                        </div>

                        <!-- Rating (no column, so default 5) -->
                        <div class="flex mb-4">
                            <div class="text-yellow-400 text-lg">
                                @for ($i = 1; $i <= 5; $i++)
                                    ★
                                    @endfor
                                    </div>
                            </div>

                            <!-- Review Message -->
                            <p class="text-gray-700 dark:text-gray-300 mb-4 italic leading-relaxed">
                                "{{ trim($review->review, '\"') }}"
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <!-- Success Stats (same as before) -->
                    <div class="mt-16 text-center">
                        <div class="bg-white dark:bg-gray-700 rounded-2xl p-8 shadow-lg">
                            <h3 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
                                Student Success Metrics
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                <div>
                                    <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">5K+</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">students trained</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">₹1.8-3.6L</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Fresher Package</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">2.0</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Months to Job</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-orange-600 dark:text-orange-400 mb-2">50+</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Companies Hiring</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>








    <!-- Courses Sections -->
    <section id="courses" class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <!-- Offline Courses -->
            <div class="mb-16">
                <h2
                    class="text-3xl md:text-4xl font-bold text-center mb-4 text-gray-800 dark:text-white transition-colors duration-300">
                    Popular Offline Courses
                </h2>
                <p class="text-center text-gray-600 dark:text-gray-400 mb-8 transition-colors duration-300">Offline
                    courses at our center</p>

                @php
                $latestCourses = \App\Models\Course::orderBy('created_at', 'desc')->take(4)->get();

                $bgColors = [
                'online' => [
                'bg-gradient-to-br from-blue-400 to-blue-600',
                'bg-gradient-to-br from-green-400 to-green-600',
                'bg-gradient-to-br from-purple-400 to-purple-600',
                ],
                'offline' => [
                'bg-gradient-to-br from-orange-400 to-red-600',
                'bg-gradient-to-br from-pink-400 to-rose-600',
                'bg-gradient-to-br from-yellow-400 to-orange-500',
                ],
                'both' => [
                // 👈 new safe key
                'bg-gradient-to-br from-teal-400 to-teal-600',
                'bg-gradient-to-br from-indigo-400 to-indigo-600',
                'bg-gradient-to-br from-cyan-400 to-cyan-600',
                ],
                ];

                $btnColors = [
                'online' => [
                'bg-blue-500 hover:bg-blue-600',
                'bg-green-500 hover:bg-green-600',
                'bg-purple-500 hover:bg-purple-600',
                ],
                'offline' => [
                'bg-orange-500 hover:bg-orange-600',
                'bg-pink-500 hover:bg-rose-600',
                'bg-yellow-500 hover:bg-orange-500',
                ],
                'both' => [
                // 👈 new safe key
                'bg-teal-500 hover:bg-teal-600',
                'bg-indigo-500 hover:bg-indigo-600',
                'bg-cyan-500 hover:bg-cyan-600',
                ],
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($latestCourses as $index => $course)
                    @php
                    // Agar mode invalid hai to default 'online' use karein
                    $mode = $course->mode ?? 'online';
                    $mode = array_key_exists($mode, $bgColors) ? $mode : 'online';

                    $bgClass = $bgColors[$mode][$index % count($bgColors[$mode])];
                    $btnClass = $btnColors[$mode][$index % count($btnColors[$mode])];
                    @endphp
                    @endforeach
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($latestCourses as $index => $course)
                    @php
                    $mode = $course->mode ?? 'online';
                    $bgClass = $bgColors[$mode][$index % count($bgColors[$mode])];
                    $btnClass = $btnColors[$mode][$index % count($btnColors[$mode])];
                    @endphp

                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group ">
                        <div class="h-48 relative overflow-hidden {{ $bgClass }}">
                            @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}"
                                class="w-full h-full object-cover">
                            @else
                            <div class="absolute inset-0 flex items-center justify-center text-white dark:text-white text-3xl font-bold"
                                style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">
                                {{ strtoupper(substr($course->name, 0, 1)) }}
                            </div>
                            @endif

                            <div class="absolute inset-0 bg-black opacity-20"></div>

                            <div class="absolute bottom-4 left-4 text-white">

                                @if ($mode === 'offline')
                                <span class="text-xs bg-red-600 px-2 py-1 rounded">Offline</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="text-xl font-bold dark:text-white"
                                style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">
                                {{ $course->name }}
                            </h3>
                            <p class="text-sm opacity-90 mb-2 dark:text-gray-400">{{ $course->course_duration ?? 'N/A' }}
                                Program</p>
                            <div class="flex justify-between items-center mb-3">
                                {{-- Offer Fee on left --}}
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">
                                    ₹{{ number_format($course->offer_fee, 2) }}
                                </span>

                                {{-- Original Fee on right --}}
                                <span class="text-sm line-through text-gray-500">
                                    ₹{{ number_format($course->fee, 2) }}
                                </span>
                            </div>
                            <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}"
                                class=" text-white">
                                <button
                                    class="w-full py-2 {{ $btnClass }} text-white rounded-lg transition-colors">
                                    Enroll Now
                                </button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>



                <div class="text-center mt-8">
                    <a href="{{ url('/Course') }}">
                        <button
                            class="px-8 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition-colors">
                            View More Offline Courses →
                        </button>
                    </a>
                </div>

            </div>

            <!-- Online Courses -->
            <div>
                <h2
                    class="text-3xl md:text-4xl font-bold text-center mb-4 text-gray-800 dark:text-white transition-colors duration-300">
                    Online Courses
                </h2>
                <p class="text-center text-gray-600 dark:text-gray-400 mb-8 transition-colors duration-300">Online
                    live
                    courses via Zoom platform</p>

                @php
                $onlineCourses = \App\Models\Course::where('mode', 'online')
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get();
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($onlineCourses as $course)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                        {{-- Header --}}
                        <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 relative overflow-hidden">
                            <div
                                class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                LIVE
                            </div>
                            {{-- <div class="absolute bottom-4 left-4 text-white dark:text-white">
                                    <h3 class="text-xl font-bold">{{ $course->name }}</h3>
                            <p class="text-sm opacity-90 dark:text-gray-400">{{ $course->course_duration }} Online</p>
                        </div> --}}
                    </div>

                    {{-- Body --}}
                    <div class="p-4">
                        <h3 class="text-xl font-bold dark:text-white"
                            style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">
                            {{ $course->name }}
                        </h3>
                        <p class="text-sm opacity-90 dark:text-gray-400">{{ $course->course_duration }} Online</p>
                        <div class="flex justify-between items-center mb-3">
                            {{-- Offer Fee on left --}}
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300">
                                ₹{{ number_format($course->offer_fee, 2) }}
                            </span>

                            {{-- Original Fee on right --}}
                            <span class="text-sm line-through text-gray-500">
                                ₹{{ number_format($course->fee, 2) }}
                            </span>
                        </div>
                        <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}">
                            <button
                                class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">

                                Join Online

                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="text-center mt-8">
                <a href="{{ url('/Course') }}">
                    <button
                        class="px-8 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition-colors">
                        View More Online Courses →
                    </button>
                </a>
            </div>
        </div>
        </div>
    </section>

    <!-- Values / Powerful Features Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white transition-colors duration-300">
                CADADDA Values
            </h2>

            <div class="max-w-4xl mx-auto">
                <div
                    class="bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl p-8 md:p-12 text-white shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24">
                    </div>

                    <div class="relative z-10">
                        <h3 class="text-2xl md:text-3xl font-bold mb-4">POWERFUL FEATURES</h3>
                        <p class="text-lg mb-8 text-blue-100">
                            Experience cutting-edge training with our state-of-the-art facilities and expert
                            instructors.
                            We provide hands-on experience with the latest CAD/CAM software and tools.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4">
                                <div class="text-3xl font-bold mb-2">24/7</div>
                                <div class="text-sm">Lab Access</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4">
                                <div class="text-3xl font-bold mb-2">100%</div>
                                <div class="text-sm">Practical Training</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4">
                                <div class="text-3xl font-bold mb-2">1:1</div>
                                <div class="text-sm">Mentorship</div>
                            </div>
                        </div>

@php
    $featuresUrl = \App\Models\Feature::query()->value('button_url');
@endphp

<a href="{{ $featuresUrl ?? '#' }}" target="_blank">
    <button
        class="px-6 py-3 bg-white text-blue-500 font-bold rounded-lg hover:bg-gray-100 transition-colors">
        View More Features →
    </button>
</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Feedback & Hiring Partners -->
    <!-- <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white transition-colors duration-300">
                Company Feedback & Our Hiring Partners
            </h2>

           
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @foreach ($testimonials as $testimonial)
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md transition-colors duration-300">
                    
                    <div class="flex mb-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <span
                            class="{{ $i <= $testimonial->star_rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}">
                            ★
                            </span>
                            @endfor
                    </div>

                    
                    <p class="text-gray-700 dark:text-gray-300 mb-4 italic transition-colors duration-300">
                        "{{ $testimonial->review }}"
                    </p>

                   
                    <div class="flex items-center">
                        @if ($testimonial->image)
                        <img src="{{ asset('storage/' . $testimonial->image) }}"
                            alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full mr-3 object-cover">
                        @else
                        <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full mr-3"></div>
                        @endif

                        <div>
                            <div class="font-bold text-gray-800 dark:text-white transition-colors duration-300">
                                {{ $testimonial->name }}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                                "{{ $testimonial->short_description }}"
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


           
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold mb-8 text-gray-800 dark:text-white transition-colors duration-300">
                    Companies Hiring From Us</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                    @foreach ($clients as $client)
                    <div
                        class="h-20 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300 p-2">

                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                            class="max-h-full max-w-full object-contain">


                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section> -->

    <!-- Our Free Lectures Section -->
    <section
        class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 dark:text-white transition-colors duration-300">
                        Our Free Lectures
                    </h2>
                    <p
                        class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto transition-colors duration-300 leading-relaxed">
                        Follow us on YouTube for free CAD tutorials, tips, and industry insights. Learn from our expert
                        instructors without any cost!
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                </div>

                <!-- YouTube Videos Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @php
                    // Thoda colour variety ke liye
                    $colorSets = [
                    ['from' => 'from-red-500', 'to' => 'to-red-700', 'badge' => 'bg-red-600'],
                    ['from' => 'from-blue-500', 'to' => 'to-blue-700', 'badge' => 'bg-blue-500'],
                    ['from' => 'from-purple-500', 'to' => 'to-purple-700', 'badge' => 'bg-purple-600'],
                    ];
                    @endphp

                    @forelse ($videos as $video)
                    @php
                    $set = $colorSets[$loop->index % count($colorSets)];
                    @endphp

                    <div
                        class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100 dark:border-gray-600 overflow-hidden group">

                        <!-- Top banner / thumbnail -->
                        <div class="relative">
                            <div class="aspect-video bg-gradient-to-br {{ $set['from'] }} {{ $set['to'] }} relative overflow-hidden">
                                <div class="absolute inset-0 bg-black opacity-20"></div>

                                {{-- Play icon --}}
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div
                                        class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-white/90" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- Badge --}}
                                <div
                                    class="absolute top-3 right-3 {{ $set['badge'] }} text-white px-2 py-1 rounded text-xs font-bold">
                                    {{ $video->is_free ? 'FREE' : 'PREMIUM' }}
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3
                                class="text-lg font-bold mb-3 text-gray-800 dark:text-white transition-colors duration-300">
                                {{ $video->title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                                {{ $video->description }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $video->duration ?? '--:--' }}</span>
                                </div>

                                <a href="{{ $video->youtube_url }}" target="_blank"
                                    class="inline-flex items-center px-4 py-2 {{ $set['badge'] }} text-white text-sm font-semibold rounded-lg hover:brightness-110 transition-colors">
                                    Watch Now
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-400 col-span-full text-center">
                        No tutorial videos added yet.
                    </p>
                    @endforelse
                </div>


                <!-- YouTube Channel CTA -->
                <div class="text-center">
                    <div
                        class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl p-8 md:p-12 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32">
                        </div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24">
                        </div>

                        <div class="relative z-10">
                            <div class="flex justify-center mb-6">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </div>
                            <h3 class="text-3xl md:text-4xl font-bold mb-4">Follow us on YouTube</h3>
                            <p class="text-xl mb-8 text-red-100 max-w-2xl mx-auto">
                                Subscribe to our channel for daily CAD tutorials, industry updates, and expert tips.
                                Join thousands of learners worldwide!
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="https://www.youtube.com/@cadadda" target="_blank"
                                    class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-bold rounded-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                    </svg>
                                    Subscribe Now
                                </a>

                                <a href="https://www.youtube.com/@cadadda/playlists" target="_blank"
                                    class="px-8 py-4 bg-transparent text-white border-2 border-white font-bold rounded-lg hover:bg-white hover:text-red-600 transform hover:scale-105 transition-all duration-300">
                                    View All Videos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Latest News Feed Section -->
    <section class="py-20 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">

                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 dark:text-white">
                        Our Latest Blogs Feed
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                        Stay updated with the latest trends, industry insights, and CAD technology blods.
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                </div>

                <!-- Blog Posts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

                    @foreach ($latestBlogs as $blog)
                    <article
                        class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100 dark:border-gray-600 overflow-hidden group">

                        <div class="relative">
                            <div class="h-56 overflow-hidden rounded-2xl shadow-md">
                                @if (!empty($blog->image))
                                {{-- 🖼️ Show uploaded image --}}
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                @elseif (!empty($blog->video_url))
                                @php
                                $videoId = null;
                                $url = $blog->video_url;

                                // ✅ Extract YouTube video ID from all possible formats
                                if (
                                preg_match(
                                '/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|.*v=))([a-zA-Z0-9_-]{11})/',
                                $url,
                                $matches,
                                )
                                ) {
                                $videoId = $matches[1];
                                }
                                @endphp

                                @if ($videoId)
                                {{-- 🎬 Show YouTube thumbnail --}}
                                <div class="relative group">
                                    <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                        alt="{{ $blog->title }}"
                                        class="w-full h-56 object-cover hover:scale-105 transition-transform duration-500">
                                    {{-- 🔗 Play button overlay --}}
                                    <a href="{{ $blog->video_url }}" target="_blank"
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                            viewBox="0 0 24 24" class="w-12 h-12">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>

                            <div class="absolute inset-0 bg-black opacity-20"></div>

                            <!-- <div
                                class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                {{ $blog->category ?? 'Blog' }}
                            </div> -->
                        </div>

                        <div class="p-6">

                            <!-- Date -->
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ $blog->created_at->format('M d, Y') }}</span>
                            </div>

                            <!-- Title -->
                            <h3
                                class="text-xl font-bold mb-3 text-gray-800 dark:text-white group-hover:text-blue-500 dark:group-hover:text-blue-400">
                                {{ $blog->title }}
                            </h3>

                            <!-- Short Description -->
                            <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}
                            </p>

                            <!-- Footer -->
                            <div class="flex items-center justify-between">
                                <a href="{{ url('/blogs/' . $blog->slug) }}"
                                    class="inline-flex items-center text-blue-500 dark:text-blue-400 font-semibold hover:text-blue-600 dark:hover:text-blue-300">
                                    Read More
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </article>
                    @endforeach

                </div>

                <!-- View All Blogs Button -->
                <div class="text-center">
                    <a href="{{ url('/blogs') }}">
                        <button
                            class="px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-lg hover:from-blue-600 hover:to-indigo-600 transform hover:scale-105 transition-all duration-300 shadow-xl">
                            View All News Posts
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white pt-16 pb-8 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">C</span>
                        </div>
                        <span class="text-2xl font-bold">CADADDA</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Autodesk Authorized CAD/CAM Training Institute providing industry-standard education since 2017.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Our Courses</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Admission
                                Process</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Student
                                Portal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a>
                        </li>
                    </ul>
                </div>

                <!-- Courses -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Popular Courses</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">AutoCAD</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">3DS Max</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Revit
                                Architecture</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">SolidWorks</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Interior
                                Design</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400 " fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">PL No-8, Behind mahaveer complex, Opp. Bheru bagh jain Mandir, C road, Sardarpura, Jodhpur, Rajasthan, 342001</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400">9261077888</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400"><a href="mailto:info@cadadda.com" class="m-0">info@cadadda.com</a></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 dark:border-gray-700 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">
                        © 2025 CADADDA. All rights reserved. | Autodesk Authorized Training Institute
                    </p>
                    <div class="flex space-x-6">
                        <a href="{{ route('refund.policy') }}">Refund Policy</a>

                        <a href="{{ route('terms.conditions') }}" class="text-gray-400 hover:text-white">
                            Terms of Service
                        </a>
                        <a href="{{ route('privacy.policy') }}" class="text-gray-400 hover:text-white">
                            Privacy Policy
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Dark mode functionality
        function toggleDarkMode() {
            const html = document.documentElement;
            const sunIcon = document.getElementById('sunIcon');
            const moonIcon = document.getElementById('moonIcon');

            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Check for saved theme preference or default to light mode
        function initializeTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const html = document.documentElement;
            const sunIcon = document.getElementById('sunIcon');
            const moonIcon = document.getElementById('moonIcon');

            if (savedTheme === 'dark') {
                html.classList.add('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                html.classList.remove('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        }

        // Initialize theme on page load
        document.addEventListener('DOMContentLoaded', initializeTheme);

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });

        // Counter animation for statistics
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target'));
                const suffix = counter.getAttribute('data-suffix');
                const duration = 2000; // 2 seconds duration
                const steps = 60; // 60 steps for smooth animation
                const stepValue = target / steps;
                let currentStep = 0;

                const timer = setInterval(() => {
                    currentStep++;
                    const currentValue = stepValue * currentStep;

                    if (currentStep <= steps) {
                        if (target >= 1000) {
                            counter.innerText = (currentValue / 1000).toFixed(1) + (suffix || '');
                        } else if (target % 1 !== 0) {
                            counter.innerText = currentValue.toFixed(1) + (suffix || '');
                        } else {
                            counter.innerText = Math.floor(currentValue) + (suffix || '');
                        }

                        // Add highlight effect
                        counter.classList.add('animate');
                        setTimeout(() => counter.classList.remove('animate'), 200);
                    } else {
                        // Set final value
                        if (target >= 1000) {
                            counter.innerText = (target / 1000).toFixed(1) + (suffix || '');
                        } else if (target % 1 !== 0) {
                            counter.innerText = target + (suffix || '');
                        } else {
                            counter.innerText = target + (suffix || '');
                        }
                        clearInterval(timer);
                    }
                }, duration / steps);
            });
        }

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe the stats section
        document.addEventListener('DOMContentLoaded', function() {
            const statsSection = document.querySelector('section:nth-of-type(2)'); // The stats section
            if (statsSection) {
                counterObserver.observe(statsSection);
            }
        });
    </script>

</body>

</html>