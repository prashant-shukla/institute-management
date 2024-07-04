<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Institite</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous"> -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
  /* Custom styling for counters */
  .counter-section {
      background-color: #f8f9fa;
      padding: 50px 0;
      text-align: center;
    }

    .counter {
      font-size: 36px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .counter-description {
      font-size: 18px;
      color: #666;
    }
    .scroll-container{
      white-space: nowrap;
    }


</style>
</head>

<body>
  <div class="main w-100 ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary  bg-info px-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="{{ url('storage/5e2d35cae310960d8067c5b1f36afb95.png')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p> -->
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="{{ url('storage/8107aa03fcb853f343a2ec43062d79dc.png')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ url('storage/c8e245f31b3bb597a88a6a48c8d16976.png') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p> -->
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <section class="featured-one alert bg-info mt-5">
      <div class="auto-container">
        <div class="inner-container">
          <div class="row clearfix text-center ">
            <div class="text-center">
              <h2>CADADDA FEATURES</h2>
            <p>We are currently working in these fields</p>
            </div>
            <div class="row clearfix ">
            
               <div class="d-flex  justify-content-center">
                  <div class=" ms-5 text-center" style="width: 20rem;">
                   <div><i class="fa-solid fa-graduation-cap fa-2xl m-4"></i></div>
                    <div class="card-body text-center">
                      <h3>TRAINING / PROFESSIONAL CERTIFICATION</h3>
                      <p>We are one of Autodesk Authorized training center. we provide all Autodesk certification</p>
                    </div>
                  </div>
  
                  <div class=" ms-5 text-center" style="width: 20rem;">
                    <div><i class="fa-solid fa-briefcase fa-2xl m-4"></i></div>
                     <div class="card-body text-center">
                       <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                       <h3>PLACEMENT</h3>
                       <p>To Place our students we are having a great team with lots of updated jobs and other supporting things</p>
                     </div>
                   </div>
  
                   <div class=" ms-5 text-center" style="width: 20rem;">
                    <div><i class="fa-solid fa-gears fa-2xl m-4"></i></div>
                     <div class="card-body text-center">
                     <h3>CONSULTANCY</h3>
                       <p>We are having experts of different field to support you as per your requirment</p>
                     </div>
                   </div>
                </div>
                
              </div>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center mt-4">
      <h2>Build Your Career, Your Way
      </h2>
      <p>Build a career you love, live a life you love. <br>
        pen_spark
      </p>
      <div class="d-flex justify-content-center ">
        <div class="card " style="width: 18rem;">
          <img src="{{ url('/storage/mechcad.jpg')}}" style="height: 280px;" class="card-img-top" alt="...">
          <div class="card-body">
            <h3>MECHANICAL CAD</h3>
            <p class="card-text">This Course is Specially designed for Mechanical Engineers Want to Learn AutoCAD 2020,
              Solidworks, Fusion 360, CATIA etc. CADADDA is the only Autodesk.</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img src="/storage/CAD.jpg" class="card-img-top" style="height: 280px;" alt="...">
          <div class="card-body">
            <h3>CIVIL CAD</h3>
            <p class="card-text">This Course is designed for those students studying in Civil Engineering or working as
              a civil / Structure Engineer and Want to Learn AutoCAD 2020</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img src="/storage/banner-diploma-id2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3>DIPLOMA IN INTERIOR DESIGN</h3>
            <p class="card-text"> Interior design is the art and science of enhancing the Interior of a building or a
              Space to achieve a he.</p>
          </div>
        </div>
      </div>
    </div>
    <div class=" mt-4">
      <div class="text-center">
        <h2>Meet Our Faculty</h2>
        <p>Experience unparalleled guidance and <br>
          mentorship from our accomplished faculty,<br>
          shaping the leaders of tomorrow</p>
      </div>
      <div class="d-flex justify-content-center ">
        <div class="card" style="width: 18rem;">
          <img src="/storage/pexels-moose-photos-170195-1036623.jpg" class="card-img-top" alt="...">
          <div class="card-body text-center">
           
            <h3>john doe</h3>
            <p>faculty</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img
            src="{{ url('/storage/cheerful-dark-skinned-woman-smiling-broadly-rejoicing-her-victory-competition-among-young-writers-standing-isolated-against-grey-wall-people-success-youth-happiness-concept_273609-1246.avif')}}"
            class="card-img-top" alt="...">
          <div class="card-body text-center">
           
            <h3>jane smith</h3>
            <p>faculty</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img src="{{ url('/storage/240_F_191850653_IkzN9vZTtOtJ8NTKLKOp8PlaY8iCk6Ls.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body text-center ">
            <h3>michael johnson</h3>
            <p>faculty</p>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <div class="text-center">
        <h3>
          Hear from Our Happy Learners
        </h3>
        <p>We are proud to have positively influenced the career <br>
          foundations for thousands of learners across India and Asian countries</p>
      </div>
      <div class="d-flex justify-content-center ">
        <div class="card" style="width: 18rem;">
          <img src="/storage/pexels-moose-photos-170195-1036623.jpg" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            <h3>john doe</h3>
            <p>faculty</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img
            src="{{ url('/storage/cheerful-dark-skinned-woman-smiling-broadly-rejoicing-her-victory-competition-among-young-writers-standing-isolated-against-grey-wall-people-success-youth-happiness-concept_273609-1246.avif')}}"
            class="card-img-top" alt="...">
          <div class="card-body text-center">
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            <h3>jane smith</h3>
            <p>faculty</p>
          </div>
        </div>
        <div class="card ms-5" style="width: 18rem;">
          <img src="{{ url('/storage/240_F_191850653_IkzN9vZTtOtJ8NTKLKOp8PlaY8iCk6Ls.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body text-center ">
            <h3>michael johnson</h3>
            <p>faculty</p>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center">OUR CLIENTS</h2>
  
        <div class="scroll-container  p-2 overflow-auto nowrap-example p-1 bg-info">
          <img src="{{ url('/storage/7163_MayurakshiInstituteofEngineeringandTechnologyMIET_1429267328_medium1 (1).jpg')}}" class="img-fluid p-1" alt="Cinque Terre" width="250" height="100">
          <img src="{{ url('/storage/logo1 (1).jpg')}}" class="img-fluid p-1" alt="Forest" width="250" height="100">
          <img src="{{ url('/storage/about_jiet1.png')}}" class="img-fluid p-1" alt="Northern Lights" width="250" height="100">
          <img src="{{ url('/storage/M_B_M__Engineering_College_-_Logo1.png')}}" class="img-fluid p-1" alt="Mountains" width="250" height="100">
          <img src="{{ url('/storage/logo2.png')}}" class="img-fluid p-1" alt="Forest" width="250" height="100">
          <img src="{{ url('/storage/logo1.jpg')}}" class="img-fluid p-1" alt="Northern Lights" width="250" height="100">
          <img src="{{ url('/storage/web-logo11.png')}}" class="img-fluid p-1" alt="Mountains" width="250" height="100">
          <img src="{{ url('/storage/basant_handicraft.jpg')}}" class="img-fluid p-1" alt="Mountains" width="250" height="100">
        </div>
      </div>
      
    </div>
   
   <section class="counter-section w-100 bg-info text-light mt-5">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-4 mb-2">
          <div class=" text-light counter" data-target="3000">0 </div><i class="fa-solid fa-plus fa-l" style="color: #ffffff;"></i>
          <div class=" text-light counter-description">Happy Students</div>
        </div>
  
        <div class="col-lg-4 mb-2">
          <div class="counter text-light" data-target="20">0
            <br><p>Active Courses</p>
          </div>
          
          <div class="counter-description text-light">Active Courses</div>
        </div>
  
        <div class="col-lg-4 mb-2">
          <div class="counter text-light" data-target="1000">0</div>
          <div class="counter-description text-light">Non-tech. Students</div>
        </div>
  
      </div>
    </div>
  </section>
    <section>
    <div class="container mt-5">
        <div class="text-center">
        <h2>TESTIMONIALS</h2>
        <p>What Our Students Say About CADADDA</p>

        </div>
       <div>
        <img src="{{ url('/storage/106031.png') }}" style="height: 100px; with:16%;"   class="border-5  order-success" alt="">
       </div>
    </div> 
    </section>
  </div>
 
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select all counters
    const counters = document.querySelectorAll('.counter');
    
    // Options for IntersectionObserver
    const options = {
      root: null,
      rootMargin: '0px',
      threshold: 0.3 // When 30% of the element is visible
    };
    
    // IntersectionObserver callback function
    const callback = function(entries, observer) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = +entry.target.dataset.target;
          const updateCounter = function() {
            const currentCount = +entry.target.innerText;
            const increment = target / 100; // Speed of increment (adjust as needed)
            if (currentCount < target) {
              entry.target.innerText = Math.ceil(currentCount + increment);
              setTimeout(updateCounter, 20); // Speed of counter increment (adjust as needed)
            } else {
              entry.target.innerText = target;
            }
          };
          updateCounter();
        }
      });
    };
    
    // Create IntersectionObserver instance
    const observer = new IntersectionObserver(callback, options);
    
    // Observe each counter element
    counters.forEach(counter => {
      observer.observe(counter);
    });
  });
</script>


</html>