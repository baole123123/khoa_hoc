@extends('admin')
@section('content')
<main id="main" class="main">
<div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">Thay đổi mật khẩu</div>
            <div class="card-body">
                <form method="POST" action="{{ route('changePassword.submit') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="current_password" class="col-md-4 col-form-label text-md-right">Mật khẩu hiện tại</label>
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="new_password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu mới</label>
                        <div class="col-md-6">
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                        </div>
                    </div><br>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection