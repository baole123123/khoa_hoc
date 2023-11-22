@extends('shop.user')
@section('content')
<div class="purchase-info">
    <h2>Thông tin mua hàng</h2>
    
    <form action="{{ route('add') }}" method="POST" class="needs-validation" novalidate>
      @csrf
      <div class="form-group">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::guard('members')->user()->name }}" required>
        <div class="invalid-feedback">
          Vui lòng nhập họ và tên.
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ Auth::guard('members')->user()->email }}" required>
        <div class="invalid-feedback">
          Vui lòng nhập địa chỉ email hợp lệ.
        </div>
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" class="form-control" value="{{ Auth::guard('members')->user()->phone }}" required>
        <div class="invalid-feedback">
          Vui lòng nhập số điện thoại.
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
    </form>
</div>
@endsection