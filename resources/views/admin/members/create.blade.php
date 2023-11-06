@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('members.index') }}" style="font-size: 50px;" ><i class='bx bx-left-arrow-alt'></i></a>
                            <h1>Thành viên</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Thành viên</li>
                                    <li class="breadcrumb-item active">Thêm mới</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('members.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="level" class="control-label">Tên</label><br>
                                                    <input type="text" name="name" id="level" class="form-control w-100" value="{{ old('name') }}">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div><br>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="level" class="control-label">Email</label><br>
                                                    <input type="text" name="email" id="level" class="form-control w-100" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="level" class="control-label">Mật khẩu</label><br>
                                                    <input type="text" name="password" id="level" class="form-control w-100" value="{{ old('password') }}">
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div><br>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="level" class="control-label">Số điện thoại</label><br>
                                                    <input type="text" name="phone" id="level" class="form-control w-100" value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div><br>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="level" class="control-label">Ảnh</label><br>
                                                    <input type="file" name="image" id="level">
                                                </div><br>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
@endsection
