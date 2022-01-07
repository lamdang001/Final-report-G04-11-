@extends('web.layouts.template')

@section('title', 'Đăng ký')

@section('content')
<form action="{{ route('web.auth.handleRegister') }}" method="post" style="border:1px solid #ccc">
    @csrf
    <div class="container">
        <h1>Đăng ký</h1>
        <p>Vui lòng điền đầy đủ thông tin bên dưới để tạo mới tài khoản.</p>
        <hr>
        @if(Session::has('invalid'))
            <div class="alert alert-danger alert-dismissible">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('invalid')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
            </div>
        @endif

        <label><b>Họ tên</b></label>
        <input type="text" placeholder="Nhập họ tên đầy đủ" name="name" value="{{ old('name') }}" maxlength="255">

        <label><b>Email</b></label>
        <input type="email" placeholder="Nhập email" name="email" value="{{ old('email') }}">

        <label><b>Số điện thoại</b></label>
        <input type="tel" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" name="phone" value="{{ old('phone') }}">

        <label><b>Mật khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="password" minlength="6" maxlength="24" value="{{ old('password') }}">

        <label><b>Xác nhận mật khẩu</b></label>
        <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" minlength="6" maxlength="24" value="{{ old('repassword') }}">
        

        <button type="submit" class="button">Đăng ký</button>
    </div>
</form>
@endsection