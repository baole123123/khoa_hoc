@extends('shop.user')
@section('content')
<div class="wrapper _bg4586">
    <div class="_215b01">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section3125">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="preview_video">
                                    <a href="#" class="fcrse_img" data-toggle="modal" data-target="#videoModal" data-video="{{ $items->video }}">
                                        <img src="{{ asset($items->image) }}" alt="">
                                        <div class="course-overlay">
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                        </div>
                                    </a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="videoModalLabel">Video khóa học</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <video style="width: 100%; height: 100%;" controls>
                                                    <source src="{{ asset('storage/videos/' . $items->video) }}" type="video/mp4">
                                                    Trình duyệt của bạn không hỗ trợ thẻ video.
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>The Web Developer Bootcamp</h2>
                                    <span class="_215b04">The only course you need to learn web development - HTML, CSS, JS, Node, and More!</span>
                                </div>
                                <div class="_215b05">
                                    <div class="crse_reviews mr-2">
                                        <i class="uil uil-star"></i>4.5
                                    </div>
                                </div>

                                <span class="caption_tooltip">
                                    <span class="caption-content">
                                        <span>French</span>
                                        <span>Hindi</span>
                                        <span>German [Auto-generated]</span>
                                        <span>Indonesian [Auto-generated]</span>
                                        <span>Italian [Auto-generated]</span>
                                        <span>Japanese [Auto-generated]</span>
                                        <span>Korean</span>
                                        <span>Polish</span>
                                        <span>Portuguese [Auto-generated]</span>
                                        <span>Spanish [Auto-generated]</span>
                                        <span>Traditional Chinese</span>
                                        <span>Turkish [Auto-generated]</span>
                                    </span>
                                </span>
                                </span>
                            </div>
                        </div>
                        <div class="_215b05">
                            Last updated 1/2020
                        </div>
                        <ul class="_215b31">
                            <li><button class="btn_adcart">Add to Cart</button></li>
                            <li><button class="btn_buy">Buy Now</button></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="_215b15 _byt1458">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="user_dt5">
                    <div class="user_dt_left">
                        <div class="live_user_dt">
                            <!-- <div class="user_img5">
                                <a href="#"><img src="images/left-imgs/img-1.jpg" alt=""></a>
                            </div> -->
                            <!-- <div class="user_cntnt">
                                <a href="#" class="_df7852">Johnson Smith</a>
                                <button class="subscribe-btn">Subscribe</button>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="_215b17">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="course_tab_content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-about" role="tabpanel">
                            <div class="_htg451">

                                <div class="_htg452 mt-35">
                                    <h3>Giới thiệu khóa học</h3>

                                    <h3>{{ $items->reading }}</h3>
                                    <a href="{{route('shop.home')}}" class="btn btn-secondary">Quay lại trang</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Body End -->


@endsection
