<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institite</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    <style>
        /* Custom styling for counters */
        .counter-section {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
        }

        .slick-prev:before,
        .slick-next:before {
            color: #000;
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

        .testimonial {
            width: 450px;
        }

        .slick-slide {
            margin: 0 10px;
        }

        footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
        }

        footer .bg-secondary {
            background-color: #6c757d;
        }

        .testimonials-block {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .slider-item-wrapper {
            flex-grow: 1;
            min-width: 200px;
            max-width: 320px;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .testimonial-card {
            min-height: 454px;
            display: flex;
            align-items: flex-end;
            background-size: cover;
            background-position: center;
            padding: 20px;
            position: relative;
            border-radius: 16px;
            transition: transform 0.3s ease-in-out;
        }

        .review-text-content {
            display: flex;
            align-items: flex-end;
            width: 100%;
        }

        .btn-play-review {
            position: absolute;
            top: 20px;
            right: 20px;
            border: none;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .btn-play-review:hover {
            transform: scale(1.1);
        }

        .slider-item-wrapper:hover .testimonial-card {
            transform: scale(1.15);
        }

        .student-name {
            color: white;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 0;
        }
        .home-mentors {
    position: relative;
    display: inline-block; /* Ensures the hover effect is applied correctly */
}

.home-mentors img {
    display: block; /* Ensures the image is a block element, which helps with hover effects */
    transition: opacity 0.3s ease; /* Optional: Smooth transition effect */
}

.home-mentors h4 {
    position: absolute; /* Positions the heading relative to its container */
    bottom: 10px; /* Adjust based on desired position */
    left: 50%;
    transform: translateX(-50%); /* Center the heading horizontally */
    color: black; /* Adjust text color as needed */
    transition: opacity 0.3s ease; /* Optional: Smooth transition effect */
}

.home-mentors:hover h4 {
    opacity: 0; /* Hides the heading on hover */
}

/* Optional: Adding a hover effect on the image itself */
.home-mentors:hover img {
    opacity: 0.7; /* Slightly fades the image on hover */
}

.cards{
    position: relative;
    width: 300px;
    height: 100px;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.5) ;
    transition: 0.3s;
    background: #1212e0;
    cursor: pointer;
}
.imgbox{
    position: relative;
    width: 100%;
    height:100%;
    transform: translateY(-80px);

}
.imgbox img{
    width: 100%;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.5) ;
}
.cards:hover{
    height: 280px;
}
.content{
    padding: 10px 20px;
    text-align: center;
    transform: translateY(-400px);
    opacity: 0;
    transition: 0.3s;
    color: #fff;
}
.cards:hover >.content{
    opacity: 1;
    transform: translateY(-150px);
}
.flexboxs{
    margin-top: 300px;
}
    </style>
</head>

<body>
<div class="main w-100 ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary  bg-#0834d8 px-3">
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
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ url('storage/5e2d35cae310960d8067c5b1f36afb95.png') }}" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ url('storage/8107aa03fcb853f343a2ec43062d79dc.png') }}" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ url('storage/c8e245f31b3bb597a88a6a48c8d16976.png') }}" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
    <section class="featured-one alert bg-primary text-light mt-5">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix text-center ">
                        <div class="text-center">
                            <h2>CADADDA FEATURES</h2>
                            <p>We are currently working in these fields</p>
                        </div>
                        <div class="row clearfix ">

                            <div class="d-flex  justify-content-center">
                                <div class=" ms-5 text-center" style="width: 21rem;">
                                    <div><i class="fa-solid fa-graduation-cap fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">
                                        <h3>TRAINING / PROFESSIONAL CERTIFICATION</h3>
                                        <p>We are one of Autodesk Authorized training center. we provide all Autodesk
                                            certification</p>
                                    </div>
                                </div>

                                <div class=" ms-5 text-center" style="width: 17rem;">
                                    <div><i class="fa-solid fa-briefcase fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">

                                        <h3>PLACEMENT</h3>
                                        <p>To Place our students we are having a great team with lots of updated jobs
                                            and other supporting things</p>
                                    </div>
                                </div>

                                <div class=" ms-5 text-center" style="width: 16rem;">
                                    <div><i class="fa-solid fa-gears fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">
                                        <h3>CONSULTANCY</h3>
                                        <p>We are having experts of different field to support you as per your
                                            requirment</p>
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
            <div class="d-flex justify-content-center  ">
                <div class="card " style="width: 18rem;">
                    <img src="{{ url('/storage/mechcad.jpg') }}" style="height: 280px;" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h3>MECHANICAL CAD</h3>
                        <p class="card-text">This Course is Specially designed for Mechanical Engineers Want to Learn
                            AutoCAD 2020,
                            Solidworks, Fusion 360, CATIA etc. CADADDA is the only Autodesk.</p>
                    </div>
                </div>
                <div class="card ms-5" style="width: 18rem;">
                    <img src="/storage/CAD.jpg" class="card-img-top" style="height: 280px;" alt="...">
                    <div class="card-body">
                        <h3>CIVIL CAD</h3>
                        <p class="card-text">This Course is designed for those students studying in Civil Engineering
                            or working as
                            a civil / Structure Engineer and Want to Learn AutoCAD 2020</p>
                    </div>
                </div>
                <div class="card ms-5" style="width: 18rem;">
                    <img src="/storage/banner-diploma-id2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>DIPLOMA IN INTERIOR DESIGN</h3>
                        <p class="card-text"> Interior design is the art and science of enhancing the Interior of a
                            building or a
                            Space to achieve a he.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-4">
            <div class="text-center mb-3">
                <h2>Meet Our Faculty</h2>
                <p>Experience unparalleled guidance and <br>
                    mentorship from our accomplished faculty,<br>
                    shaping the leaders of tomorrow</p>
            </div>
            <div class="flexboxs mt-4">
            <div class="d-flex justify-content-center  ">
                <div class="cards ms-5 mt-5">
                    <div class="imgbox">
                     <img class="imgs" src="{{ url('/storage/pexels-moose-photos-170195-1036623.jpg') }}" alt="">
                    </div>
                    <div class="content">

                        <h3>john doe</h3>
                        <p>faculty</p>
                    </div>
                </div>
                <div class="cards ms-5 mt-5">
                    <div class="imgbox">
                     <img class="imgs" src="{{ url('/storage/cheerful-dark-skinned-woman-smiling-broadly-rejoicing-her-victory-competition-among-young-writers-standing-isolated-against-grey-wall-people-success-youth-happiness-concept_273609-1246.avif') }}" alt="">
                    </div>
                    <div class="content">
                        <h3>jane smith</h3>
                        <p>faculty</p>
                    </div>
                </div>

                <div class="cards ms-5 mt-5">
                    <div class="imgbox">
                     <img class="imgs" src="{{ url('/storage/240_F_191850653_IkzN9vZTtOtJ8NTKLKOp8PlaY8iCk6Ls.jpg') }}" alt="">
                    </div>
                    <div class="content">
                        <h3>michael johnson</h3>
                        <p>faculty</p>
                    </div>
                </div>
            </div>
            </div>
        </div>

    <section class="counter-section  bg-primary text-light mt-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 mb-2">
                        <div class=" text-light counter" data-target="3000">0</div>
                        <div class=" text-light counter-description">Happy Students</div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="counter text-light" data-target="20">0
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
    <section class="home-st-reviews pt-250 pb-100 d-lg-block d-none mt-5">
            <div class="container-main container-w-xl-1202">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>
                                Hear from Our Happy Learners
                            </h3>
                            <p>We are proud to have positively influenced the career <br>
                                foundations for thousands of learners across India and Asian countries</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="testimonials-block mt-lg-50 mt-20">
                <div class="home-page-slider-wrapper overflow-hidden pb-10">
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Aditiya_Mishra.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Aditiya</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Jayant_Ranawat.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Jayant</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Kanishka_Makhijani.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Kanishka</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Jitesh_Bhojwani.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Jitesh</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Pushpendra_Singh_Rathore.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Pushpendra</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item-wrapper">
                            <div class="testimonial-card"
                                style="background-image:url(https://d2kr1rbctelohj.cloudfront.net/images/home-images/Jigyasa_Kanwar.webp)">
                                <div class="review-text-content">
                                    <button class="btn-play-review">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                            class="svg-inline--fa fa-play fs-20" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20">
                                            <path fill="currentColor"
                                                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="review-text">
                                        <h3 class="student-name">Jigyasa</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="featured-one alert bg-primary text-light mt-5">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix text-center ">
                        <div class="text-center">
                            <h3>CADADDA JODHPUR NEW FEATURES</h3>
                            <p>We Shared some Awesome new features for you</p>
                        </div>
                        <div class="row clearfix ">

                            <div class="d-flex  justify-content-center">
                                <div class=" ms-5 text-center" style="width: 21rem;">
                                    <div><i class="fa-solid fa-book-open fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">
                                        <h3>ONLINE PRACTICE SHEETS AND BOOKS</h3>
                                        <p>we at Cadadda provides you books and practice books online in your CADADDA
                                            student pannel</p>
                                    </div>
                                </div>

                                <div class=" ms-5 text-center" style="width: 17rem;">
                                    <div><i class="fa-solid fa-mobile-screen-button fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">

                                        <h3>MOBILE APP</h3>
                                        <p>CADADDA having mobile app for you so that you can access your profile and
                                            data
                                            anytime anywhere</p>
                                    </div>
                                </div>

                                <div class=" ms-5 text-center" style="width: 16rem;">
                                    <div><i class="fa-solid fa-circle-play fa-2xl m-4"></i></div>
                                    <div class="card-body text-center">
                                        <h3>ONLINE COURSE VIDEO</h3>
                                        <p>CADADDA online course videos is totally free for the students passed from
                                            here.
                                            you can access it from your student pannel</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
            <div class="container mt-5">
                <div class="text-center">
                    <h3>TESTIMONIALS</h3>
                    <p>What Our Students Say About CADADDA</p>
                </div>
                <div class="testimonials">
                    <div class=" d-flex  m-1 ">
                        <div class="d-flex border testimonial m-1 w-100 border-primary rounded-4 ">
                            <img class="rounded-circle m-1 text-center " src="https://via.placeholder.com/80"
                                alt="">
                            <div class="content m-2 mt-5">
                                <p>"Great institution I ever have.. Faculty are very good in teaching manner."</p>
                                <h3>Payal Jain</h3>
                            </div>
                        </div>
                        <div class="d-flex border m-1 border-primary w-100 rounded-4 testimonial ">
                            <img class="rounded-circle m-1 text-center border-primary "
                                src="https://via.placeholder.com/80" alt="">
                            <div class="content m-2 mt-5">
                                <p>"Great institution I ever have.. Faculty are very good in teaching manner."</p>
                                <h3>Payal Jain</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="bg-primary mt-5 pt-2 pb-2">
        <div class="blog ">

            <div class="heading text-center text-light mt-3  ">
                <h2 class="mt-3">FROM OUR BLOG</h2>
                <p>We Shared Awesome Articles for Your Next Sites</p>
            </div>
            <div class=" slick-class container p-1 responsives">
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
                <div class="card m-2">
                    <iframe src="https://www.youtube.com/embed/c6GbkT10hZ8?list=PLAbrVBfQCyagjLHpIbNDp9XcROK5wKEwX"
                        title="Primavera P6 R19 project management in hindi | Online Primavera Training | primavera p6 professional"
                        class="card-img-top" allowfullscreen></iframe>
                    <div class="card-body">
                        <h4>
                            DOWNLOAD PRIMAVERA P6 R20 PROJECT MANAGEMENT IN HINDI | INSTALL PRIMAVERA P6 FREE
                        </h4>
                        <p class="card-text"><i class="bi bi-person"></i> By Site Administrato</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">OUR CLIENTS</h2>

                <div class="slick-class  p-2 responsive">
                    <img src="{{ url('/storage/7163_MayurakshiInstituteofEngineeringandTechnologyMIET_1429267328_medium1 (1).jpg') }}"
                        class="img-fluid p-1" alt="Cinque Terre" width="250" height="100">
                    <img src="{{ url('/storage/logo1 (1).jpg') }}" class="img-fluid p-1" alt="Forest"
                        width="250" height="100">
                    <img src="{{ url('/storage/about_jiet1.png') }}" class="img-fluid p-1" alt="Northern Lights"
                        width="250" height="100">
                    <img src="{{ url('/storage/M_B_M__Engineering_College_-_Logo1.png') }}" class="img-fluid p-1"
                        alt="Mountains" width="250" height="100">
                    <img src="{{ url('/storage/logo2.png') }}" class="img-fluid p-1" alt="Forest" width="250"
                        height="100">
                    <img src="{{ url('/storage/logo1.jpg') }}" class="img-fluid p-1" alt="Northern Lights"
                        width="250" height="100">
                    <img src="{{ url('/storage/web-logo11.png') }}" class="img-fluid p-1" alt="Mountains"
                        width="250" height="100">
                    <img src="{{ url('/storage/basant_handicraft.jpg') }}" class="img-fluid p-1" alt="Mountains"
                        width="250" height="100">
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-primary bg-gradient text-white pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="mb-3">Contact Us</h3>
                    <div class="add d-flex  my-3">
                        <i class="fa-solid fa-envelope fa-xl mt-2"></i>
                        <a href="#"
                            class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                            info@cadadda.com</a>
                    </div>
                    <div class="add d-flex my-3">
                        <i class="fa-solid fa-phone fa-xl mt-2"></i>
                        <a href="#"
                            class="text-white ms-2 text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">9261077888</a>
                    </div>
                    <div class="add d-flex my-3">
                        <i class="fa-solid fa-location-dot fa-xl mt-3"></i>
                        <a href="#"
                            class="text-white ms-2 text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">PL
                            No-8, Behind mahaveer complex, Opp. Bheru bagh jain Mandir, C road, Sardarpura, Jodhpur,
                            Rajasthan, 342001</a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <h3 class="mb-3"> Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">About
                                Us</a></li>
                        <li><a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Contact</a>
                        </li>
                        <li><a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Courses</a>
                        </li>
                        <li><a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Blog</a>
                        </li>
                        <li><a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Events</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-brands fa-facebook fa-xl" style="color: #f1f2f4;"></i>
                            <a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Facebook</a>
                        </li>
                        <li>
                            <i class="fa-brands fa-twitter fa-xl" style="color: #f7f7f8;"></i>
                            <a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Twitter</a>
                        </li>
                        <li>
                            <i class="fa-brands fa-instagram fa-xl" style="color: #f7f7f8;"></i>
                            <a href="#"
                                class="text-white ms-2 link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="bg-primary text-center py-2">
            <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
  
    
  
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script>
    $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.responsives').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
</script>
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
                            setTimeout(updateCounter,
                                20); // Speed of counter increment (adjust as needed)
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
