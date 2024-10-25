@include('header')

@foreach ($banners as $banner)
    <section id="hero"
        style="background-image:url({{ 'storage/' . $banner->image_url[0] }}); background-repeat: no-repeat; ">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 pe-5 mt-5 mt-md-0">
                    <h2 class="display-1 text-uppercase">{{ $banner->title }}</h2>
                    <p class="fs-4 my-4 pb-2">{{ $banner->description }}</p>
                    <div>
                        <form id="form" class="d-flex align-items-center position-relative ">
                            <input type="text" name="email" placeholder="what are you trying to learn?"
                                class="form-control bg-white border-0 rounded-4 shadow-none px-4 py-3 w-100">
                            <button
                                class="btn btn-primary rounded-4 px-3 py-2 position-absolute align-items-center m-1 end-0"><svg
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

<section class="category" id="category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="filters">
                            <ul>
                                <li data-filter="*" class="active">All Courses</li>
                                @foreach ($coursecategories as $coursecategory)
                                    <li data-filter="{{ $coursecategory->id }}">{{ $coursecategory->name }}</li>
                                    {{-- <li data-filter=".soon">Soon</li>
                  <li data-filter=".imp">Important</li>
                  <li data-filter=".att">Attractive</li> --}}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row grid " id="course">
                            <div class="row">
                                @foreach ($courses as $course)
                                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-5 ">
                                        <div class="z-1 position-absolute m-4">
                                            <span class="badge text-white bg-secondary">New</span>
                                        </div>
                                        <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
                                            <a href="{{ url('/course' . '/' . $course->slug . '/' . $course->id) }}">
                                                <img src="{{ $course->image ? url('storage/' . $course->image) : 'front/images/item1.jpg' }}"
                                                    class="img-fluid rounded-3" alt="image">
                                            </a>
                                            <div class="card-body p-0">
                                                <div class="d-flex justify-content-between my-3">
                                                    <p class="text-black-50 fw-bold text-uppercase m-0">
                                                        {{ $course->name }}</p>
                                                    <div class="d-flex align-items-center">
                                                        <svg width="30" height="30">
                                                            <use xlink:href="#clock" class="text-black-50"></use>
                                                        </svg>
                                                        <p class="text-black-50 fw-bold text-uppercase m-0">
                                                            {{ $course->course_duration }}</p>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/course' . '/' . $course->slug . '/' . $course->id) }}">
                                                    <h5 class="course-title py-2 m-0">{{ $course->site_title }}</h5>
                                                </a>
                                                <div class="card-text">
                                                    <span class="rating d-flex align-items-center mt-3">
                                                        <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                                                        <iconify-icon icon="clarity:star-solid"
                                                            class="text-primary"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid"
                                                            class="text-primary"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid"
                                                            class="text-primary"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid"
                                                            class="text-primary"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid"
                                                            class="text-primary"></iconify-icon>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
              <div class="pagination">
                <ul>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div> --}}
                    </div>
                </div>
            </div>
        </div>

</Section>


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
                        @foreach ($reviews as $review)
                            <div class="swiper-slide pe-md-5">
                                <div class="my-4">
                                    <p class="text-muted">{{ $review->review }} </p>
                                    <div class="row">
                                        <div class="col-3"> <img src="front/images/reviwer1.jpg" alt="img"
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <div class="col-9">
                                            {{-- ->user->firstname ->user->lastname --}}
                                            {{-- {{dd( $review->student_id)}} --}}
                                            {{-- {{$review->student_id}} --}}
                                            <h5 class="m-0 mt-2">
                                                {{ $review->student->user->firstname }}{{ $review->student->user->lastname }}
                                            </h5>
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
                        @foreach ($mentors as $mentor)
                            <li>
                                <figure class="active">
                                    <div class="rounded-3 ">
                                        <div>
                                            <img src="{{ url('storage/' . $mentor->image) }}"
                                                class="img-fluid rounded-3" alt="image">
                                        </div>
                                    </div>
                                    <figcaption>
                                        <h2>{{ $mentor->name }}</h2>
                                        <p>{{ $mentor->short_description }}</p>
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

@include('footer')
