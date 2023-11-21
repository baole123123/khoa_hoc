<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cursus - Index</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/fav.png">

    <!-- Stylesheets -->
     <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
    <link href="{{asset('asset/vendor/unicons-2.0.1/css/unicons.css')}}" rel='stylesheet'>
    <link href="{{asset('asset/css/vertical-responsive-menu.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/night-mode.css')}}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/OwlCarousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/OwlCarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/semantic/semantic.min.css')}}">

</head>

<body>
    <!-- Header Start -->
    @include('users.clayout.header')
    <!-- Header End -->
    <!-- Left Sidebar Start -->
    @include('users.clayout.sidebar')

    <!-- Left Sidebar End -->
    <!-- Body Start -->
    <div class="wrapper">
        <div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">



                        <div class="section3125">
                            <h4 class="item_title">Live Streams</h4>
                            <a href="live_streams.html" class="see150">See all</a>
                            <div class="la5lo1">
                                <div class="owl-carousel live_stream owl-theme">
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-1.jpg')}}" alt="">
                                                <h4>John Doe</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-2.jpg')}}" alt="">
                                                <h4>Jassica</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-9.jpg')}}" alt="">
                                                <h4>Edututs+</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-3.jpg')}}" alt="">
                                                <h4>Joginder Singh</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-4.jpg')}}" alt="">
                                                <h4>Zoena</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-5.jpg')}}" alt="">
                                                <h4>Albert Dua</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-6.jpg')}}" alt="">
                                                <h4>Ridhima</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-7.jpg')}}" alt="">
                                                <h4>Amritpal</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="stream_1">
                                            <a href="live_output.html" class="stream_bg">
                                                <img src="{{asset('asset/images/left-imgs/img-8.jpg')}}" alt="">
                                                <h4>Jimmy</h4>
                                                <p>live<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @yield('content')



                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="right_side">
                            <div class="fcrse_2 mb-30">

                                <!-- <div class="tutor_img">
                                    <a href="my_instructor_profile_view.html"><img src="images/left-imgs/img-10.jpg" alt=""></a>

                                <div class="tutor_img">
                                    <a href="my_instructor_profile_view.html"><img src="{{asset('asset/images/left-imgs/img-10.jpg')}}" alt=""></a>

                                </div>
                                <div class="tutor_content_dt">
                                    <div class="tutor150">
                                        <a href="my_instructor_profile_view.html" class="tutor_name">Joginder Singh</a>
                                        <div class="mef78" title="Verify">
                                            <i class="uil uil-check-circle"></i>
                                        </div>
                                    </div> -->
                                    <div class="tutor_cate">Web Developer, Designer, and Teacher</div>
                                    <ul class="tutor_social_links">
                                        <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" class="ln"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#" class="yu"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                    <div class="tut1250">
                                        <span class="vdt15">615K Students</span>
                                        <span class="vdt15">12 Courses</span>
                                    </div>
                                    <a href="my_instructor_profile_view.html" class="prfle12link">Go To Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('users.clayout.footer')
    </div>
    <!-- Body End -->

    <script src="{{asset('asset/js/vertical-responsive-menu.min.js')}}"></script>
    <script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('asset/vendor/OwlCarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('asset/vendor/semantic/semantic.min.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <script src="{{asset('asset/js/night-mode.js')}}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</body>

</html>
