  @include('layout.headers')

  <section id="top-banner-section" class="bg-gray-50 py-16">
      <div class="container mx-auto px-6 text-center">
          <!-- Heading -->
          <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
              Give the <span class="text-blue-600">Best Start</span> <br class="hidden md:block"> to your Career
          </h1>
          <p class="text-lg text-gray-600 mb-10">Learn, practice, and get hired!</p>

          <!-- Category Cards -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

              <!-- Card 1 -->
              <a href="#certification-courses" class="block group">
                  <div class="bg-white rounded-2xl shadow hover:shadow-lg p-6 transition relative overflow-hidden">
                      <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                          Certification Courses
                      </h3>
                      <p class="text-gray-600 mt-2">Learn in-demand skills and get certified</p>
                      <p class="text-sm text-gray-500 mt-4">Duration: 4–8 weeks</p>
                      <div class="mt-6 text-blue-600 font-medium flex items-center gap-2">
                          Explore now <span class="transition group-hover:translate-x-1">→</span>
                      </div>
                  </div>
              </a>

              <!-- Card 2 -->
              <a href="#placement-courses" class="block group">
                  <div class="bg-white rounded-2xl shadow hover:shadow-lg p-6 transition relative overflow-hidden">
                      <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                          Placement Guarantee Courses with AI
                      </h3>
                      <p class="text-gray-600 mt-2">Upskill and get a guaranteed placement</p>
                      <p class="text-sm text-gray-500 mt-4">Duration: 2–7 months</p>
                      <div class="mt-6 text-blue-600 font-medium flex items-center gap-2">
                          Explore now <span class="transition group-hover:translate-x-1">→</span>
                      </div>
                  </div>
              </a>

              <!-- Card 3 (example extra) -->
              <a href="#online-courses" class="block group">
                  <div class="bg-white rounded-2xl shadow hover:shadow-lg p-6 transition relative overflow-hidden">
                      <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                          Online Live Courses
                      </h3>
                      <p class="text-gray-600 mt-2">Interactive live classes with experts</p>
                      <p class="text-sm text-gray-500 mt-4">Duration: Flexible</p>
                      <div class="mt-6 text-blue-600 font-medium flex items-center gap-2">
                          Explore now <span class="transition group-hover:translate-x-1">→</span>
                      </div>
                  </div>
              </a>
          </div>
      </div>
  </section>



  <style>
      /* Marquee animation */
      @keyframes scroll-left {
          0% {
              transform: translateX(0%);
          }

          100% {
              transform: translateX(-50%);
          }
      }

      .marquee {
          display: flex;
          width: 200%;
          /* Double width for looping */
          animation: scroll-left 30s linear infinite;
      }
  </style>


  <section id="top-companies-section" class="py-10 bg-white shadow">
      <div class="container mx-auto">
          <h2 class="text-2xl font-bold text-center mb-6">Top companies hiring from us</h2>
          <div class="overflow-hidden relative w-full">
              <div class="marquee flex space-x-10">
                  @foreach ($clients as $client)
                  <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                      class="h-12 object-contain" />
                  @endforeach

                  {{-- Duplicate set for infinite scroll --}}
                  @foreach ($clients as $client)
                  <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                      class="h-12 object-contain" />
                  @endforeach
              </div>
          </div>
      </div>
  </section>




  <section id="second-fold-banner-section" class="container mx-auto px-4 py-12">
      <!-- Title -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
          <h3 class="text-xl font-bold text-gray-800">
              FEATURED COURSES
          </h3>
          <span class="text-sm text-gray-500 mt-2 sm:mt-0">
              Duration: 6-12 Weeks
          </span>
      </div>

      <!-- Heading + Offerings -->
      <div class="mt-6">
          <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 flex items-center gap-2">
              <span class="w-2 h-8 bg-indigo-600 rounded"></span>
              Learn & Upgrade Your Skills Online
          </h2>

          <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9
                    11.586 6.707 9.293a1 1 0 10-1.414
                    1.414l3 3a1 1 0 001.414 0l7-7a1 1
                    0 000-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-gray-700">100% Online Learning</span>
              </div>
              <div class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9
                    11.586 6.707 9.293a1 1 0 10-1.414
                    1.414l3 3a1 1 0 001.414 0l7-7a1 1
                    0 000-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-gray-700">Hands-on Projects</span>
              </div>
              <div class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9
                    11.586 6.707 9.293a1 1 0 10-1.414
                    1.414l3 3a1 1 0 001.414 0l7-7a1 1
                    0 000-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-gray-700">Industry-Recognized Certificate</span>
              </div>
          </div>
      </div>

      <!-- Banner Image -->
      <div class="mt-8">
          <img src="{{ asset('images/course banner cadadda.jpg') }}" alt="Students Learning Online"
              class="rounded-lg shadow-lg w-full object-cover" style="height:200px;">

      </div>

  </section>






  <div class="container mx-auto px-4 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

          <!-- ===== Left Side Category Tabs ===== -->
          <div class="space-y-4">
              <h2 class="text-lg font-bold text-gray-800">Categories</h2>
              <button class="category-tab w-full text-left px-6 py-3 bg-blue-500 text-white rounded-lg active"
                  data-target="offline">Offline Courses</button>
              <button class="category-tab w-full text-left px-6 py-3 bg-gray-200 text-gray-700 rounded-lg"
                  data-target="online">Online Courses</button>
              <button class="category-tab w-full text-left px-6 py-3 bg-gray-200 text-gray-700 rounded-lg"
                  data-target="certifications">Certifications</button>
          </div>

          <!-- ===== Right Side Courses Section ===== -->
          <div class="md:col-span-3 space-y-10">

              <!-- Offline Courses -->
              <div id="offline" class="course-section grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  @forelse($offlineCourses as $course)
                  <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}">
                      <div class="bg-white shadow rounded-xl overflow-hidden">
                          <div class="h-40 w-full">
                              @if ($course->image)
                              <img src="{{ asset('storage/' . $course->image) }}"
                                  alt="{{ $course->name }}" class="w-full h-full object-cover">
                              @else
                              <div class="h-full w-full bg-blue-500"></div>
                              @endif
                          </div>
                          <div class="p-5">
                              <h3 class="text-lg font-bold line-clamp-2"
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
                              <p class="text-gray-600">{{ $course->course_duration ?? 'N/A' }}</p>
                              <p class="text-sm text-gray-500 mt-2">{{ $course->short_description }}</p>

                              <div class="flex items-center justify-between mt-3">
                                  <p class="text-blue-600 font-semibold">
                                      ₹{{ number_format($course->offer_fee, 2) }}</p>
                                  <button
                                      class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                      Join Now
                                  </button>
                              </div>
                          </div>
                      </div>
                  </a>
                  @empty
                  <p class="text-gray-500">No offline courses available.</p>
                  @endforelse
              </div>

              <!-- Online Courses -->
              <div id="online"
                  class="course-section grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                  @forelse($onlineCourses as $course)
                  <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}">
                      <div class="bg-white shadow rounded-xl overflow-hidden">
                          <div class="h-40 w-full">
                              @if ($course->image)
                              <img src="{{ asset('storage/' . $course->image) }}"
                                  alt="{{ $course->name }}" class="w-full h-full object-cover">
                              @else
                              <div class="h-full w-full bg-purple-500"></div>
                              @endif
                          </div>
                          <div class="p-5">

                              <h3 class="text-lg font-bold line-clamp-2" style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">{{ $course->name }}</h3>
                              <p class="text-gray-600">{{ $course->course_duration ?? 'N/A' }}</p>
                              <p class="text-sm text-gray-500 mt-2">{{ $course->short_description }}</p>

                              <div class="flex items-center justify-between mt-3">
                                  <p class="text-blue-600 font-semibold">
                                      ₹{{ number_format($course->offer_fee, 2) }}</p>
                                  <button
                                      class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                      Join Now
                                  </button>
                              </div>
                          </div>
                      </div>
                  </a>
                  @empty
                  <p class="text-gray-500">No online courses available.</p>
                  @endforelse
              </div>

              <!-- Certifications -->
              <div id="certifications"
                  class="course-section grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                  @forelse($certifications as $course)
                  <a href="{{ route('course', ['slug' => $course->slug, 'id' => $course->id]) }}">
                      <div class="bg-white shadow rounded-xl overflow-hidden">
                          <div class="h-40 w-full">
                              @if ($course->image)
                              <img src="{{ asset('storage/' . $course->image) }}"
                                  alt="{{ $course->name }}" class="w-full h-full object-cover">
                              @else
                              <div class="h-full w-full bg-red-500"></div>
                              @endif
                          </div>
                          <div class="p-5">
                              <h3 class="text-lg font-bold line-clamp-2" style="
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.2em; /* यह line height × 2 के बराबर रखता है */
    line-height: 1.6em;
">{{ $course->name }}</h3>
                              <p class="text-gray-600">{{ $course->course_duration ?? 'N/A' }}</p>
                              <p class="text-sm text-gray-500 mt-2">{{ $course->short_description }}</p>

                              <div class="flex items-center justify-between mt-3">
                                  <p class="text-blue-600 font-semibold">
                                      ₹{{ number_format($course->offer_fee, 2) }}</p>
                                  <button
                                      class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                      Join Now
                                  </button>
                              </div>
                          </div>
                      </div>
                  </a>
                  @empty
                  <p class="text-gray-500">No certifications available.</p>
                  @endforelse
              </div>

          </div>

      </div>
  </div>





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
                      <span class="counter" data-target="10" data-suffix="K+">5K+</span>
                  </div>
                  <div class="text-blue-200 text-xs">Students Trained</div>
              </div>

              <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                  style="animation-delay: 0.4s;">
                  <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                      <span class="counter" data-target="200" data-suffix="+">20+</span>
                  </div>
                  <div class="text-blue-200 text-xs">Courses Available</div>
              </div>

              <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                  style="animation-delay: 0.5s;">
                  <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                      <span class="counter" data-target="4.5" data-suffix="/5">4.7/5</span>
                  </div>
                  <div class="text-blue-200 text-xs">Average Rating</div>
              </div>

              <div class="bg-white bg-opacity-10 backdrop-blur rounded-lg p-4 hover:bg-white hover:bg-opacity-20 transition-all duration-300 slide-in-up"
                  style="animation-delay: 0.6s;">
                  <div class="text-2xl md:text-3xl font-bold text-white mb-1">
                      <span class="counter" data-target="1.3" data-suffix="M+">5L+</span>
                  </div>
                  <div class="text-blue-200 text-xs">Training Hours</div>
              </div>
          </div>
      </div>
  </section>



  <section class="py-12 bg-gray-50">
      <div class="max-w-6xl mx-auto px-6">
          <!-- Heading -->
          <div class="text-center mb-10">
              <h2 class="text-3xl font-bold">Get the CADADDA Advantage</h2>
              <p class="text-gray-600 mt-2">The Edge Your Career Needs</p>
          </div>

          <!-- Cards Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

              <!-- Left Top Card -->
              <div class="bg-white rounded-lg shadow overflow-hidden md:grid-cols-5">
                  <img src="{{ asset('images/8d962eca86d21603dea99c65c8ab5427.jpg') }}" " alt=" Industry-Relevant Skills"
                      class="w-full h-30 object-cover">
                  <div class="p-4">
                      <h3 class="font-semibold text-lg">Industry-Relevant Skills</h3>
                      <p class="text-gray-600 mt-2">Master the tools and techniques top companies actually use.</p>
                  </div>
              </div>

              <!-- Left Bottom Card -->
              <div class="bg-white rounded-lg shadow overflow-hidden md:grid-cols-5">
                  <div class="grid grid-cols-2 gap-1 p-2">
                      <img src="{{ asset('images/2486fdc5ba1cbb823beb668dbdbbaedf.jpg') }}" class="w-full h-48 object-cover rounded">
                      <img src="{{ asset('images/18b3a8fde695ecd531249c7652c02411.jpg') }}" class="w-full h-48 object-cover rounded">
                      <img src="{{ asset('images/8d962eca86d21603dea99c65c8ab5427.jpg') }}" class="w-full h-48 object-cover rounded">
                      <img src="{{ asset('images/2486fdc5ba1cbb823beb668dbdbbaedf.jpg') }}" class="w-full h-48 object-cover rounded">
                  </div>
              </div>

              <!-- Middle Card (Video) -->
              <div class="bg-white rounded-lg md:grid-cols-4 shadow overflow-hidden md:row-span-2">
                  <iframe
                      class="w-full h-96 object-cover"
                      src="https://www.youtube.com/embed/o5IQUof7CKU?autoplay=1&mute=1&loop=1&playlist=o5IQUof7CKU"
                      title="YouTube video player"
                      frameborder="0"
                      allow="autoplay; encrypted-media"
                      allowfullscreen>
                  </iframe>


                  <div class="p-4">
                      <h3 class="font-semibold text-lg">Career Opportunities</h3>
                      <p class="text-gray-600 mt-2">Turn your skills into interviews, offers, and real impact.</p>
                  </div>
              </div>

              <!-- Right Top Card -->
              <div class="bg-white rounded-lg shadow overflow-hidden">

                  <iframe
                      class="w-full h-80"
                      src="https://www.youtube.com/embed/U1SXOcvphZg?autoplay=1&mute=1&loop=1&playlist=U1SXOcvphZg"
                      frameborder="0"
                      allow="autoplay; encrypted-media"
                      allowfullscreen>
                  </iframe>



              </div>


              <!-- Right Bottom Card -->
              <div class="bg-white rounded-lg shadow overflow-hidden md:grid-cols-5">
                  <img src="{{ asset('images/8d962eca86d21603dea99c65c8ab5427.jpg') }}" alt="Classroom Session"
                      class="w-full h-full object-cover">
              </div>

          </div>
      </div>
  </section>





  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <div class="max-w-7xl mx-auto px-6 py-10 relative">
      <h2 class="text-center text-2xl font-bold mb-6">
          CADADDA learners now shine at 200+ leading product companies
      </h2>

      <div class="flex justify-center gap-10 mb-6">
          <div class="bg-white-100 px-4 py-2 rounded-lg shadow">
              <p class="text-sm">Jobs On LinkedIn</p>
              <h3 class="text-xl font-bold text-blue-600">52,000+</h3>
          </div>
          <div class="bg-white-100 px-4 py-2 rounded-lg shadow">
              <p class="text-sm">Average Salary Hike</p>
              <h3 class="text-xl font-bold text-blue-600">90%</h3>
          </div>
      </div>

      <!-- Slider main container -->
      <div class="swiper mySwiper">
          <div class="swiper-wrapper">
              @foreach ($proudStudents as $proudStudent)
              <div class="swiper-slide flex justify-center items-stretch h-[300px]">
                  <div class="bg-white rounded-2xl shadow p-4 text-center w-full h-full">
                      <!-- Student Image -->
                      <img src="{{ asset('storage/' . $proudStudent->image) }}"
                          alt="{{ $proudStudent->name }}" class="mx-auto rounded-xl h-32 w-32 object-cover" />

                      <!-- Student Name -->
                      <h4 class="font-semibold h-15 mt-3">{{ $proudStudent->name }}</h4>

                      <!-- Fixed Text -->
                      {{-- <p class="text-sm text-gray-500">CADADDA Jodhpur</p> --}}

                      <!-- Company Placed -->
                      @if ($proudStudent->company)
                      <p class="text-xs text-gray-400 mt-1">Placed at {{ $proudStudent->company }}</p>
                      @endif
                  </div>
              </div>
              @endforeach
          </div>
      </div>

  </div>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



  <script>
      var swiper = new Swiper(".mySwiper", {
          slidesPerView: 8, // ✅ default 8 slides
          spaceBetween: 20,
          loop: true,
          autoplay: {
              delay: 500,
              disableOnInteraction: false,
          },
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          breakpoints: {
              320: {
                  slidesPerView: 1
              }, // mobile
              640: {
                  slidesPerView: 2
              }, // tablet
              1024: {
                  slidesPerView: 4
              }, // medium desktop
              1440: {
                  slidesPerView: 8
              }, // ✅ large screen
          },
      });
  </script>







  <!-- Company Feedback & Hiring Partners -->
  <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
      <div class="container mx-auto px-4">
          <h2
              class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white transition-colors duration-300">
              Company Feedback & Our Hiring Partners
          </h2>

          <!-- Testimonials -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
              @foreach ($testimonials as $testimonial)
              <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md transition-colors duration-300">
                  <!-- ⭐ Star Rating -->
                  <div class="flex mb-4">
                      @for ($i = 1; $i <= 5; $i++)
                          <span
                          class="{{ $i <= $testimonial->star_rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}">
                          ★
                          </span>
                          @endfor
                  </div>

                  <!-- Review -->
                  <p class="text-gray-700 dark:text-gray-300 mb-4 italic transition-colors duration-300">
                      "{{ $testimonial->review }}"
                  </p>

                  <!-- User Info -->
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

      </div>
  </section>

  <section id="advantages-section" class="py-12 bg-gray-50">
      <div class="max-w-6xl mx-auto px-6">

          <!-- Heading -->
          <div class="text-center mb-10">
              <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Advantage Icon"
                  class="mx-auto h-12 w-12 mb-4">
              <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                  Why Choose Us?
              </h2>
              <p class="text-gray-600 mt-2">
                  Learn, grow, and achieve your career goals with our trusted training programs
              </p>
          </div>

          <!-- Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

              <!-- Card 1 -->
              <div
                  class="bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl hover:scale-105 transition transform">
                  <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="Expert Mentors"
                      class="mx-auto h-16 w-16 mb-4">
                  <h3 class="text-lg font-semibold text-gray-800">Expert Mentors</h3>
                  <p class="text-gray-600 mt-2">Learn directly from industry experts with years of real-world
                      experience.</p>
              </div>

              <!-- Card 2 -->
              <div
                  class="bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl hover:scale-105 transition transform">
                  <img src="https://cdn-icons-png.flaticon.com/512/3135/3135773.png" alt="Career Support"
                      class="mx-auto h-16 w-16 mb-4">
                  <h3 class="text-lg font-semibold text-gray-800">Career Support</h3>
                  <p class="text-gray-600 mt-2">Get guidance, resume reviews, and interview preparation to land your
                      dream job.</p>
              </div>

              <!-- Card 3 -->
              <div
                  class="bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl hover:scale-105 transition transform">
                  <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png" alt="Certified Courses"
                      class="mx-auto h-16 w-16 mb-4">
                  <h3 class="text-lg font-semibold text-gray-800">Certified Courses</h3>
                  <p class="text-gray-600 mt-2">Earn globally recognized certificates to showcase your skills and
                      expertise.</p>
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

  <!-- Scripts -->
  <script>
      // Category Tabs Click Event
      const tabs = document.querySelectorAll(".category-tab");
      const sections = document.querySelectorAll(".course-section");

      tabs.forEach(tab => {
          tab.addEventListener("click", () => {
              // reset tabs
              tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white", "active"));
              tabs.forEach(t => t.classList.add("bg-gray-200", "text-gray-700"));

              // active tab
              tab.classList.remove("bg-gray-200", "text-gray-700");
              tab.classList.add("bg-blue-500", "text-white", "active");

              // show related section
              sections.forEach(sec => sec.classList.add("hidden"));
              document.getElementById(tab.dataset.target).classList.remove("hidden");
          });
      });
  </script>
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
  <!-- ===== JavaScript: Tabs Logic ===== -->
  <script>
      const tabs = document.querySelectorAll(".category-tab");
      const sections = document.querySelectorAll(".course-section");

      tabs.forEach(tab => {
          tab.addEventListener("click", () => {
              // remove active from all
              tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white", "active"));
              tabs.forEach(t => t.classList.add("bg-gray-200", "text-gray-700"));

              // hide all sections
              sections.forEach(sec => sec.classList.add("hidden"));

              // activate clicked tab
              tab.classList.remove("bg-gray-200", "text-gray-700");
              tab.classList.add("bg-blue-500", "text-white");

              // show related section
              document.getElementById(tab.dataset.target).classList.remove("hidden");
          });
      });
  </script>
  <script>
      // tailwind.config.js
      module.exports = {
          theme: {
              extend: {},
          },
          plugins: [
              require('@tailwindcss/line-clamp'),
          ],
      }
  </script>

  </body>

  ß

  </html>