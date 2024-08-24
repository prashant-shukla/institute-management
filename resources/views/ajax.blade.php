<div class="row">
    @foreach($courses as $course)
     <div class="col-sm-6 col-lg-4 col-xl-3 mb-5 ">                  
      <div class="z-1 position-absolute m-4">
        <span class="badge text-white bg-secondary">New</span>
      </div>
      <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
        <a href="{{ url('/course'.'/'.$course->slug.'/'.$course->id)}}">
          <img src="{{ $course->image ? url('storage/' . $course->image) : 'front/images/item1.jpg' }}" class="img-fluid rounded-3" alt="image">
        </a>
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
      <a href="{{ url('/course'.'/'.$course->slug.'/'.$course->id)}}">
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