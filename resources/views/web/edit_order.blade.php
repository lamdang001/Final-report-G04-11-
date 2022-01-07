@extends('web.layouts.template')

@section('title', 'Sửa thông tin đơn hàng')

@section('content')
<form action="{{ route('web.edit.order',['id' => $order['id']]) }}" method="post" style="border:1px solid #ccc">
    @csrf
    <div class="container">
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
        <h2>Thông tin người đặt vé</h2>
        <hr>

        @foreach ($order_details as $item)
            <input type="hidden" name="order-id-customer[]" value="{{ $item['id'] }}" />
            <div class="row">
                <div class="col-md-4">
                    <label><b>Chứng minh nhân dân</b> <span class="text-danger">*</span></label>
                    <input type="text" name="card-customer[]" maxlength="255" value="{{ $item['identity_card'] }}" required>
                </div>
                <div class="col-md-4">
                    <label><b>Họ tên</b> <span class="text-danger">*</span></label>
                    <input type="text" name="name-customer[]" maxlength="255" value="{{ $item['name'] }}" required>
                </div>
                <div class="col-md-4">
                    <label><b>Nơi sinh</b> <span class="text-danger">*</span></label>
                    <input type="text" name="place-customer[]" maxlength="255" value="{{ $item['place'] }}" required>
                </div>
                <div class="col-md-4">
                    <label><b>Điện thoại</b> <span class="text-danger">*</span></label>
                    <input type="tel" pattern="[0-9]{10}" name="phone-customer[]" value="{{ $item['phone'] }}" required>
                </div>
            </div>
        @endforeach

        <button type="submit" class="button">Cập nhật</button>
    </div>
</form>
@endsection