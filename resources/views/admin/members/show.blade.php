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
                                    <li class="breadcrumb-item active">Xem chi tiết</li>
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
                                    <th colspan="2" style="text-align: center;">
                                        <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img src="{{ asset($members->image) }}" alt="Member Image" width="100">
                                            <hr>
                                            <label for="level" class="control-label">Ảnh thành viên</label>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Tên</label>
                                    </td>
                                    <td width="35%">
                                        {{ $members->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Email</label>
                                    </td>
                                    <td width="35%">
                                        {{ $members->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Số điện thoại</label>
                                    </td>
                                    <td width="35%">
                                        {{ $members->phone }}
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
