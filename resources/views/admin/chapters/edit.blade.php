@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('chapters.index') }}" style="font-size: 50px;"><i
                                    class='bx bx-left-arrow-alt'></i></a>
                            <h1>Chương học</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Chương học</li>
                                    <li class="breadcrumb-item active">Sửa chương học</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('chapters.update', $chapters->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Chương học</label><br>
                                            <input type="text" name="name" id="level" class="form-control w-100"
                                                value="{{ $chapters->name }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Khóa học</label><br>
                                            <select name="course_id" class="form-control w-100">
                                                @foreach ($courses as $index => $course)
                                                <option value="{{ $course->id }}" {{ $course->id == $chapters->course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-success">Sửa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
@endsection
