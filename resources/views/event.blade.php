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

<section id="event" class="mt-4">
   
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($events as $event)
                            <div class="tab-content pt-5" id="tab-content">
                                <div class="tab-pane active" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    <!-- start event block -->
                                    <div data-aos="zoom-in" class="container border border-1 rounded overflow-hidden my-5 p-0 aos-init aos-animate">
                                        <div class="row g-0">
                                            <div class="col-12 col-md-6 p-0">    
                                                <img src="{{ '/storage' . '/' . $event->photo }}" style="height: 50%;" alt="Event Image" class="img-fluid w-100 h-100">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                                                <div class="p-4">
                                                    <div class="mb-5">
                                                        <span class="me-5">
                                                            <i class="fa-solid fa-calendar-days me-2"></i>
                                                            Date:
                                                            @if ($event->start_date == $event->end_date)
                                                                {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-y') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-y') }}
                                                            @endif
                                                        </span>
                                                        <span><i class="fas fa-map-marker-alt me-2"></i> {{ $event->address }}</span>
                                                    </div>
                                                    <h5 class="mb-3 text-primary">{{ $event->name }}</h5>
                                                    <ul class="list-unstyled mb-3">
                                                        <li><i class="fa-solid fa-indian-rupee-sign me-3"></i> Price: {{ $event->paid }}</li>
                                                        <li><i class="fas fa-user me-2"></i> Speaker: {{ $event->organizer }}</li>
                                                    </ul>
                                                    <p class="mb-4">{!! $event->description !!}</p>
                                                    <!-- Register button to open modal -->
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventRegistrationModal">Register Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end event block -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        
                <!-- Modal structure -->
                <div class="modal fade" id="eventRegistrationModal" tabindex="-1" aria-labelledby="eventRegistrationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventRegistrationModalLabel">Event Registration</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Registration form content -->
                                <form action="{{ route('event.register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comments" class="form-label">Any comments/message</label>
                                        <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter any comments or message"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Are you attending?</label>
                                        <div>
                                            <input type="radio" id="attendYes" name="attending" value="Yes" required>
                                            <label for="attendYes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="attendNo" name="attending" value="No" required>
                                            <label for="attendNo">No</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>

@include('footer')
