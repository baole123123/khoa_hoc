
@extends('admin')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-8">
                    <div class="pagetitle">
                        <h1>Sửa người mua</h1>
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
                                <form action="{{route('users.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="app-ecommerce">
                                        <!-- Add Product -->
                                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column justify-content-center">

                                            </div>

                                        </div>
                                        <div class="app-ecommerce">
                                            <!-- Add Product -->
                                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                                <div class="d-flex flex-column justify-content-center">

                                                </div>
                                                <table class="table">
                                                <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tên</label>
                                                                <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}" style="width: 540%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $item->email }}" style="width: 540%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input type="text" class="form-control" placeholder="Password" name="password" value="{{ $item->password }}" style="width: 540%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                                <a href="{{route('users.index')}}" class="btn btn-secondary">Trở Về</a>
                                                <button type="submit" class="btn btn-primary">Lưu</button>

                                            </div>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main><!-- End #main -->
@endsection
