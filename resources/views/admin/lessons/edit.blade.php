@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Sửa bài học</h1>
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
                                <form action="{{route('lessons.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
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
                                                                <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}" style="width: 540%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Cấp độ</label>
                                                                <select name="chapter_id" class="form-select" style="width: 540%;">
                                                                    <option value="">Vui lòng chọn</option>
                                                                    @foreach($chapters as $index => $chapter)
                                                                    <option value="{{ $chapter->id }}" {{ $chapter->id == $item->chapter_id ? 'selected' : '' }}>{{ $chapter->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Video</label>
                                                                <input type="file" class="form-control" name="video" placeholder="Video..." id="video" accept="video/*">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <a href="{{route('lessons.index')}}" class="btn btn-secondary">Trở Về</a>
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
