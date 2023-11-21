<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
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

                        @yield('content')



                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="right_side">
                            <div class="fcrse_2 mb-30">
                                <!-- <div class="tutor_img">
                                    <a href="my_instructor_profile_view.html"><img src="images/left-imgs/img-10.jpg" alt=""></a>
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
                            <div class="fcrse_3">
                                <div class="cater_ttle">
                                    <h4>Live Streaming</h4>
                                </div>
                                <div class="live_text">
                                    <div class="live_icon"><i class="uil uil-kayak"></i></div>
                                    <div class="live-content">
                                        <p>Set up your channel and stream live to your students</p>
                                        <button class="live_link" onclick="window.location.href = 'add_streaming.html';">Get Started</button>
                                        <span class="livinfo">Info : This feature only for 'Instructors'.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="get1452">
                                <h4>Get personalized recommendations</h4>
                                <p>Answer a few questions for your top picks</p>
                                <button class="Get_btn" onclick="window.location.href = '#';">Get Started</button>
                            </div>
                            <div class="fcrse_3">
                                <div class="cater_ttle">
                                    <h4>Top Categories</h4>
                                </div>
                                <ul class="allcate15">
                                    <li><a href="#" class="ct_item"><i class='uil uil-arrow'></i>Development</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-graph-bar'></i>Business</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-monitor'></i>IT and Software</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-ruler'></i>Design</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-chart-line'></i>Marketing</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-book-open'></i>Personal Development</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-camera'></i>Photography</a></li>
                                    <li><a href="#" class="ct_item"><i class='uil uil-music'></i>Music</a></li>
                                </ul>
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


</body>

</html>
