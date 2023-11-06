@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <h1>Thành viên</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="width:20%"href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Thành viên</li>
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
        <form action="{{ route('members.index') }}" method="get" enctype="multipart/form-data">
            @csrf
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Danh sách thành viên</h5>
                                        <div>
                                            <a href="{{ route('members.create') }}" class="btn btn-success"><i
                                                    class='bx bx-book-add'></i></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;" scope="col">STT</th>
                                            <th style="text-align:center;" scope="col">Ảnh</th>
                                            <th style="text-align:center;" scope="col">Tên</th>
                                            <th style="text-align:center;" scope="col">Email</th>
                                            <th style="text-align:center;" scope="col">Số điện thoại</th>
                                            <th style="text-align:center;" scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    @foreach ($members as $index => $member)
                                        <tbody>
                                            <tr>
                                                <th style="text-align:center;" scope="row">{{ $index + 1 }}</th>
                                                <td style="text-align:center;">
                                                    <img src="{{ asset($member->image) }}" alt="Member Image" width="100">
                                                </td>
                                                <td style="text-align:center;">{{ $member->name }}</td>
                                                <td style="text-align:center;">{{ $member->email }}</td>
                                                <td style="text-align:center;">{{ $member->phone }}</td>
                                                <td style="text-align:center;">
                                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                                        <a href="{{ route('members.edit', $member->id) }}"><i class='bx bx-edit-alt'></i></a>
                                                        <a href="{{ route('members.show', $member->id) }}"><i class='bx bx-show-alt'></i></a>
                                                        <form action="{{ route('members.destroy', $member->id) }}" method="post">
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
                    </div>
                </div>
            </section>
        </form>
        <div class="card-footer pt-1 pb-1 d-flex justify-content-center">
            {{ $members->links('pagination::bootstrap-4') }}
        </div>
    </main>
@endsection
