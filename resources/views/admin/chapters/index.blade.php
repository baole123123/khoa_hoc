@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <h1>Chương học</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="width:20%"href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Chương học</li>
                                    <li class="breadcrumb-item active">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class='bx bx-search'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('chapters.index') }}" method="get" enctype="multipart/form-data">
            @csrf
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Danh sách chương học</h5>
                                        <div>
                                            <a href="{{ route('chapters.create') }}" class="btn btn-success"><i
                                                    class='bx bx-book-add'></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;" scope="col">STT</th>
                                            <th style="text-align:center;" scope="col">Tên</th>
                                            <th style="text-align:center;" scope="col">Khóa học</th>
                                            <th style="text-align:center;" scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    @foreach ($chapters as $index => $chapter)
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    {{ ($chapters->currentPage() - 1) * $chapters->perPage() + $index + 1 }}
                                                </th>
                                                <td style="text-align:center;">{{ $chapter->name }}</td>
                                                <td style="text-align:center;">{{ $chapter->course->name }}</td>
                                                <td style="text-align:center;">
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
                                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                                        <a href="{{ route('chapters.edit', $chapter->id) }}"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="{{ route('chapters.destroy', $chapter->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                                                <i class='bx bxs-trash'></i>
                                                            </button>
                                                        </form>
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
        </form>
        <div class="card-footer pt-1 pb-1 d-flex justify-content-center">
            {{ $chapters->links('pagination::bootstrap-4') }}
        </div>
    </main>
@endsection
