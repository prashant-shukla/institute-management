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
                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
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

                    <button
                        class="px-4 py-2 text-blue-500 dark:text-blue-400 border border-blue-500 dark:border-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors font-medium">
                        Sign in
                    </button>
                    <button
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                        Join Now
                    </button>
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

  <!-- Header Section -->
 <header class="relative bg-gradient-to-r from-indigo-500 via-purple-500 to-white-500 text-white py-20">
  <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1600x600/?autocad,architecture,design')] bg-cover bg-center opacity-20"></div>
  <div class="relative max-w-6xl mx-auto px-6 text-center">
    <h1 class="text-4xl md:text-6xl font-extrabold drop-shadow-lg">
      AutoCAD Mastery
    </h1>
    <p class="mt-4 text-lg md:text-xl text-indigo-100 max-w-2xl mx-auto">
      Learn 2D drafting, 3D modeling, and architectural design with real-world projects.
    </p>
    <button class="mt-8 bg-white text-indigo-500 px-8 py-3 rounded-full font-semibold shadow-lg hover:scale-105 hover:bg-indigo-50 transition-transform">
      🚀 Enroll Now
    </button>
  </div>
</header>


  {{-- <!-- Course Preview Cards -->
  <section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-5 gap-8 items-stretch">

        <!-- Left Small Card -->
        <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition p-4">
          <img src="https://source.unsplash.com/400x300/?student" alt="Learn" class="w-full h-40 object-cover rounded-lg" />
          <h4 class="mt-4 text-lg font-semibold group-hover:text-indigo-600">📚 Learn Anytime</h4>
          <p class="text-sm text-gray-600 mt-2">24/7 access from anywhere.</p>
        </div>

        <!-- Left Small Card -->
        <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition p-4">
          <img src="https://source.unsplash.com/400x300/?teacher" alt="Support" class="w-full h-40 object-cover rounded-lg" />
          <h4 class="mt-4 text-lg font-semibold group-hover:text-indigo-600">👨‍🏫 Expert Trainers</h4>
          <p class="text-sm text-gray-600 mt-2">Learn from industry experts.</p>
        </div>

        <!-- Middle Big Card (Video) -->
        <div class="group bg-white rounded-3xl shadow-2xl overflow-hidden md:col-span-1 md:row-span-2 hover:scale-105 transition-transform">
          <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
              title="Course Preview" allowfullscreen></iframe>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-bold group-hover:text-indigo-600">🎥 Course Preview</h4>
            <p class="text-base text-gray-600 mt-3">See what you’ll build inside.</p>
          </div>
        </div>

        <!-- Right Small Card -->
        <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition p-4">
          <img src="https://source.unsplash.com/400x300/?office" alt="Placement" class="w-full h-40 object-cover rounded-lg" />
          <h4 class="mt-4 text-lg font-semibold group-hover:text-indigo-600">💼 Placement Support</h4>
          <p class="text-sm text-gray-600 mt-2">We help you get hired fast.</p>
        </div>

        <!-- Right Small Card -->
        <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition p-4">
          <img src="https://source.unsplash.com/400x300/?success" alt="Career Growth" class="w-full h-40 object-cover rounded-lg" />
          <h4 class="mt-4 text-lg font-semibold group-hover:text-indigo-600">🚀 Career Growth</h4>
          <p class="text-sm text-gray-600 mt-2">Boost your future with top skills.</p>
        </div>
      </div>
    </div>
  </section> --}}

<!-- Course Preview Grid -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-8 items-stretch">

      <!-- Left Small Item -->
      <div class="flex flex-col justify-center items-center bg-gradient-to-b from-indigo-50 to-white rounded-3xl shadow-lg p-6 text-center hover:scale-105 transition-transform">
        <div class="text-4xl mb-3">📚</div>
        <h4 class="text-lg font-semibold text-gray-900 mb-2 hover:text-indigo-600">Learn Anytime</h4>
        <p class="text-sm text-gray-600">24/7 access from anywhere.</p>
      </div>

      <!-- Left Small Item -->
      <div class="flex flex-col justify-center items-center bg-gradient-to-b from-indigo-50 to-white rounded-3xl shadow-lg p-6 text-center hover:scale-105 transition-transform">
        <div class="text-4xl mb-3">👨‍🏫</div>
        <h4 class="text-lg font-semibold text-gray-900 mb-2 hover:text-indigo-600">Expert Trainers</h4>
        <p class="text-sm text-gray-600">Learn from industry experts.</p>
      </div>

      <!-- Middle Big Item (Video) -->
      <div class="md:col-span-1 md:row-span-2 relative rounded-3xl overflow-hidden shadow-2xl hover:scale-105 transition-transform">
        <div class="aspect-w-16 aspect-h-9">
          {{-- <iframe class="w-full h-full rounded-xl" src="https://youtu.be/o51t4R8W2wU" title="Course Preview" allowfullscreen></iframe> --}}
<iframe
  class="w-full h-full rounded-xl"
  src="https://www.youtube.com/embed/o51t4R8W2wU?autoplay=1&mute=1"
  title="Course Preview"
  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>

        </div>
        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-6">
          <h4 class="text-2xl font-bold text-white">🎥 Course Preview</h4>
          <p class="text-gray-200 mt-1">See what you’ll build inside.</p>
        </div>
      </div>

      <!-- Right Small Item -->
      <div class="flex flex-col justify-center items-center bg-gradient-to-b from-indigo-50 to-white rounded-3xl shadow-lg p-6 text-center hover:scale-105 transition-transform">
        <div class="text-4xl mb-3">💼</div>
        <h4 class="text-lg font-semibold text-gray-900 mb-2 hover:text-indigo-600">Placement Support</h4>
        <p class="text-sm text-gray-600">We help you get hired fast.</p>
      </div>

      <!-- Right Small Item -->
      <div class="flex flex-col justify-center items-center bg-gradient-to-b from-indigo-50 to-white rounded-3xl shadow-lg p-6 text-center hover:scale-105 transition-transform">
        <div class="text-4xl mb-3">🚀</div>
        <h4 class="text-lg font-semibold text-gray-900 mb-2 hover:text-indigo-600">Career Growth</h4>
        <p class="text-sm text-gray-600">Boost your future with top skills.</p>
      </div>

    </div>
  </div>
</section>




  <section id="certificate" class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    
    <!-- Heading -->
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
        Industry Recognized & Government Approved Certification
      </h2>
      <p class="text-gray-600 mt-2">Boost your career with double certification advantage</p>
    </div>

    <!-- Certificates Grid -->
    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Internshala Certificate Card -->
      <div class="group bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-2">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 group-hover:text-indigo-600">
            Internshala Trainings Certificate
          </h3>
          <p class="text-gray-600 mt-2 text-sm leading-relaxed">
            100,000+ companies use Internshala for hiring every year. So a certificate 
            from Internshala is recognized everywhere.
          </p>
        </div>
        <div class="relative overflow-hidden">
          <img 
            src="https://training-comp-uploads.internshala.com/signup_page_media/prompt-ai-sample-certificate.png?v=4&v=v2" 
            alt="Internshala Certificate" 
            class="w-full h-64 object-contain p-4 transition-transform duration-300 group-hover:scale-105"
          >
          <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition bg-black/40">
            <span class="text-white text-sm bg-indigo-600 px-3 py-1 rounded-full">Zoom View</span>
          </div>
        </div>
      </div>

      <!-- NSDC Certificate Card -->
      <div class="group bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-2">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 group-hover:text-indigo-600">
            NSDC & Skill India Certificate
          </h3>
          <p class="text-gray-600 mt-2 text-sm leading-relaxed">
            Also, receive a certificate from NSDC (National Skill Development Corporation) 
            and Skill India, boosting your career credibility.
          </p>
        </div>
        <div class="relative overflow-hidden">
          <img 
            src="https://training-comp-uploads.internshala.com/signup_common/certificate-hero-nsdc.png" 
            alt="NSDC Certificate" 
            class="w-full h-64 object-contain p-4 transition-transform duration-300 group-hover:scale-105"
          >
          <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition bg-black/40">
            <span class="text-white text-sm bg-indigo-600 px-3 py-1 rounded-full">Zoom View</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>




<!-- About Section -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold">✨ About This Course</h2>
    <p class="mt-6 text-lg text-gray-600 leading-relaxed">
      Master AutoCAD for engineering, architecture, and design. Learn 2D drafting, 3D modeling, floor plans, and technical drawings. Complete real-world projects to enhance your skills and advance your career.
    </p>
  </div>
</section>


  <!-- Curriculum -->
<!-- AutoCAD Course Syllabus -->
<section id="syllabus" class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <!-- Heading -->
    <h2 class="text-4xl font-extrabold text-gray-900 mb-12 text-center">
      AutoCAD Course Training Syllabus
    </h2>

    <!-- Brief Info -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center mb-10">
      <div class="flex flex-col items-center">
        <img src="https://training-comp-uploads.internshala.com/signup_ab/features/icons-s/videos.png?v=5" alt="100 video tutorials" class="w-16 h-16 mb-2">
        <p class="text-gray-700 font-semibold">100 Video Tutorials</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="https://training-comp-uploads.internshala.com/signup_ab/features/icons-s/assignments.png?v=5" alt="10 assignments" class="w-16 h-16 mb-2">
        <p class="text-gray-700 font-semibold">10 Assignments</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="https://training-comp-uploads.internshala.com/signup_ab/features/icons-s/projects.png?v=5" alt="5 Projects" class="w-16 h-16 mb-2">
        <p class="text-gray-700 font-semibold">5 Projects</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="https://training-comp-uploads.internshala.com/signup_ab/features/icons-s/tools.png?v=5" alt="AutoCAD Tools Covered" class="w-16 h-16 mb-2">
        <p class="text-gray-700 font-semibold">15 AutoCAD Tools</p>
      </div>
    </div>

    <p class="text-center text-gray-600 mb-10">
      After completing the training, you can also download videos for future reference
    </p>

    <!-- Accordion Modules -->
    <div class="space-y-4">
      
      <!-- Module 1 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleAccordion(this)">
          <span class="font-semibold text-gray-900">Getting Started with AutoCAD</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Overview of AutoCAD Interface</li>
            <li>Basic Drawing Commands</li>
          </ul>
        </div>
      </div>

      <!-- Module 2 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleAccordion(this)">
          <span class="font-semibold text-gray-900">Intermediate AutoCAD Concepts</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Layer Management</li>
            <li>Advanced Drawing Commands</li>
            <li>Editing & Modifying Objects</li>
            <li>Dimensioning and Annotations</li>
          </ul>
        </div>
      </div>

      <!-- Module 3 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleAccordion(this)">
          <span class="font-semibold text-gray-900">3D Modeling & Visualization</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>3D Drawing & Modeling</li>
            <li>Rendering & Visualization</li>
            <li>Working with Materials & Lights</li>
            <li>Creating Animations</li>
          </ul>
        </div>
      </div>

      <!-- Module 4 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleAccordion(this)">
          <span class="font-semibold text-gray-900">Projects & Real-World Applications</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Mechanical Drafting Project</li>
            <li>Architectural Floor Plan Project</li>
            <li>3D Modeling Mini-Project</li>
          </ul>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- Accordion JS -->
<script>
  function toggleAccordion(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }
</script>



<section class="py-16 bg-blue-50">
  <div class="max-w-6xl mx-auto px-6 md:flex md:items-center md:justify-between gap-8">
    
    <!-- Course Info -->
    <div class="md:flex-1">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Diploma in Interior Design</h2>
      <p class="text-gray-600 mb-4">Learn industry-ready skills with projects & mentorship</p>

      <!-- Tags -->
      <div class="flex flex-wrap gap-2">
        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-medium">1 Year</span>
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Offline + Online support</span>
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">Certificate Included</span>
      </div>
    </div>

    <!-- Pricing & Enroll -->
    <div class="md:w-80 bg-white rounded-xl shadow-md p-6 flex flex-col gap-4">
      <div class="flex items-center justify-between">
        <div>
          <span class="text-2xl font-bold text-gray-900">₹45,000</span>
          <span class="text-gray-400 line-through ml-2">₹60,000</span>
        </div>
        <span class="bg-pink-100 text-pink-600 text-xs px-2 py-1 rounded-full">Limited seats</span>
      </div>

      <button class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition">
        Enroll Now
      </button>
      
      <button class="w-full border border-indigo-600 text-indigo-600 font-semibold py-3 rounded-lg hover:bg-indigo-50 transition">
        View Curriculum
      </button>

      <p class="text-xs text-gray-500 mt-2">
        Secure checkout via UPI / Cards. Instant confirmation.
      </p>
    </div>

  </div>
</section>



<!-- AutoCAD FAQ Section -->
<section id="faq" class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <!-- Heading -->
    <h2 class="text-4xl font-extrabold text-gray-900 mb-12 text-center">
      ❓ AutoCAD Course FAQs
    </h2>

    <div class="space-y-4">
      <!-- FAQ Item 1 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleFAQ(this)">
          <span class="font-semibold text-gray-900">What is AutoCAD and why should I learn it?</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <p class="text-gray-700">AutoCAD is a leading CAD software used for 2D drafting and 3D modeling. Learning it enhances your career in engineering, architecture, and design.</p>
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleFAQ(this)">
          <span class="font-semibold text-gray-900">Do I need prior experience to take this course?</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <p class="text-gray-700">No prior experience is required. This course is designed for beginners and gradually builds up to advanced AutoCAD skills.</p>
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleFAQ(this)">
          <span class="font-semibold text-gray-900">Will I work on real-world projects?</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <p class="text-gray-700">Yes! The course includes 2D drafting, 3D modeling, and architectural projects to give you hands-on experience.</p>
        </div>
      </div>

      <!-- FAQ Item 4 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleFAQ(this)">
          <span class="font-semibold text-gray-900">Can I get a certificate after completion?</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <p class="text-gray-700">Yes, you will receive a certificate upon successfully completing all course modules and projects.</p>
        </div>
      </div>

      <!-- FAQ Item 5 -->
      <div class="border rounded-xl bg-white shadow-sm">
        <button class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none group" onclick="toggleFAQ(this)">
          <span class="font-semibold text-gray-900">Is there placement assistance after this course?</span>
          <svg class="w-6 h-6 transform transition-transform group-rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
        <div class="px-6 pb-4 hidden">
          <p class="text-gray-700">Yes, we provide placement guidance and support to help you land internships or job opportunities in design and engineering fields.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Include Swiper CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>

<section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
  <div class="container mx-auto px-4">
    <h2
      class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white transition-colors duration-300">
      ⭐ What Our Students Say
    </h2>

    <!-- Swiper Slider -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md transition-colors duration-300">
          <div class="flex mb-4">
            <div class="text-yellow-400">★★★★★</div>
          </div>
          <p class="text-gray-700 dark:text-gray-300 mb-4 italic transition-colors duration-300">
            "AutoCAD training at CADADDA was amazing! The projects helped me understand real-world drafting and modeling."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full mr-3"></div>
            <div>
              <div class="font-bold text-gray-800 dark:text-white transition-colors duration-300">Siddharth Verma</div>
              <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">Mechanical Engineering Student</div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md transition-colors duration-300">
          <div class="flex mb-4">
            <div class="text-yellow-400">★★★★★</div>
          </div>
          <p class="text-gray-700 dark:text-gray-300 mb-4 italic transition-colors duration-300">
            "The instructors were very clear and supportive. I gained confidence in creating 3D models and floor plans."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full mr-3"></div>
            <div>
              <div class="font-bold text-gray-800 dark:text-white transition-colors duration-300">Ananya Singh</div>
              <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">Architecture Student</div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md transition-colors duration-300">
          <div class="flex mb-4">
            <div class="text-yellow-400">★★★★★</div>
          </div>
          <p class="text-gray-700 dark:text-gray-300 mb-4 italic transition-colors duration-300">
            "Thanks to CADADDA, I was able to complete my projects professionally. The skills I learned are now helping me in my job."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full mr-3"></div>
            <div>
              <div class="font-bold text-gray-800 dark:text-white transition-colors duration-300">Rohit Mehta</div>
              <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">Civil Engineering Student</div>
            </div>
          </div>
        </div>

      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
  });
</script>


<!-- FAQ Accordion JS -->
<script>
  function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }
</script>



  <!-- Call To Action -->
  <section class="py-20 bg-indigo-500 text-white text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1600x600/?code,developer')] bg-cover bg-center opacity-20"></div>
    <div class="relative z-10">
      <h2 class="text-4xl font-bold">🚀 Start Your Journey Today</h2>
      <p class="mt-4 text-indigo-200">Join 10,000+ students building their careers</p>
      <button class="mt-6 bg-white text-indigo-500 px-10 py-3 rounded-full font-semibold shadow-lg hover:scale-105 transition">
        Enroll Now
      </button>
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
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400 mt-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">123 Training Center, Education Hub, City - 110001</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400">+91 98765 43210</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400">info@cadadda.com</span>
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
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy
                            Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of
                            Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Refund
                            Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


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


</body>

</html>
