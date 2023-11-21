@extends('shop.user')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="section3125 mt-50">
    <h4 class="item_title">Các khóa học</h4>
    <a href="#" class="see150">See all</a>
    <div class="la5lo1">
        <div class="owl-carousel featured_courses owl-theme">
            @foreach($items as $key => $item)
            <div class="item">
                <div class="fcrse_1 mb-20">
                    <a href="{{ route('shop.show',$item->id) }}" class="fcrse_img">
                        <img src="{{ asset($item->image) }}" alt="">
                        <div class="course-overlay">
                            <div class="crse_reviews">
                                <i class='uil uil-star'></i>4.5
                            </div>
                            <span class="play_btn1"><i class="fas fa-eye"></i></span>
                        </div>
                    </a>
                    <div class="fcrse_content">
                        <div class="eps_dots more_dropdown">
                            <!-- <a href="#"><i class='uil uil-ellipsis-v'></i></a> -->
                            <!-- <div class="dropdown-content">
                                <span><i class='uil uil-share-alt'></i>Share</span>
                                <span><i class="uil uil-heart"></i>Save</span>
                                <span><i class='uil uil-ban'></i>Not Interested</span>
                                <span><i class="uil uil-windsock"></i>Report</span>
                            </div> -->
                        </div>
                        <div class="vdtodt">
                            <span class="vdt14">109k views</span>
                            <span class="vdt14">15 days ago</span>
                        </div>
                        <a href="course_detail_view.html" class="crse14s">{{ $item->name}}</a>
                        <div class="auth1lnkprce">
                            <div class="prce142">$10</div>
                            <button class="shrt-cart-btn" title="cart"><i class="uil uil-shopping-cart-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
