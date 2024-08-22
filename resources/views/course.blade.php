<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Course </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

{{-- <link rel="stylesheet" type="text/css" href="../front/icomoon/icomoon.css"> --}}
<link rel="stylesheet" href="{{ asset('front/icomoon/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/vendor.css') }}">
<link rel="stylesheet" href="{{ asset('front/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

{{-- <link rel="stylesheet" type="text/css" href="../front/css/vendor.css">
<link rel="stylesheet" type="text/css" href="../front/style.css"> --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

</head>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol id="facebook" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 2.04c-5.5 0-10 4.49-10 10.02c0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89c1.09 0 2.23.19 2.23.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 0 0 8.44-9.9c0-5.53-4.5-10.02-10-10.02" />
      </symbol>
      <symbol id="youtube" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="m10 15l5.19-3L10 9zm11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73" />
      </symbol>
      <symbol id="instagram" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
      </symbol>
      <symbol id="twitter" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23" />
      </symbol>
      <symbol id="linkedin" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z" />
      </symbol>
      <symbol id="fitness" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.57 14.86L22 13.43L20.57 12L17 15.57L8.43 7L12 3.43L10.57 2L9.14 3.43L7.71 2L5.57 4.14L4.14 2.71L2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57L3.43 12L7 8.43L15.57 17L12 20.57L13.43 22l1.43-1.43L16.29 22l2.14-2.14l1.43 1.43l1.43-1.43l-1.43-1.43L22 16.29z" />
      </symbol>
      <symbol id="laptop" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M4 6h16v10H4m16 2a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4c-1.11 0-2 .89-2 2v10a2 2 0 0 0 2 2H0v2h24v-2z" />
      </symbol>
      <symbol id="camera" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3" />
      </symbol>
      <symbol id="handshake" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 8.71c1.25-1.25.68-2.71 0-3.42l-3-3c-1.26-1.25-2.71-.68-3.42 0L13.59 4H11C9.1 4 8 5 7.44 6.15L3 10.59v4l-.71.7c-1.25 1.26-.68 2.71 0 3.42l3 3c.54.54 1.12.74 1.67.74c.71 0 1.36-.35 1.75-.74l2.7-2.71H15c1.7 0 2.56-1.06 2.87-2.1c1.13-.3 1.75-1.16 2-2C21.42 14.5 22 13.03 22 12V9h-.59zM20 12c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-1v1c0 .45-.19 1-1 1h-4.41l-3.28 3.28c-.31.29-.49.12-.6.01l-2.99-2.98c-.29-.31-.12-.49-.01-.6L5 15.41v-4l2-2V11c0 1.21.8 3 3 3s3-1.79 3-3h7zm.29-4.71L18.59 9H11v2c0 .45-.19 1-1 1s-1-.55-1-1V8c0-.46.17-2 2-2h3.41l2.28-2.28c.31-.29.49-.12.6-.01l2.99 2.98c.29.31.12.49.01.6" />
      </symbol>
      <symbol id="speakerphone" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.84-5 6.7v2.07c4-.91 7-4.49 7-8.77c0-4.28-3-7.86-7-8.77M16.5 12c0-1.77-1-3.29-2.5-4.03V16c1.5-.71 2.5-2.24 2.5-4M3 9v6h4l5 5V4L7 9z" />
      </symbol>
      <symbol id="pencil-box" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 19V5H5v14zm0-16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-2.3 6.35l-1 1l-2.05-2.05l1-1c.21-.22.56-.22.77 0l1.28 1.28c.22.21.22.56 0 .77M7 14.94l6.06-6.06l2.06 2.06L9.06 17H7z" />
      </symbol>
      <symbol id="tick-circle" viewBox="0 0 15 15">
        <path fill="currentColor" fill-rule="evenodd"
          d="M0 7.5a7.5 7.5 0 1 1 15 0a7.5 7.5 0 0 1-15 0m7.072 3.21l4.318-5.398l-.78-.624l-3.682 4.601L4.32 7.116l-.64.768z"
          clip-rule="evenodd" />
      </symbol>
      <symbol id="clock" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.098 12.634L13 11.423V7a1 1 0 0 0-2 0v5a1 1 0 0 0 .5.866l2.598 1.5a1 1 0 1 0 1-1.732M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2m0 18a8 8 0 1 1 8-8a8.01 8.01 0 0 1-8 8" />
      </symbol>
      <symbol id="arrow-circle-right" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.71 12.71a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76a1 1 0 0 0-.21-.33l-3-3a1 1 0 0 0-1.42 1.42l1.3 1.29H9a1 1 0 0 0 0 2h3.59l-1.3 1.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0ZM22 12a10 10 0 1 0-10 10a10 10 0 0 0 10-10M4 12a8 8 0 1 1 8 8a8 8 0 0 1-8-8" />
      </symbol>
      <symbol id="search" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39M11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7" />
      </symbol>
      <symbol id="user-circle" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 2a10 10 0 0 0-7.35 16.76a10 10 0 0 0 14.7 0A10 10 0 0 0 12 2m0 18a8 8 0 0 1-5.55-2.25a6 6 0 0 1 11.1 0A8 8 0 0 1 12 20m-2-10a2 2 0 1 1 2 2a2 2 0 0 1-2-2m8.91 6A8 8 0 0 0 15 12.62a4 4 0 1 0-6 0A8 8 0 0 0 5.09 16A7.92 7.92 0 0 1 4 12a8 8 0 0 1 16 0a7.92 7.92 0 0 1-1.09 4" />
      </symbol>
      <symbol id="shopping-bag" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1m-9-1a2 2 0 0 1 4 0v1h-4Zm8 13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2Z" />
      </symbol>
      <symbol id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 5A6.29 6.29 0 0 0 12 4.36a6.27 6.27 0 0 0-8.16 9.48l6.21 6.22a2.78 2.78 0 0 0 3.9 0l6.21-6.22a6.27 6.27 0 0 0 0-8.84m-1.41 7.46l-6.21 6.21a.76.76 0 0 1-1.08 0l-6.21-6.24a4.29 4.29 0 0 1 0-6a4.27 4.27 0 0 1 6 0a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 0a4.29 4.29 0 0 1 .08 6Z" />
      </symbol>
    </defs>
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header mt-3">
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-4">
          <span>Your Cart</span>
          <span class="badge bg-primary rounded-circle pt-2 text-white">3</span>
        </h4>

        <ul class="list-group mb-4">
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Marketing Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$120</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Strategy Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$80</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Digital Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$50</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span class="fw-bold">Total (USD)</span>
            <strong>$250</strong>
          </li>
        </ul>

        <div class="d-grid my-5">
          <button class="btn btn-primary px-5 py-3" type="submit">Continue to checkout</button>
        </div>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
    aria-labelledby="Search">
    <div class="offcanvas-header mt-3">
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="order-md-last">
        <h4 class="text-primary text-uppercase mb-3">
          Search
        </h4>
        <div class="search-bar border rounded-2 border-dark-subtle">
          <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
            <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Here" />
            <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
          </form>
        </div>
      </div>
    </div>
  </div>

  <section id="top-nav" class="bg-secondary">
    <div class="text-center px-md-3 py-md-2">
      <p class="text-white py-1 m-0">Get your first course at 50% Discount. Offer lasts for the first 50 students only.
        <span><a href="account.html" class="text-white text-decoration-underline">Register now</a></span>
      </p>
    </div>
  </section>

  <nav class="main-menu d-flex navbar navbar-expand-lg p-2 py-3 p-lg-4 py-lg-4 ">
    <div class="container-fluid">
      <div class="main-logo d-lg-none">
        <a href="/">
          @if(setting('general.institute_logo') != null)
          <img src="{{ '/storage'.'/' . setting('general.institute_logo') }}" alt="logo" class="img-fluid">
      @else
          <span>{{ setting('general.institute_name') }}</span>
      @endif
        </a>
      </div>

      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header mt-3">
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body justify-content-between">
          <div class="main-logo">
            <a href="index.html">
              {{-- <img src="../front/images/logo.png" alt="logo" class="img-fluid"> --}}
              <img src="{{ asset('front/images/logo.png') }}" alt="logo">
            </a>
          </div>

          <ul class="navbar-nav menu-list list-unstyled align-items-lg-center d-flex gap-md-3 mb-0">
            <li class="nav-item">
              <a href="/" class="nav-link mx-2 active">Home</a>
            </li>
            <li class="nav-item ">
              <a href="/categories" class="dropdown-item">Course </a>
            </li>
          
          </ul>

          <div class="d-none d-lg-flex align-items-center">
            <ul class="d-flex  align-items-center list-unstyled m-0">
              <li>
                <a href="account.html" class="ms-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                    <use href="#user-circle" />
                  </svg> </a>
              </li>
              <li>
                <a href="wishlist.html" class="ms-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                    <use href="#heart" />
                  </svg> </a>
                </a>
              </li>

              <li class="">
                <a href="#" class="ms-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                  aria-controls="offcanvasCart">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                    <use href="#shopping-bag" />
                  </svg> </a>
                </a>
              </li>

              <li>
                <a href="#" class="ms-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
                  aria-controls="offcanvasSearch">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                    <use href="#search" />
                  </svg> </a>
                </a>
              </li>

            </ul>
          </div>

        </div>
      </div>

    </div>
    <div class="container-fluid d-lg-none">
      <div class="d-flex  align-items-end mt-3">
        <ul class="d-flex  align-items-center list-unstyled m-0">
          <li>
            <a href="account.html" class="me-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                <use href="#user-circle" />
              </svg> </a>
          </li>
          <li>
            <a href="wishlist.html" class="me-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                <use href="#heart" />
              </svg> </a>
            </a>
          </li>

          <li class="">
            <a href="#" class="me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
              aria-controls="offcanvasCart">
              <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                <use href="#shopping-bag" />
              </svg> </a>
            </a>
          </li>

          <li>
            <a href="#" class="me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
              aria-controls="offcanvasSearch">
              <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
                <use href="#search" />
              </svg> </a>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
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



  <section class="py-lg-5 py-4 overflow-hidden">
    <div class="container-xl">
      <div class="row gx-lg-5 gx-3 mb-lg-0 mb-4">
        <div class="col-lg-6 mb-lg-0 mb-4 text-lg-start  text-center">
          <h2 class="fs-4 fw-bold  mb-3  mar_top">How Does This Architectural Assistant course in cadadda Jodhpur Work?</h2>
          <p class="fs-6 text-muted mb-4"></p>
          <button class="btn btn-primary py-3 px-4 fs-5 fw-bold rounded-3 hover-shadow mx-lg-0 mx-auto d-lg-block d-none">Apply Now</button>
        </div>
        <div class="col-lg-6">
          <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col w-100 " >
              <div class="dashed p-4  rounded-start  border border-dark  border-end-0  position-relative">
                <div class="card-body d-flex align-items-center">
                  <div class="d-flex align-items-center me-md-3 text-center position-relative">
                    <img alt="Learn" width="85" height="85" src="https://d2kr1rbctelohj.cloudfront.net/images/courses-details/learn-icon.svg" class="img-fluid">
                  </div>
                  <div class="content">
                    <h3 class="fs-5 fw-bold mb-2">Learn <span class="badge bg-primary text-light ms-2">Live Classes <img src="https://d2kr1rbctelohj.cloudfront.net/images/icons/ellipse-icon.svg" alt="ellips-icon" width="4" height="4" class="ms-1"></span></h3>
                    <p class="fs-6 text-muted mb-0">Upskill yourself by gaining insights from leading professionals' vast experience.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col  w-100 " style="translate: 4px 0px; margin-top: -1px;">
              <div class="dashed p-4  border-start-0 rounded-end border-bottom border-end border-dark position-relative">
                <div class="card-body d-flex align-items-center">
                  <div class="d-flex align-items-center me-md-3 text-center position-relative">
                    <img alt="Practice" width="85" height="85" src="https://d2kr1rbctelohj.cloudfront.net/images/courses-details/practice-icon.svg" class="img-fluid">
                  </div>
                  <div class="content">
                    <h3 class="fs-5 fw-bold mb-2">Practice</h3>
                    <p class="fs-6 text-muted mb-0">Sharpen your skills by learning through course assignments, live projects, and regular assessments and quizzes.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col mt-0 w-100">
              <div class="dashed p-4  border-start rounded-start border-bottom border-dark position-relative">
                <div class="card-body d-flex align-items-center">
                  <div class="d-flex align-items-center me-md-3 text-center position-relative">
                    <img alt="Ask" width="85" height="85" src="https://d2kr1rbctelohj.cloudfront.net/images/courses-details/build-icon.svg" class="img-fluid">
                  </div>
                  <div class="content">
                    <h3 class="fs-5 fw-bold mb-2">Ask</h3>
                    <p class="fs-6 text-muted mb-0">Resolve your queries from industry experts with our dedicated one-to-one doubt-clearing sessions.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col mt-0 w-100" style="translate: 4px 0px; margin-top: -1px;">
              <div class="dashed p-4 border-start-0 rounded-end border-bottom border-end border-dark position-relative">
                <div class="card-body d-flex align-items-center">
                  <div class="d-flex align-items-center me-md-3 text-center position-relative">
                    <img alt="Build" width="85" height="85" src="https://d2kr1rbctelohj.cloudfront.net/images/courses-details/success-icon.svg" class="img-fluid">
                  </div>
                  <div class="content">
                    <h3 class="fs-5 fw-bold mb-2">Build</h3>
                    <p class="fs-6 text-muted mb-0">Craft a diverse portfolio and appealing resume, and optimize LinkedIn to showcase your data analytics skills.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary py-3 px-4 fs-5 fw-bold rounded-3 hover-shadow mx-lg-0 mx-auto d-lg-none d-block">Apply Now</button>
    </div>
  </section>
  
  
  

  <section class="py-lg-5 py-4 bg-light ">
    <div class="container">
        <div class="d-lg-flex justify-content-between align-items-start text-dark mb-lg-5 mb-4">
            <div class="mb-lg-0 mb-4 text-lg-start text-center">
                <h2 class="fs-3 fw-bold">Architectural Assistant course in cadadda Jodhpur</h2>
                <p class="fs-6 text-muted mb-0">A detailed overview of the course, including key topics, objectives, and module sequence.</p>
            </div>
            <button class="btn btn-primary  py-3 px-4 fw-bold rounded-3 shadow-sm">Download Curriculum</button>
        </div>
        <div class="mb-5 d-flex  ">
            <div class="d-flex col-12 detel justify-content-between border border-dark align-self-center p-2 " >
                <div class="d-flex align-items-center py-2 ">
                 
                    <img src="https://d2kr1rbctelohj.cloudfront.net/images/icons/duration-icon.svg" alt="duration" width="25" height="25" class="me-2">
                    <div>
                        <span class="text-muted">Duration</span>
                        <?php  
                     
                        ?>
                        <h6 class="mb-0 fw-bold">{{$course->course_duration}}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <img src="https://d2kr1rbctelohj.cloudfront.net/images/icons/mode-icon.svg" alt="mode" width="25" height="25" class="me-2">
                    <div>
                        <span class="text-muted">Mode</span>
                        <h6 class="mb-0 fw-bold">{{$course->mode}}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <img src="https://d2kr1rbctelohj.cloudfront.net/images/icons/live-sessions-icon.svg" alt="live sessions" width="25" height="25" class="me-2">
                    <div>
                        <span class="text-muted">Live Sessions</span>
                        <h6 class="mb-0 fw-bold">{{$course->sessions}}+ hrs</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <img src="https://d2kr1rbctelohj.cloudfront.net/images/icons/projects-icon.svg" alt="projects" width="25" height="25" class="me-2">
                    <div>
                        <span class="text-muted">Projects</span>
                        <h6 class="mb-0 fw-bold">{{$course->projects}}+</h6>
                    </div>
                </div>
               
            </div>
            {{-- <div class="d-none col-3  d-xl-block  border border-dark  text-center">
                <img src="https://d2kr1rbctelohj.cloudfront.net/images/courses-details/placement-img.svg" alt="placement support" width="85" height="105" class="me-3">
                <span class="fs-5 fw-bold">Placement Support</span>
            </div> --}}
        </div>
        <div class="accordion" id="curriculumAccordion">
         
          @foreach($coursesyllabuses as $syllabuses)
          <div class="accordion-item mb-3 rounded-3 border border-dark  bg-white">
            <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#module{{ $syllabuses->id }}" aria-expanded="false">
                <div class="d-lg-flex align-items-center justify-content-between w-100">
                    <h4 class="fs-16 fw-500 text-color-1 mb-0">
                        <span class="d-lg-inline-block d-none">Module {{ $loop->iteration }}</span>
                        <span class="d-lg-none d-inline-block">Module {{ $loop->iteration }}.</span> 
                        {{ $syllabuses->title }}
                    </h4>
                    <ul class="d-flex align-items-center mb-0 mr-10 flex-wrap ">
                      <?php
                      $colors = ['bg-warning', 'bg-info', 'bg-primary-subtle'];
                      ?>
                       
                        @foreach($syllabuses->extra_info as $index => $info)
                            @if($info['name'] && $info['value'])
                                <li class="px-2 py-1 text-nowrap d-flex align-items-center">
                                    <div class="text-color-2 min-w-19 min-h-19 sullybus-btn mx-1 text-center {{ $colors[$index % count($colors)] }}">
                                        {{ $info['value'] }}
                                    </div>
                                    <div>{{ $info['name'] }}</div>
                                </li>
                            @endif
                        @endforeach
                    
                    </ul>
                </div>
            </button>
            <div id="module{{ $syllabuses->id }}" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body px-3 py-2 star-list">
                    {!! $syllabuses->description !!}
                </div>
            </div>
        </div>
        
      @endforeach
      
      
            <!-- Additional modules would follow the same pattern -->
        </div>
        <div class="tool mt-5  container ">
          <div class="text-center mb-5">
            <h2>Tools you will master</h2>
          </div>
          <div class="slider-container">
            <div class="logo-slider">
              @foreach($coursetool as $tool)
              <img src="{{ url('storage/' . $tool->Tool->image) }}" class="logo-image"  alt="Client Logo 1">
              @endforeach
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
            @foreach($coursementors as $coursementor)
             <li>
              <figure class="active">
                <div class="rounded-3 ">
                  <div>
                    <img src="{{ url('storage/' . $coursementor->mentor->image) }}" class="img-fluid rounded-3" alt="image">
                  </div>
                </div>
              <figcaption>
                  <h2>{{ $coursementor->mentor->name }}</h2>
                  <p>{{$coursementor->mentor->short_description}}</p>
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






  <div class="container mb-5">
    <h2 class="mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
    
      @foreach($course->faqs as $faq)
          <div class="accordion-item">
              <h2 class="accordion-header" id="heading{{ $loop->index }}">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                      {{ $faq['question'] }}
                  </button>
              </h2>
              <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse " aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                      {{ $faq['answer'] }}
                  </div>
              </div>
          </div>
      @endforeach
 
 
    </div>
  </div>




  
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
                  
                    <div class="col-3"> <img src="{{ url('storage/' . $review->student->photo) }}" alt="img" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-9">
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

 

    <footer id="footer">
        <div class="container padding-medium ">
          <div class="row">
            <div class="col-sm-6 col-lg-4 my-3">
              <div class="footer-menu">
                <a href="index.html">
                  {{-- <img src="../front/images/logo.png" alt="logo" class="img-fluid"> --}}
                  <img src="{{ asset('front/images/logo.png') }}" alt="logo">
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
    
<script src="{{ asset('front/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('front/js/plugins.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
   
      <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    </body>
    
    </html>