@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Thêm bài học</h1>
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
                                <form action="{{route('lessons.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <label class="form-label">Chương</label>
                                        <select name="chapter_id" class="form-select">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach($chapters as $index => $chapter)
                                            <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('level_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </thead>
                                        <div class="mb-3">
                                            <label class="form-label">Video</label>
                                            <input type="file" class="form-control" name="video" placeholder="Video..." id="video" accept="video/*" required>
                                        </div>
                                </thead>

                                </tbody>
                            </table>
                            <div class="d-flex align-content-center flex-wrap gap-3">
                                <a href="{{route('lessons.index')}}" class="btn btn-secondary">Trở Về</a>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->
@endsection
