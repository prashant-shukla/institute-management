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
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
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
    <header class="bg-white dark:bg-gray-800 shadow-md dark:shadow-gray-900/50 sticky top-0 z-50 transition-colors duration-300">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">CADADDA</span>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button class="md:hidden text-gray-700 dark:text-gray-300 transition-colors duration-300" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>
                    <a href="#courses" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>
                    <a href="#event" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>
                    <a href="#gallery" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>
                    <a href="#jobs" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>
                    <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact Us</a>
                </div>
                
                <!-- Dark Mode Toggle & Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle" class="p-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleDarkMode()">
                        <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    
                    <button class="px-4 py-2 text-blue-500 dark:text-blue-400 border border-blue-500 dark:border-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors font-medium">
                        Sign in
                    </button>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                        Join Now
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden mt-4 md:hidden">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Home</a>
                    <a href="#courses" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Courses</a>
                    <a href="#event" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Event</a>
                    <a href="#gallery" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Gallery</a>
                    <a href="#jobs" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Jobs</a>
                    <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">Contact Us</a>
                    <div class="flex space-x-2 pt-3">
                        <button class="flex-1 px-4 py-2 text-blue-500 dark:text-blue-400 border border-blue-500 dark:border-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors font-medium">
                            Sign in
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                            Join Now
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

  <section class="bg-gradient-to-r from-indigo-500 to-purple-500 py-16 text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold">Placements</h1>
      <p class="mt-4 text-lg md:text-xl text-indigo-100">Our students shaping the future with successful careers</p>
    </div>
  </section>

 <!-- Page Content -->
<!-- Page Content -->
<div class="max-w-7xl mx-auto px-6 py-16">

  <!-- Placed Students (Slider) -->
  <h2 class="text-3xl font-bold text-gray-500 mb-6">🎓 Placed Students</h2>
  
  <div class="relative mb-6">
    <!-- Slider Container -->
    <div id="studentSlider" class="flex overflow-x-auto space-x-6 scroll-smooth pb-4 no-scrollbar">
      
      <!-- Student Card -->
      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Rohit Sharma</h3>
        <p class="text-gray-500 text-sm">Placed at TCS</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/women/45.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Priya Mehta</h3>
        <p class="text-gray-500 text-sm">Placed at Infosys</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/77.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Amit Verma</h3>
        <p class="text-gray-500 text-sm">Placed at Wipro</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Neha Singh</h3>
        <p class="text-gray-500 text-sm">Placed at Accenture</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/12.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Karan Joshi</h3>
        <p class="text-gray-500 text-sm">Placed at HCL</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Rohit Sharma</h3>
        <p class="text-gray-500 text-sm">Placed at TCS</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/women/45.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Priya Mehta</h3>
        <p class="text-gray-500 text-sm">Placed at Infosys</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/77.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Amit Verma</h3>
        <p class="text-gray-500 text-sm">Placed at Wipro</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Neha Singh</h3>
        <p class="text-gray-500 text-sm">Placed at Accenture</p>
      </div>

      <div class="min-w-[300px] bg-white rounded-xl shadow-lg p-6 text-center transition transform hover:scale-105 hover:shadow-2xl">
        <img src="https://randomuser.me/api/portraits/men/12.jpg" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500" alt="Student">
        <h3 class="mt-4 text-lg font-semibold">Karan Joshi</h3>
        <p class="text-gray-500 text-sm">Placed at HCL</p>
      </div>

    </div>

    <!-- Prev/Next Buttons -->
    {{-- <button onclick="slide(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700">
      ‹
    </button>
    <button onclick="slide(1)" class="absolute right-0 top-1/2 -translate-y-1/2 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700">
      ›
    </button> --}}
  </div>


<!-- JS -->
<script>
  const slider = document.getElementById("studentSlider");
  const scrollAmount = 300;

  function slide(direction) {
    slider.scrollBy({ 
      left: direction * scrollAmount, 
      behavior: "smooth" 
    });
  }

  // Auto Slide every 3 sec
  setInterval(() => {
    if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
      // agar end par hai to wapas start par le aao
      slider.scrollTo({ left: 0, behavior: "smooth" });
    } else {
      // warna aage slide karo
      slide(1);
    }
  }, 3000);
</script>

<!-- Hide Scrollbar CSS -->
<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>



    <!-- Placed in Last 2 Months -->
<h2 class="text-3xl font-bold text-gray-500 mb-6">⏳ Placed in Last 2 Months</h2>

<div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl p-10 shadow-lg mb-16 text-center 
            transition transform hover:scale-105 hover:shadow-2xl animate-vibrate">
  <p class="text-2xl md:text-3xl font-semibold">✨ 25 Students placed in the last 2 months</p>
  <p class="mt-3 text-indigo-100">We are proud of our students’ achievements and successful careers!</p>
</div>

<!-- Custom Vibrate Animation -->
<style>
@keyframes vibrate {
  0% { transform: translateX(0); }
  20% { transform: translateX(-2px); }
  40% { transform: translateX(2px); }
  60% { transform: translateX(-2px); }
  80% { transform: translateX(2px); }
  100% { transform: translateX(0); }
}

.animate-vibrate {
  animation: vibrate 0.4s linear infinite alternate;
}
</style>


<!-- Current Openings -->
<h2 class="text-3xl font-bold text-gray-500 mb-6">📢 Current Openings</h2>

<div class="flex flex-col md:flex-row items-center gap-8">
  
  <!-- Left Card -->
  <div class="bg-white border-l-4 border-indigo-500 rounded-xl shadow p-10 text-center 
              transition transform hover:scale-105 hover:shadow-2xl opacity-0 slide-left">
    <p class="text-6xl font-extrabold text-indigo-600">12</p>
    <p class="mt-4 text-xl font-semibold text-gray-700">Active Openings</p>
    <p class="text-sm text-gray-500">Exclusively for our students</p>
  </div>

  <!-- Right Card -->
  <div class="bg-white border-l-4 border-purple-500 rounded-xl shadow p-10 text-center 
              transition transform hover:scale-105 hover:shadow-2xl opacity-0 slide-right">
    <p class="text-6xl font-extrabold text-purple-500">08</p>
    <p class="mt-4 text-xl font-semibold text-gray-500">New Companies Hiring</p>
    <p class="text-sm text-gray-500">Great opportunities await!</p>
  </div>

</div>

<!-- Custom Animations -->
<style>
@keyframes slideLeft {
  from { opacity: 0; transform: translateX(-120px); }
  to { opacity: 1; transform: translateX(0); }
}

@keyframes slideRight {
  from { opacity: 0; transform: translateX(120px); }
  to { opacity: 1; transform: translateX(0); }
}

/* Initial hidden state */
.slide-left,
.slide-right {
  opacity: 0;
}

/* Animate when active */
.slide-left.active {
  animation: slideLeft 0.8s ease-out forwards;
}

.slide-right.active {
  animation: slideRight 0.8s ease-out forwards;
}
</style>

<script>
  // Scroll trigger animation
  document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".slide-left, .slide-right");
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("active");
        }
      });
    }, { threshold: 0.3 });

    cards.forEach(card => observer.observe(card));
  });
</script>


  </div>

 <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white pt-16 pb-8 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">C</span>
                        </div>
                        <span class="text-2xl font-bold">CADADDA</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Autodesk Authorized CAD/CAM Training Institute providing industry-standard education since 2017.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Our Courses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Admission Process</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Student Portal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a></li>
                    </ul>
                </div>
                
                <!-- Courses -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Popular Courses</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">AutoCAD</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">3DS Max</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Revit Architecture</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">SolidWorks</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Interior Design</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">123 Training Center, Education Hub, City - 110001</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-400">+91 98765 43210</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
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
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Refund Policy</a>
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
            anchor.addEventListener('click', function (e) {
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
                        // Format the number based on target type
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