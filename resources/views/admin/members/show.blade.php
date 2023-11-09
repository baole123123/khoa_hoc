@extends('admin')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="pagetitle">
                            <a href="{{ route('levels.index') }}" style="font-size: 50px;"><i
                                class='bx bx-left-arrow-alt'></i></a>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item">Thông tin tài khoản</li>
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
                                            <img src="{{ asset(Auth::guard('members')->user()->image) }}" alt="Member Image" width="100">
                                            <hr>
                                            <label for="level" class="control-label">Ảnh của bạn</label>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Tên</label>
                                    </td>
                                    <td width="35%">
                                        {{ Auth::guard('members')->user()->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Email</label>
                                    </td>
                                    <td width="35%">
                                        {{ Auth::guard('members')->user()->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <label for="level" class="control-label">Số điện thoại</label>
                                    </td>
                                    <td width="35%">
                                        {{ Auth::guard('members')->user()->phone }}
                                    </td>
                                </tr>
                            </table>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
