@include('header')

@foreach($banners as $banner)
<section id="hero" >
  <div class="container d-flex align-items-center justify-content-center" style="background-image: url({{'/storage'.'/'.$banner->image_url[0]}}); background-repeat: no-repeat; background-size: cover; background-position: center;  height: 300px;">
      <div class="row align-items-center  ">
          <div class="col text-center ">
              <h2 class="  text-light">{{$banner->title}}</h2>
          
          </div>
      </div>    
  </div>
</section>
@endforeach 
<section id="event" class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="row g-4">
                            @foreach($events as $event)
                            <div class="col-lg-4 col-md-6">
                                <div class="card meeting-item">
                                    <div class="card-img-top position-relative">
                                        <div class="badge bg-primary text-white position-absolute" style="top: 10px; right: 10px;">
                                            {{$event->paid}}
                                        </div>
                                        <a href="meeting-details.html">
                                            <img src="{{ '/storage'.'/'.$event->photo }}" alt="" class="img-fluid" style="height: 220px; width: 100%; background-size: cover; ">
                                        </a>
                                        
                                        
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="date"> --}}
                                            {{-- <h6>Nov <span>12</span></h6> --}}
                                            {{-- <h6>{{$event->start_date}}</h6> --}}
                                        {{-- </div> --}}
                                        <a href="meeting-details.html" class="stretched-link">
                                            <h4 class="card-title">{{$event->name}}</h4>
                                        </a>
                                        <p class="card-text">{!! $event->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div> <!-- .row.g-4 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')