<!doctype html>
<html lang="en">

<head>
    <title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
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
                                    iconColor: '#FF0000',
                                });
                            </script>
                        @endif
                        <h3 class="text-center mb-4">Đăng nhập</h3>
                        <form action="{{ route('checkloginShop') }}" method="post" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left"
                                    placeholder="Email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Hiện mật khẩu
                                        <input name="remember" type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Quên mật khẩu</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="center-link">
                                    Bạn chưa có tài khoản &nbsp;
                                    <a href="{{ route('registerShop') }}"> đăng ký</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng
                                    nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
</body>

</html>
