@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <h1>Danh sách danh mục</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item">Tables</li>
                                    <li class="breadcrumb-item active">Data</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="search" name="keyword" class="form-control" placeholder="Nhập...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class='bx bx-search'></i></button>
                                </div>
                            </div>
                        </form>
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
                                    <div>
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm</a>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên khóa học</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                @foreach ($items as $index => $item)
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                {{ ($items->currentPage() - 1) * $items->perPage() + $index + 1 }}
                                            </th>
                                            <td>{{ $item->name }}</td>
                                            <link rel="stylesheet"
                                                href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                                            <link rel="stylesheet"
                                                href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown"><i
                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('categories.edit', $item->id) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('categorie.softdeletes', $item->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="dropdown-item"><i class="bx bx-trash me-1"
                                                                    onclick="return confirm('Bạn có muốn xóa ?')"></i>
                                                                Delete</button>
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
    <div class="card-footer pt-1 pb-1">
        <div class="float-end">
            {{ $items->appends(request()->query())->render() }}
        </div>
    </div>
@endsection
