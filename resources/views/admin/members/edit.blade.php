@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('members.index') }}" style="font-size: 50px;"><i
                                    class='bx bx-left-arrow-alt'></i></a>
                            <h1>Thành viên</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Thành viên</li>
                                    <li class="breadcrumb-item active">Sửa thành viên</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('members.update', $members->id) }}" method="post" enctype="multipart/form-data">
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
                                            <label for="level" class="control-label">Tên</label><br>
                                            <input type="text" name="name" id="level" class="form-control w-100"
                                                value="{{ $members->name }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Email</label><br>
                                            <input type="text" name="email" id="level" class="form-control w-100"
                                                value="{{ $members->email }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Số điện thoại</label><br>
                                            <input type="text" name="phone" id="level" class="form-control w-100"
                                                value="{{ $members->phone }}">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Hình ảnh</label><br>
                                            <input type="file" name="image" id="member-image-input">
                                        </div><br>
                                        <img src="{{ asset($members->image) }}" alt="Member Image" id="member-image-preview"
                                            width="100">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Sửa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                document.getElementById('member-image-input').addEventListener('change', function(e) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var memberImagePreview = document.getElementById('member-image-preview');
                        memberImagePreview.src = event.target.result;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                });
            </script>
        </form>
    </main>
@endsection
