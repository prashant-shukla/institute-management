<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADADDA - Autodesk Authorized CAD/CAM Training Institute</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'slide-in': 'slideIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'slide-right': 'slideRight 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        slideIn: {
                            '0%': {
                                transform: 'translateX(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideRight: {
                            '0%': {
                                transform: 'translateX(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Slide animations */
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .slide-in-up {
            animation: slideInUp 0.8s ease-out forwards;
        }

        /* Initial states */
        .slide-in-left,
        .slide-in-right,
        .slide-in-up {
            opacity: 0;
        }

        /* Keyframes */
        @keyframes slideInLeft {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Counter animation styles */
        .counter {
            display: inline-block;
            transition: all 0.3s ease;
        }

        .counter.animate {
            transform: scale(1.1);
            color: #fbbf24;
        }

        /* Ensure animations work on all browsers */
        .slide-in-left,
        .slide-in-right,
        .slide-in-up {
            will-change: transform, opacity;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Header / Navbar -->
    <header
        class="bg-white dark:bg-gray-800 shadow-md dark:shadow-gray-900/50 sticky top-0 z-50 transition-colors duration-300">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span
                        class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">CADADDA</span>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="md:hidden text-gray-700 dark:text-gray-300 transition-colors duration-300"
                    onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>

                    <a href="{{ url('/Course') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>

                    <a href="{{ url('/events') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>

                    <a href="{{ url('/Gallery') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>

                    <a href="{{ url('/blogs') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Blogs</a>

                    <a href="{{ url('/placement') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>

                    <a href="{{ url('/Exams') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Exams</a>

                    <a href="{{ url('/contact') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact
                        Us</a>
                </div>


                <!-- Dark Mode Toggle & Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle"
                        class="p-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                        onclick="toggleDarkMode()">
                        <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button>

                  @php
    $user = auth()->user();
@endphp

@if($user)
    {{-- ✅ Logged-in user --}}
    <div class="relative flex items-center gap-3">

        <button onclick="document.getElementById('userMenu').classList.toggle('hidden')"
                class="flex items-center gap-2 focus:outline-none">
            <img src="{{ $user->profile_photo_url ?? asset('images/profile.jpg') }}"
                 class="w-8 h-8 rounded-full object-cover">

            <span class="text-gray-700 font-medium dark:text-gray-300">
                {{ $user->firstname }} {{ $user->lastname }}
            </span>
        </button>

        <!-- Dropdown -->
        <div id="userMenu"
             class="hidden absolute right-0 top-12 w-44 bg-white shadow-lg rounded-lg overflow-hidden z-50">
            <!-- <a href=" "
          
               class="block px-4 py-2 hover:bg-gray-100">
                Profile
            </a> -->

            <form method="POST" action="{{ route('web-logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </div>
    </div>
@else
    {{-- ❌ Guest user --}}
    <a href="{{ route('login') }}"
       class="px-4 py-2 text-blue-500 border border-blue-500 rounded-lg hover:bg-blue-50 transition-colors font-medium">
        Sign in
    </a>

    <a href="{{ route('register') }}"
       class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
        Join Now
    </a>
@endif


                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden mt-4 md:hidden">
                <div class="flex flex-col space-y-3">
                    <a href="#home"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>
                    <a href="#courses"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>
                    <a href="#event"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>
                    <a href="#gallery"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>
                    <a href="#jobs"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>
                    <a href="#contact"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact
                        Us</a>
                    <div class="flex space-x-2 pt-3">
                        <button
                            class="flex-1 px-4 py-2 text-blue-500 dark:text-blue-400 border border-blue-500 dark:border-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors font-medium">
                            Sign in
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                            Join Now
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>