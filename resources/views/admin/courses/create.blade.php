@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Thêm khóa học</h1>
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
                                <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="app-ecommerce">
                                        <!-- Add Product -->
                                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column justify-content-center">

                                            </div>

                                        </div>
                                    </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ old('name') }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Mô tả</label>
                                        <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ old('description') }}">
                                        @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Ảnh</label>
                                        <input type="file" class="form-control" placeholder="Ảnh" name="image" value="{{ old('image') }}">
                                        @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Trạng thái</label>
                                        <input type="text" class="form-control" placeholder="Trạng thái" name="status" value="{{ old('status') }}">
                                        @error('status') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Danh mục</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach($categories as $index => $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Cấp độ </label>
                                        <select name="level_id" class="form-select">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach($levels as $index => $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('level_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </thead>

                                </tbody>
                            </table>
                            <div class="d-flex align-content-center flex-wrap gap-3">
                                <a href="{{route('courses.index')}}" class="btn btn-secondary">Trở Về</a>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->
@endsection
