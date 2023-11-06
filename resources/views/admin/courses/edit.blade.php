@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Sửa khóa học</h1>
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
                                <form action="{{route('courses.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="app-ecommerce">
                                        <!-- Add Product -->
                                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column justify-content-center">

                                            </div>

                                        </div>
                                        <div class="app-ecommerce">
                                            <!-- Add Product -->
                                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                                <div class="d-flex flex-column justify-content-center">

                                                </div>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tên</label>
                                                                <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}" style="width: 340%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Mô tả</label>
                                                                <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ $item->description }}" style="width: 340%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Ảnh</label>
                                                                <input type="file" name="image" class="form-control" style="width: 340%;"><br>
                                                                @if ($item->image)
                                                                <img src="{{ asset($item->image) }}" alt="Ảnh cũ" style="width:10%; height:10%;">
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Trạng thái</label>
                                                                <input type="text" class="form-control" placeholder="Trạng thái" name="status" value="{{ $item->status }}" style="width: 340%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Danh mục</label>
                                                                <select name="category_id" class="form-select" style="width: 340%;">
                                                                    <option value="">Vui lòng chọn</option>
                                                                    @foreach($categories as $index => $categorie)
                                                                    <option value="{{ $categorie->id }}" {{ $categorie->id == $item->category_id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Cấp độ</label>
                                                                <select name="level_id" class="form-select" style="width: 340%;">
                                                                    <option value="">Vui lòng chọn</option>
                                                                    @foreach($levels as $index => $level)
                                                                    <option value="{{ $level->id }}" {{ $level->id == $item->level_id ? 'selected' : '' }}>{{ $level->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <a href="{{route('courses.index')}}" class="btn btn-secondary">Trở Về</a>
                                        <button type="submit" class="btn btn-primary">Lưu</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main><!-- End #main -->
@endsection
