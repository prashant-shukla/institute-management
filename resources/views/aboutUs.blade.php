@include('header')

@foreach ($banners as $banner)
    <section id="hero">
        <div class="container d-flex align-items-center justify-content-center"
            style="background-image: url({{ '/storage' . '/' . $banner->image_url[0] }}); background-repeat: no-repeat; background-size: cover; background-position: center;  height: 300px;">
            <div class="row align-items-center  ">
                <div class="col text-center ">
                    <h2 class="  text-light">{{ $banner->title }}</h2>

                </div>
            </div>
        </div>
    </section>
@endforeach



<section class="py-5  m-1">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2 class="text-uppercase text-dark fw-bold">About Us</h2>
                <p class="fs-4 text-dark mb-5">Our History</p>
                <p>Founded with a commitment to empowering learners, our journey in education began with a small team passionate about making knowledge accessible. Over the years, 
                    we've grown into a vibrant community, providing innovative resources and personalized support to help students succeed in an ever-evolving world of education.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 our-vision  m-0">
    <div class="container bg-primary-subtle rounded ">
        <div class="row py-3">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="">
                    <div class="">
                        <h2 class="text-uppercase  text-warning fw-bold ">Our Vision</h2>
                    </div>
                </div>
                <p class=" mt-3">We have a vision to improve ourselves and the student group over time in the field of
                    CAD/CAM. As we know that students are the future of industries in terms of technical growth and
                    advancement, we want to make them stronger as well as more technically proficient in their design
                    field so that they will become more productive for industries.</p>
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="">
                    <div class="">
                        <h2 class="text-uppercase  fw-bold pt-1 mb-0">Our Mission</h2>
                    </div>
                </div>
                <p class=" mt-3">Our mission is to provide training with a great combination of theory and practical
                    experience, making students productive and placing as many students as possible in industry
                    positions.</p>
            </div>
        </div>
    </div>
</section>
<section class="py-5 m-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="text-uppercase text-dark fw-bold">Our History</h2>
                <p class="fs-4 text-dark mb-4">Our Way of Success</p>
                <p class="text-muted">
                    Founded with a commitment to empowering learners, our journey in education began with a small team passionate about making knowledge accessible. Over the years,
                     we've grown into a vibrant community, providing innovative resources and personalized support to help students succeed in an ever-evolving world of education.
                </p>
                
                <!-- Timeline -->
                <div class="timeline">
                    <div class="timeline">
                        @foreach ($history as $item)
                            <div class="timeline-item mb-4">
                                <div class="timeline-date">
                                    <span class="date fw-bold text-primary">{{ $item->date }}</span>
                                </div>
                                <h4 class="text-dark fw-semibold">{{ $item->title }}</h4>
                                <p class="text-muted">{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Timeline vertical line -->
                    <div class="timeline-bar bg-primary"></div>
                </div>
            </div>
            
            <div class="col-lg-6 text-center">
                <img src="https://www.cadadda.com/upload/images/cadadda_slider1.png" alt="CADADDA Logo"
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>




<section id="teachers" class="padding-medium">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-semibold">Meet Our Team</h2>
            <p class="text-secondary">We build CADADDA with professional and love</p>
        </div>
     <div class="container swiper"> 
      <div class="slider-wrapper">
        <div class="card-list swiper-wrapper">
            @foreach ($mentors as $mentor)
            <div class="card-item swiper-slide">
                <img src="{{ url('storage/' . $mentor->image) }}" alt="User Image" class="user-image">
                <h2 class="user-name">{{  $mentor->name  }}</h2>
                <p class="user-profession">{{ $mentor->short_description }}</p>
               
            </div>
            @endforeach
        </div>
     <!-- Swiper Pagination and Navigation Buttons -->
     <div class="swiper-pagination"></div>
     <div class="swiper-button-prev"></div>
     <div class="swiper-button-next"></div>
   </div>
  </div>
 </div>
</section>



@include('footer')
