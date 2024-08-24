@include('header')
  @foreach($banners as $banner)
  <section id="hero" style="background-image:url({{'storage/'.$banner->image_url[0]}}); background-repeat: no-repeat; ">
    
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 pe-5 mt-5 mt-md-0">
          <h2 class="display-1 text-uppercase">{{$banner->title}}</h2>
          <p class="fs-4 my-4 pb-2">{{$banner->description}}</p>
          <div>
            <form id="form" class="d-flex align-items-center position-relative ">
              <input type="text" name="email" placeholder="what are you trying to learn?"
                class="form-control bg-white border-0 rounded-4 shadow-none px-4 py-3 w-100">
              <button class="btn btn-primary rounded-4 px-3 py-2 position-absolute align-items-center m-1 end-0"><svg
                  xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                  <use href="#search" />
                </svg></button>
            </form>

          </div>
        </div>
        <div class="col-md-6 mt-5">
          <img src="front/images/billboard-img.jpg" alt="img" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
  @endforeach 
  <section id="features">
    <div class="feature-box container">
      <div class="row ">
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">1+</h2>
              <h6 class="feature-info text-uppercase">instructors</h6>

            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">20+</h2>
              <h6 class="feature-info text-uppercase">courses</h6>

            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">free</h2>
              <h6 class="feature-info text-uppercase">certifications</h6>

            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">3,000+</h2>
              <h6 class="feature-info text-uppercase">happy members</h6>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="about" class="padding-medium mt-xl-5">
    <div class="container">
      <div class="row align-items-center mt-xl-5">
        <div class="offset-md-1 col-md-5">
          <img src="front/images/about-img.jpg" alt="img" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-5 mt-5 mt-md-0">
          <div class="mb-3">
            <p class="text-secondary ">Learn more about us</p>
            <h2 class="display-6 fw-semibold">About Us</h2>
          </div>
          <p>
            CADADDA is a registered company and only Autodesk Authorized Training center in Jodhpur.
            CADADDA is a one of the experienced Center in Jodhpur.Providing training on software’s related to CAD/CAM in the streams of mechanical,
             Civil, Electrical and Architecture.
            </p>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>
          <a href="about.html" class="btn btn-primary px-5 py-3 mt-4">Learn more</a>


        </div>
      </div>
    </div>
  </section>

  <section id="category">
    <div class="container ">
      <div class="d-md-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary ">Pick your niche and get started</p>
          <h2 class="display-6 fw-semibold">Popular Categories</h2>
        </div>
        <div class="mt-4 mt-md-0">
          <a href="/categories" class="btn btn-primary px-5 py-3">View all categories</a>
        </div>
      </div>
      <div class="row g-md-3 mt-2">
        @foreach($coursecategories as $coursecategory)
        <div class="col-md-4">
          <div class="primary rounded-3 p-4 my-3">
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px">
                <use href="#pencil-box" class="svg-primary" />
              </svg>
              <div class="ps-4">
                <p class="category-paragraph fw-bold text-uppercase mb-1">{{$coursecategory->name}}</p>
                <p class="category-paragraph m-0">3 courses</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      

      </div>
    </div>
  </section>

  <section id="courses" class="padding-medium">
    <div class="container">
      <div class="text-center mb-5">
        <p class="text-secondary">Some of our most popular online courses</p>
        <h2 class="display-6 fw-semibold">Explore Inspiring Online Courses</h2>
      </div>

      <div class="row">
        @foreach($courses as $course)
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="{{ url('/course'.'/'.$course->id) }}"><img src="front/images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">{{$course->name}}</p>
                <div class="d-flex align-items-center">
                  <svg width="30" height="30">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">{{$course->course_duration}}</p>
                </div>
              </div>

              <a href="{{ url('/course'.'/'.$course->id) }}">
                <h5 class="course-title py-2 m-0">{{$course->site_title}}</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>
              </div>

            </div>
          </div>
        </div>
        @endforeach
       
      </div>

      <div class="text-center mt-4">
        <a href="/categories" class="btn btn-primary px-5 py-3">View all courses</a>
      </div>

    </div>
  </section>

  <section id="testimonial" class="padding-medium bg-primary-subtle">
    <div class="container">
      <div class="text-center mb-4">
        <p class="text-secondary ">What our students say about us</p>
        <h2 class="display-6 fw-semibold">Reviews</h2>
      </div>
    
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
                @foreach($reviews  as $review)
              <div class="swiper-slide pe-md-5">
                <div class="my-4">
                  <p class="text-muted">{{ $review->review }} </p>
                  <div class="row">
                    <div class="col-3"> <img src="front/images/reviwer1.jpg" alt="img" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-9">
                        {{-- ->user->firstname ->user->lastname --}}
                        {{-- {{dd( $review->student_id)}} --}}
                        {{-- {{$review->student_id}} --}}
                    <h5 class="m-0 mt-2">{{$review->student->user->firstname}}{{$review->student->user->lastname}}</h5>
                      <p class="text-muted">Web Developer</p>
                    </div>

                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="swiper-pagination"></div>

          </div>
        </div>
      </div>
    </div>


  </section>

  <section id="teacher" class="padding-medium">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-6 fw-semibold">Meet Our Team</h2>
        <p class="text-secondary">We build CADADDA with professional and love</p>
      </div>
     <div class="team">
       <div class="slider--teams">
        <div class="slider--teams__team">
          <ul id="list" class="cf">
            @foreach($mentors as $mentor)
             <li>
              <figure class="active">
                <div class="rounded-3 ">
                  <div>
                    <img src="{{ url('storage/' . $mentor->image) }}" class="img-fluid rounded-3" alt="image">
                  </div>
                </div>
              <figcaption>
                  <h2>{{ $mentor->name }}</h2>
                  <p>{{$mentor->short_description}}</p>
                </figcaption>
              </figure>
             </li>
            @endforeach
          </ul>
        </div>
       </div>

      </div>
    </div>
  </section>


  {{-- <section id="points" class="padding-medium pt-0">
    <div class="container">
      <div class="text-center">
        <p class="text-secondary ">What features we provide</p>
        <h2 class="display-6 fw-semibold">Core Features</h2>
      </div>
      <div class="row align-items-center mt-5">
        <div class="col-md-6 pe-md-5">

          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>

        </div>
        <div class="col-md-6 pe-md-5">

          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p>
          </div>

        </div>
      </div>
    </div>
  </section> --}}

  <section id="register">
    <div class="container padding-medium">
      <div class="row align-items-center">
        <div class="offset-md-1 col-md-5 ">
          <div>
            <h2 class="display-6 fw-semibold">Subscribe and get 20% OFF on your first online course </h2>
            <p class="text-secondary ">Sign Up for our newsletter and never miss any offers</p>
          </div>
        </div>
        <div class="col-md-5">
          <form id="form">
            <input type="email" name="email" placeholder="Write Your Email Address*"
              class="form-control bg-white border-0 rounded-4 shadow-none rounded-pill text-center px-4 py-3 w-100 mb-4">
            <div class="d-grid">
              <button class="btn btn-primary px-5 py-3"> Get Started now</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>
  

  <footer id="footer">
    <div class="container padding-medium ">
      <div class="row">
        <div class="col-sm-6 col-lg-4 my-3">
          <div class="footer-menu">
            <a href="index.html">
              <img src="front/images/logo.png" alt="logo" class="img-fluid">
            </a>
            <div class="social-links mt-4">
              <ul class="d-flex list-unstyled ">
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#facebook"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#twitter"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#instagram"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#linkedin"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#youtube"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Quick Links</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="/" class="footer-link">Home</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">About us</a>
              </li>
              <li class="menu-item mb-2">
                <a href="/categories" class="footer-link">Courses</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Blogs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">About</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">How It Works</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Pricing</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Promotion</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Affilation</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Help Center</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Payments</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">FAQs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Checkout</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Other</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Contact Us</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">contact@yourcompany</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">+110 4587 2445</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">New York, USA</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="footer-bottom">
    <hr class="text-black-50">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6 copyright">
          <p>© 2024 . All rights reserved.</p>
        </div>
        {{-- <div class="col-md-6 text-md-end">
            <p>Free HTML Template by: <a href="https://templatesjungle.com/" target="_blank" class="fw-bold">
                TemplatesJungle</a> Distributed by: <a href="https://themewagon.com" target="_blank" class="fw-bold">
                  ThemeWagon
                </a></p> 
          </div> --}}
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script> 
   document.addEventListener('DOMContentLoaded', () => {
    const sliderContainer = document.querySelector('.slider-container');
    const logoSlider = document.querySelector('.logo-slider');
    const logoImages = document.querySelectorAll('.logo-image');
    
    // Calculate the total width of the slider
    const logoWidth = logoImages[0].offsetWidth;
    const totalWidth = logoWidth * logoImages.length;
  
    // Set the width of the slider to the total width of logos
    logoSlider.style.width = totalWidth + 'px';
  
    // Pause animation on hover
    sliderContainer.addEventListener('mouseover', () => {
      logoSlider.style.animationPlayState = 'paused';
    });
  
    sliderContainer.addEventListener('mouseout', () => {
      logoSlider.style.animationPlayState = 'running';
    });
  
    // Clone the logo images to create a continuous sliding effect
    const clonedImages = Array.from(logoImages).map(img => img.cloneNode(true));
    clonedImages.forEach(img => logoSlider.appendChild(img));
   });
  
  
  
  
    var sliderTeam = (function(document) {
  
   'use strict';
  
   var sliderTeams = document.querySelector('.slider--teams'),
      list = document.querySelector('#list'),
      listItems = document.querySelectorAll('#list li'),
      nItems = listItems.length,
      nView = 3,
      autoSlider,
      current = 0,
      isAuto = true,
      acAuto = 2500,
  
      init = function() {
        initWidth();
        eventInit();
      },
  
      initWidth = function() {
        list.style.marginLeft = Math.floor(100 / nView) + '%';
        list.style.width = Math.floor(100 * (nItems / nView)) + '%';
        listItems.forEach(function(item) {
          item.style.width = 100 / nItems + '%';
        });
        sliderTeams.style.opacity = 1;
        sliderTeams.style.display = 'block';
        setTimeout(function() {
          sliderTeams.style.opacity = 1;
        }, 1000);
      },
  
      eventInit = function() {
  
        window.requestAnimFrame = (function() {
          return window.requestAnimationFrame       || 
                 window.webkitRequestAnimationFrame || 
                 window.mozRequestAnimationFrame    || 
                 window.oRequestAnimationFrame      || 
                 window.msRequestAnimationFrame     || 
                 function(callback) {
                   window.setTimeout(callback, 1000 / 60);
                 };
        })();
  
        window.requestInterval = function(fn, delay) {
          if (!window.requestAnimationFrame && 
              !window.webkitRequestAnimationFrame && 
              !window.mozRequestAnimationFrame && 
              !window.oRequestAnimationFrame && 
              !window.msRequestAnimationFrame) {
            return window.setInterval(fn, delay);
          }
          var start = new Date().getTime(),
              handle = {};
  
          function loop() {
            var current = new Date().getTime(),
                delta = current - start;
            if (delta >= delay) {
              fn.call();
              start = new Date().getTime();
            }
            handle.value = requestAnimFrame(loop);
          }
          handle.value = requestAnimFrame(loop);
          return handle;
        }
  
        window.clearRequestInterval = function(handle) {
          if (window.cancelAnimationFrame) {
            window.cancelAnimationFrame(handle.value);
          } else if (window.webkitCancelRequestAnimationFrame) {
            window.webkitCancelRequestAnimationFrame(handle.value);
          } else if (window.mozCancelRequestAnimationFrame) {
            window.mozCancelRequestAnimationFrame(handle.value);
          } else if (window.oCancelRequestAnimationFrame) {
            window.oCancelRequestAnimationFrame(handle.value);
          } else if (window.msCancelRequestAnimationFrame) {
            window.msCancelRequestAnimationFrame(handle.value);
          } else {
            clearInterval(handle);
          }
        };
  
        listItems.forEach(function(item, i) {
          item.addEventListener('touchstart', function(e) {
            e.preventDefault();
            stopMove(i);
            moveIt(item, i);
          });
          item.addEventListener('click', function(e) {
            e.preventDefault();
            stopMove(i);
            moveIt(item, i);
          });
        });
  
        autoSlider = requestInterval(autoMove, acAuto);
      },
  
      moveIt = function(obj, x) {
        var n = x;
  
        obj.querySelector('figure').classList.add('active');
        Array.from(listItems).forEach(function(item) {
          if (item !== obj) {
            item.querySelector('figure').classList.remove('active');
          }
        });
  
        list.style.transform = 'translateX(' + Math.floor((-(100 / nItems)) * n) + '%) translateZ(0)';
        list.style.transition = 'transform 1000ms cubic-bezier(0.4, 0, 0.26, 1)';
      },
  
      autoMove = function(currentSlide) {
        if (isAuto) { 
          current = Math.floor((current + 1) % nItems);
        } else {
          current = currentSlide;
        }
        // console.log(current);
        moveIt(listItems[current], current);
      },
  
      stopMove = function(x) {
        clearRequestInterval(autoSlider);
        isAuto = false;
        autoMove(x);
      };
  
   return {
    init: init
   };
  
   })(document);
  
   window.addEventListener('load', function() {
   'use strict';
    sliderTeam.init();
   });
  
  </script>

  <script src="front/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="front/js/plugins.js"></script>
  <script src="front/js/script.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>