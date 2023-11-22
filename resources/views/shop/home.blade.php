@extends('shop.user')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
<div class="section3125 mt-50">
    <h4 class="item_title">Các khóa học</h4>
    <div class="la5lo1 owl-carousel featured_courses owl-theme">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    loop: false
                }
            }
        })
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="path/to/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
<div class="section3125 mt-50">
    @if (session('errorMessage'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '<h6>{{ session('errorMessage') }}</h6>',
            showConfirmButton: false,
            timer: 2000,
            width: '300px',
            customClass: {
                popup: 'animated bounce',
            },
            background: '#F4F4F4',
            iconColor: '#00A65A',
        });
    </script>
    @endif

</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('.shrt-cart-btn').click(function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của button
            var id = $(this).data('id');
            var quantity = $(this).data('quantity');
            var name = $(this).data('name');
            var image = $(this).data('image');
            var url = '{{ route('addToCart', ['id' => ': id']) }}';
            url = url.replace(':id', id);
            var data = {
                id: id,
                quantity: quantity,
                name: name,
                image: image,
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    $('.cart-quantity').text(response.cartItemCount);
                    if (response.exists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Thất bại',
                            text: 'Khóa học đã tồn tại trong giỏ hàng.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            text: 'Thêm vào giỏ hàng thành công.',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Thất bại',
                        text: 'Thêm vào giỏ hàng không thành công.',
                    });
                }
            });
        });
    });
</script>
@endsection
