@extends('web.layouts.template')

@section('title', 'Đăng nhập')

@section('content')
<form action="{{ route('web.auth.handleLogin') }}" method="post" style="border:1px solid #ccc">
    @csrf
    <div class="container">
        <h1>Đăng nhập</h1>
        <p>Chưa có tài khoản. Vui lòng đăng ký <a href="{{ route('web.auth.register') }}">tại đây</a>.</p>
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

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Nhập email" name="email" value="{{ old('email') }}">

        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="password" minlength="6" maxlength="24">

        <button type="submit" class="button">Đăng nhập</button>
    </div>
</form>
@endsection