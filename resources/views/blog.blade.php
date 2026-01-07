  @include('layout.headers') 


    <!-- Header -->

    <section class="text-center py-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Our Latest Blogs</h1>
        <p class="text-gray-600">Stay updated with the latest trends, tutorials, and insights.</p>
    </section>


    <!-- Blogs & Categories Section -->
    <!-- Blogs & Categories Section -->
    <section class="max-w-7xl mx-auto mt-4 px-6 pb-16">
        <div class="flex flex-col lg:flex-row gap-8 mt-3">

            <!-- Left: Blog Grid -->
            <div class="flex-1">
                <div id="blogGrid" class="grid gap-8 sm:grid-cols-2">
                    @foreach ($blogs as $blog)
                        <div class="blog-card bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition duration-300"
                            data-category="{{ $blog->category->name ?? 'Uncategorized' }}">
                            
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

                            <div class="p-6">
                                <span
                                    class="text-sm text-blue-600 font-medium uppercase">{{ $blog->category->name ?? 'Blog' }}</span>
                                <h2 class="text-xl font-bold text-gray-900 mt-2 mb-3">{{ $blog->title }}</h2>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ $blog->short_description }}
                                </p>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>{{ $blog->published_at?->format('M d, Y') }}</span>
                                    <a href="{{ route('blog.detail', $blog->slug) }}"
                                        class="text-blue-600 font-semibold hover:underline">Read More →</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Categories Table -->
            <div class="w-64 lg:w-72 flex-shrink-0">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Categories</h2>
                <div id="categoryFilter" class="flex flex-col gap-2">
                    <span data-category="all"
                        class="category-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium cursor-pointer hover:bg-gray-300 transition">
                        All
                    </span>
                    @foreach ($categories as $category)
                        <span data-category="{{ $category->name }}"
                            class="category-btn bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium cursor-pointer hover:bg-blue-200 transition">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>
    </section>


    <script>
        const categoryButtons = document.querySelectorAll('.category-btn');
        const blogCards = document.querySelectorAll('.blog-card');

        categoryButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.getAttribute('data-category');

                // Highlight active button
                categoryButtons.forEach(b => b.classList.remove('bg-gray-400', 'text-white'));
                btn.classList.add('bg-gray-400', 'text-white');

                blogCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    </script>


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
    </script>


</body>

</html>
