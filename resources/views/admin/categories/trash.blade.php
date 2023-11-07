@extends('admin')
@section('content')

<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Thùng rác danh mục</h1>
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
                            <tr>
                                <th>stt</th>
                                <th>Tên</th>
                                <th>tùy chọn</th>
                            </tr>
                            <tbody>
                                @foreach ($categories as $key => $categorie)
                                <tr data-expanded="true" class="item-{{ $categorie->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $categorie->name }}</td>
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
                                        <form action="{{ route('categorie.restoredelete', $categorie->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success">Khôi phục</button>
                                            <a href="{{ route('categorie_destroy', $categorie->id) }}" id="{{ $categorie->id }}" class="btn btn-danger">Xóa</a>
                                        </form>
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
</div>
@endsection
