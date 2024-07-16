<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Institute</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
<style>
           .accordion-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f7f7f7; /* Add background color */
            border: 1px solid #ddd; /* Add border */
            border-radius: 0; /* Remove border radius */
            color: #333; /* Change text color */
             /* Make text bold */
        }
        .accordion-button:not(.collapsed) {
            background-color: #e9ecef; /* Change background color when expanded */
        }
        .right-item{
          margin-left:auto;
          
        }
        .accordion-button span {
            display: flex;
            justify-content: space-between;
           
            margin-left:auto;
        }
        .accordion-button span .info {
             /* Add margin between elements */
             margin:15px;
            font-size: 0.9rem; /* Adjust font size */
            color: #666; /* Change text color */
        }
        .space{
          width:25%;
          margin-left: auto;
        } 
        .accordion-button span .info span.number {
            color: #ff6347; /* Default color for numbers */
        }
        .accordion-body {
            padding: 1rem;
            font-size: 1rem;
            height: auto;
            margin-bottom: 1rem; /* Add bottom margin */
            background-color: #fff; /* Add background color */
            border: 1px solid #ddd; /* Add border */
        }
        .accordion-item {
            margin-bottom: 1rem; /* Add space between items */
        }
        .live-classes span.number {
            color: #007bff; /* Color for Live Classes numbers */
        }
        .projects span.number {
            color: #28a745; /* Color for Projects numbers */
        }
        .assignments span.number {
            color: #dc3545; /* Color for Assignments numbers */
        }

        /* .icon-box {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .icon-box:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        } */
        .faq-section {
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
        .cta-section {
            background-color: #f3f3f6;
            color: #fff;
            padding: 2rem 0;
            text-align: center;
            color: #333;
        }
        .cta-section input {
            max-width: 200px;
            margin-right: 1rem;
        }
</style>
  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>CADADDA </em>  website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          Edu Institute
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                       <!--**   <li><a href="meetings.html">Meetings</a></li> **-->
                          <li class="scroll-to-section"><a href="#apply">About us</a></li>
                          <li class="scroll-to-section"><a href="#courses">Events</a></li> 
                          <li class="scroll-to-section"><a href="{{route('courses')}}">Courses</a></li>
                          <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Get all details</h6>
          <h2>Online Teaching and Learning Tools</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>$14.00</span>
                  </div>
                  <div class="date">
                    <h6>Nov <span>12</span></h6>
                  </div>
                  <a href="meeting-details.html"><img src="assets/images/single-meeting.jpg" alt=""></a>
                </div>
                <div class="down-content">
                  <a href="meeting-details.html"><h4>OAUTOCAD</h4></a>
                 
                  <p class="description">
                  AutoCAD (Automatic computer added design) has been launched by Autodesk in 1982. AutoCAD is a software for 2D and 3D computer added design/drafting. AutoCAD is the first software used for the Computer Added Drafting. Breakers India limited was the first company which used auto CAD in India. Today AutoCAD is used in maximum types of industries, by architects, project managers, engineers, graphic designers, and other professionals. AutoCAD is Divided into 3 Parts (2D, PT and 3D). for testing <br>

            CADADDA in Jodhpur is a leading CAD Training provider in Jodhpur Rajasthan, having Great experience in AutoCAD Training. CADADDA is the only Autodesk Authorized Training center in Jodhpur Rajasthan providing Autodesk certification to the students.

             Starting with understanding the Interface of AutoCAD 2022, you will be amazed where you reach by the end of this course. With the wide applications of AutoCAD in Mechanical, Architecture and Civil fields, this is one software that you need to know to put down your engineering ideas on paper. Learn to draft 2D models, to apply constrains, dimension parts, to make 3D models in this well-structured course of AutoCAD.</p>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="hours">
                        <h5>Hours</h5>
                        <p>Monday - Friday: 07:00 AM - 13:00 PM<br>Saturday- Sunday: 09:00 AM - 15:00 PM</p>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="location">
                        <h5>Location</h5>
                        <p>Recreio dos Bandeirantes, 
                        <br>Rio de Janeiro - RJ, 22795-008, Brazil</p>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="book now">
                        <h5>Book Now</h5>
                        <p>010-020-0340<br>090-080-0760</p>
                        
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="book now">
                        <h5>Course Price: </h5>
                        <p><i class="bi bi-currency-rupee"></i> 12000 + GST</p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="share">
                        <h5>Share:</h5>
                        <ul>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#">Twitter</a>,</li>
                          <li><a href="#">Linkedin</a>,</li>
                          <li><a href="#">Behance</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container mt-5 text-light">
              <h3>Full Stack Developer Course Syllabus</h3>
              <p class="text-light m-1"> Explore the curriculum designed according to the industry standards!</p>
              <div class="coursedetail d-flex my-4  ">
                 <div class="coursedetail-1 col-10 rounded-pill border text-light  align-items-center d-flex  flex-wrap bg-warning text-center">
                  <div class="item-course-detail border-end mx-2 col-3 ">
                    <p class="text-light">Duration</p>
                    <h5>5 Months</h5>
                  </div>
                  <div class="item-course-detail border-end col-2">
                    <p class="text-light">Mode</p>
                    <h5>Online</h5>
                  </div>
                  <div class="item-course-detail border-end col-3">
                    <p class="text-light"> Live Sessions</p>
                    <h5>
                      100+
                    </h5>
                  </div>
                  <div class="item-course-detail col-3">
                    <p class="text-light"> Projects</p>
                    <h5>15+</h5>
                  </div>
                 </div>
                
                  <div class="coursedetail-2 col-2 fs-5 fw-bold text rounded-pill border pt-2 text-light bg-warning align-items-center  text-center">Placement Support</div>
              </div>
              
              <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h4> Module 4  &nbsp &nbsp  CSS3</h4>  
                            <div class="space">&nbsp</div>
                              <span>
                                  <span class="info live-classes">Live Classes: &nbsp  <span class="number">4</span></span>
                                  <span class="info projects">Projects: &nbsp  <span class="number">1</span></span>
                                  <span class="info assignments">Assignments: &nbsp <span class="number">4</span></span>
                              </span>
                          </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                              Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                             <h4> Module 5  &nbsp &nbsp  HTML5</h4> 
                             <div class="space">&nbsp</div>
                              <span class="right-item">
                                  <span class="info live-classes">Live Classes: &nbsp <span class="number">4</span></span>
                                  <span class="info projects">Projects: &nbsp  <span class="number">2</span></span>
                              </span>
                          </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                              Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body.
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                           <h4>Module 6  &nbsp &nbsp JavaScript</h4> 
                           <div class="space">&nbsp</div>  
                              <span>
                                  <span class="info live-classes">Live Classes:  &nbsp <span class="number">16</span></span>
                                  <span class="info projects">Projects: &nbsp<span class="number">4</span></span>
                                  <span class="info assignments">Assignments: &nbsp <span class="number">7</span></span>
                              </span>
                          </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                              Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body.
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          


          <div class="container my-5 text-center text-light">
            <h2 class="my-5">Tools you will master</h2>
            <div class="row text-center  ">
                <div class="col-md-3 mb-4 ">
                    <div class="icon-box p-3 border rounded bg-light">
                        <img src="assets/images/360_F_223730334_0l31O1JBvtyw2B8Zkeu95LEqX0Y3PxjG.jp" alt="HTML5">
                        <p>HTML5</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="icon-box p-3 border rounded bg-light">
                        <img src="path/to/js-icon.png" alt="JavaScript">
                        <p>JavaScript</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 ">
                  <div class="icon-box p-3 border rounded bg-light">
                      <img src="assets/images/360_F_223730334_0l31O1JBvtyw2B8Zkeu95LEqX0Y3PxjG.jp" alt="HTML5">
                      <p>HTML5</p>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="icon-box p-3 border rounded bg-light">
                      <img src="path/to/js-icon.png" alt="JavaScript">
                      <p>JavaScript</p>
                  </div>
              </div>
              <div class="col-md-3 mb-4 ">
                <div class="icon-box p-3 border rounded bg-light">
                    <img src="assets/images/360_F_223730334_0l31O1JBvtyw2B8Zkeu95LEqX0Y3PxjG.jp" alt="HTML5">
                    <p>HTML5</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="icon-box p-3 border rounded bg-light">
                    <img src="path/to/js-icon.png" alt="JavaScript">
                    <p>JavaScript</p>
                </div>
            </div>
            <div class="col-md-3 mb-4 ">
              <div class="icon-box p-3 border rounded bg-light">
                  <img src="assets/images/360_F_223730334_0l31O1JBvtyw2B8Zkeu95LEqX0Y3PxjG.jp" alt="HTML5">
                  <p>HTML5</p>
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="icon-box p-3 border rounded bg-light">
                  <img src="path/to/js-icon.png" alt="JavaScript">
                  <p>JavaScript</p>
              </div>
          </div>
                <!-- Repeat for other icons -->
            </div>
        </div>

        <div class="cta-section b-flex">
          <h3 class="mb-3">Still Confused? Want to know more?</h3>
          <div class="d-flex justify-content-center align-items-center">
              <input type="tel"  class="form-control fs-4" id="inputGroup-sizing-lg" placeholder="+91">
              <button class="btn btn-warning btn-lg">Book Demo Now</button>
          </div>
          <p class="m-2">Secure your spot quickly—seats are filling fast! Don’t miss out—enroll now and take the first step towards transforming your career!</p>
          <!-- <div class="mt-4">
              <h4>WSCube Tech Graduates Have Been Hired By</h4>
              <div class="d-flex flex-wrap justify-content-center">
                  <img src="path/to/logo1.png" alt="Company Logo" class="m-2">
                  <img src="path/to/logo2.png" alt="Company Logo" class="m-2">
                  
              </div> -->
          </div>
      </div>

            <div class="container-fluid monter py-5">
              <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                  
                  <h2 class="mb-0 text-light">Meet Our Faculty</h2>
                </div>
                <div class="row g-4">
                  
                 
                  <div class="col-md-6 col-lg-4">
                    <div class="guide-item">
                      <div class="guide-img">
                        <div class="guide-img-efects">
                          <img src="{{ url('assets/images/pexels-moose-photos-170195-1036623.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                        
                      </div>
                      <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                          <h4 class="mt-3">Sonu Kanwar</h4>
                          <p class="mb-0">Designation</p>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <div class="col-md-6 col-lg-4">
                    <div class="guide-item">
                      <div class="guide-img">
                        <div class="guide-img-efects">
                          <img src="{{ url('assets/images/240_F_191850653_IkzN9vZTtOtJ8NTKLKOp8PlaY8iCk6Ls.jpg') }}" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                        
                      </div>
                      <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                          <h4 class="mt-3">Saloni</h4>
                          <p class="mb-0">Designation</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="guide-item">
                      <div class="guide-img">
                        <div class="guide-img-efects">
                          <img src="{{ url('assets/images/cheerful-dark-skinned-woman-smiling-broadly-rejoicing-her-victory-competition-among-young-writers-standing-isolated-against-grey-wall-people-success-youth-happiness-concept_273609-1246.avif') }}" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                       
                      </div>
                      <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                          <h4 class="mt-3">Jyoti Kanwar</h4>
                          <p class="mb-0">Designation</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Repeat for other guide items -->
                </div>
              </div>
            </div>

            <!-- FAQ -->
            <div class="container my-5">
              <h2>Frequently Asked Questions</h2>
              <div class="accordion" id="faqAccordion">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Question 1: What is Bootstrap 5?
                          </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                              Bootstrap 5 is a powerful, mobile-first front-end framework for faster and easier web development.
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Question 2: How do I install Bootstrap 5?
                          </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                              You can install Bootstrap 5 via CDN, npm, or yarn. Refer to the Bootstrap documentation for more details.
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Question 3: What are the new features in Bootstrap 5?
                          </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                              Bootstrap 5 includes a new utility API, updated forms, a refreshed grid system, and more. Check the Bootstrap documentation for a complete list of new features.
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- FAQ END -->



            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="{{url('/courses')}}">Back To Course List</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2024 Edu Course Co., Ltd. All Rights Reserved. 
          <br>
          developer: <a href="https://templatemo.com" target="_parent" title="free css templates">Deependra singh</a>
          <br>
          Distibuted By: <a href="https://themewagon.com" target="_blank" title="Build Better UI, Faster">INSTITUTE-MANAGEMENT</a>
        </p>
    </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>


  </body>

</html>
