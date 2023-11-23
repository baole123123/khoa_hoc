@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Danh sách đơn hàng</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item">Tables</li>
                                <li class="breadcrumb-item active">Data</li>
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
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title"></h5>

                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Thành viên</th>
                                    <th scope="col">Khóa học </th>
                                    <th scope="col">Ngày giao</th>
                                    <th scope="col">Giá</th>

                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            @foreach ($items as $index => $item)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ ++$index }}</th>
                                    <td>{{ $item->member->name }}</td>
                                    <td>{{ $item->course->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->amount }}</td>

                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                                    @if (session('successMessage'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: '<h6>{{ session('successMessage') }}</h6>',
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
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                            <form method="POST" action="{{route('course_member.destroy' ,$item->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item"><i class="bx bx-trash me-1" onclick="return confirm('Bạn có muốn xóa ?')"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
