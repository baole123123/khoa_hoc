@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('levels.index') }}" style="font-size: 50px;" ><i class='bx bx-left-arrow-alt'></i></a>
                            <h1>Cấp độ</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Cấp độ</li>
                                    <li class="breadcrumb-item active">Thêm mới</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('levels.store') }}" method="post">
            @csrf
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level" class="control-label">Cấp độ</label><br>
                                            <input type="text" name="name" id="level" class="form-control w-100" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><br>
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
