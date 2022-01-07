@extends('web.layouts.template')

@section('title', 'Cập nhật thông tin cá nhân')

@section('content')
<style>
    /* Full-width input fields */
    input[type=text], input[type=password], select, input[type=email], input[type=tel] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus, select:focus, input[type=email]:focus, input[type=tel]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }
</style>
<form action="{{ route('web.edit.user',['id' => $user['id']]) }}" method="post" style="border:1px solid #ccc">
    @csrf
    <div class="container">
        <h1>Cập nhật thông tin cá nhân</h1>
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
        <input type="text" placeholder="Nhập họ tên đầy đủ" name="name" value="{{ $user['name'] }}" maxlength="255">

        <label><b>Số điện thoại</b></label>
        <input type="tel" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" name="phone" value="{{ $user['phone'] }}"> 

        <button type="submit" class="button">Cập nhật</button>
    </div>
</form>
@endsection