

  

    <footer id="footer">
        <div class="container padding-medium ">
          <div class="row">
            <div class="col-sm-6 col-lg-4 my-3">
              <div class="footer-menu">
                <a href="/">
                  {{-- <img src="front/images/logo.png" alt="logo" class="img-fluid"> --}}
                  @if(setting('general.institute_logo') != null)
          <img src="{{ '/storage'.'/' . setting('general.institute_logo') }}" alt="logo" class="img-fluid">
      @else
          <span>{{ setting('general.institute_name') }}</span>
      @endif
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
                    <a href="#" class="footer-link">Courses</a>
                  </li>
                  <li class="menu-item mb-2">
                    <a href="#" class="footer-link">Blogs</a>
                  </li>
                  <li class="menu-item mb-2">
                    <a href="/contact" class="footer-link">Contact</a>
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
            <div class="col-md-6 text-md-end">
              {{-- <p>Free HTML Template by: <a href="https://templatesjungle.com/" target="_blank" class="fw-bold">
                  TemplatesJungle</a> Distributed by: <a href="https://themewagon.com" target="_blank" class="fw-bold">
                    ThemeWagon
                  </a></p> --}}
            </div>
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
      <script>
        $(document).ready(function() {
          $('.filters li').click(function() {
            var filter = $(this).data('filter');
        
            // Add active class to the clicked filter
            $('.filters li').removeClass('active');
            $(this).addClass('active');
        
            $.ajax({
              url: '{{ route('filter.courses') }}', // Route to your AJAX handler
              type: 'GET',
              data: {
                filter: filter
              },
              success: function(response) {
                $('#course').html(response); // Update the grid with the new courses
              },
              error: function(xhr) {
                console.log('Error:', xhr.responseText);
              }
            });
          });
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