@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('courses.index') }}" style="font-size: 50px;"><i
                                class='bx bx-left-arrow-alt'></i></a>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Thông tin bài học</li>
                                </ol>
                            </nav>
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
                            <table class="table">
                                <tr>
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">Tên bài học</label>
                                    </th>
                                    <th width="35%">
                                        {{ $item->name }}
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">Bài đọc</label>
                                    </th>
                                    <td width="35%">
                                        {{ $item->reading }}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">
                                        <label for="level" class="control-label">Video bài học</label>
                                    </th>
                                    <td width="35%">
                                        <video width="640" height="480" controls>
                                            <source src="{{ asset('storage/videos/' . $item->video) }}" type="video/mp4">
                                            Trình duyệt của bạn không hỗ trợ thẻ video.
                                        </video>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
