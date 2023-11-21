@extends('shop.user')
@section('content')
    <style>
        .bx {
            color: red;
            border: 2px solid rgb(247, 244, 244);
        }
    </style>
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
        <main id="main" class="main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="pagetitle">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                        <li class="breadcrumb-item">Giỏ hàng</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">STT</label>
                                    </th>
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">Tên</label>
                                    </th>
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">Hành động</label>
                                    </th>
                                    @foreach ($param['cart'] as $index => $cart)
                                        <tr>
                                            <th style="text-align:center;" width="35%">
                                                {{ $index + 1 }}
                                            </th>
                                            <th style="text-align:center;" width="35%">
                                                {{ $cart['name'] }}
                                            </th>
                                            <th style="text-align:center;" width="35%">
                                                <button class="shrt-destoy-cart-btn bx" data-id="{{ $cart['course_id'] }}"
                                                    data-action="{{ route('destroy-cart', $cart['course_id']) }}"><i
                                                        class='bx bxs-trash'></i></button>
                                            </th>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </main>
        <script>
            $(document).ready(function() {
                $('.shrt-destoy-cart-btn').click(function(event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    var url = $(this).data('action');
                    var data = {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    };
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('.shrt-destoy-cart-btn[data-id="' + id + '"]').closest('tr').remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Xóa khỏi giỏ hàng thành công.',
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Thất bại',
                                text: 'Xóa khỏi giỏ hàng không thành công.',
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
