@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <h1>Cấp độ</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="width:20%"href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Cấp độ</li>
                                    <li class="breadcrumb-item active">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class='bx bx-search'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('levels.index') }}" method="get">
            @csrf
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Danh sách cấp độ</h5>
                                        <div>
                                            <a href="{{ route('levels.create') }}" class="btn btn-success"><i
                                                    class='bx bx-book-add'></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;" scope="col">STT</th>
                                            <th style="text-align:center;" scope="col">Cấp độ</th>
                                            <th style="text-align:center;" scope="col">Số lượng khóa học</th>
                                            <th style="text-align:center;" scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    @foreach ($levels as $index => $level)
                                        <tbody>
                                            <tr>
                                                <th style="text-align:center;" scope="row">{{ $index + 1 }}</th>
                                                <td style="text-align:center;">{{ $level->name }}</td>
                                                <td style="text-align:center;">{{ $level->number_course }}</td>
                                                <td style="text-align:center;">
                                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                                        <a href="{{ route('levels.edit', $level->id) }}"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="{{ route('levels.destroy', $level->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                                                <i class='bx bxs-trash'></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <select name="limit" id="" class="float-end">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </div>
                </div>
            </section>
        </form>
        <div class="card-footer pt-1 pb-1 d-flex justify-content-center">
            {{ $levels->links('pagination::bootstrap-4') }}
        </div>
    </main>
@endsection