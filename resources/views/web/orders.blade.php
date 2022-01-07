@extends('web.layouts.template')

@section('title', 'Đơn hàng của tôi')

@section('content')
    <div class="container">
        <h3>Đơn hàng của tôi</h3>
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên người đặt vé</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Chuyến bay</th>
                    <th>Tổng tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Chi tiết vé</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach ($orders as $order)
                    @php
                        $schedule = \App\Models\Schedule::find($order['schedule_id']);
                    @endphp
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $order['name'] }}</td>
                        <td>{{ $order['phone'] }}</td>
                        <td>{{ $order['email'] }}</td>
                        <td>{{ $schedule->name }}</td>
                        <td>{{ number_format($order['total'],-3,',',',') }} VND</td>
                        <td>{{ $order['type'] == 0 ? 'Tiền mặt' : 'Ví điện tử' }}</td>
                        <td>
                            <a href="{{ route('web.order.detail',['id' => $order['id']]) }}">Xem</a>
                        </td>
                        <td>
                            @php
                                if ($order['status'] == 0) {
                                    echo 'Đang chờ';
                                } elseif ($order['status'] == 1) {
                                    echo 'Xác nhận';
                                } else {
                                    echo 'Hủy';
                                }
                            @endphp
                        </td>
                        <td>
                            @if ($order['status'] == 0)
                                <a href="{{ route('web.edit.order.form',['id' => $order['id']]) }}">Sửa</a>
                                <a href="{{ route('web.cancle.order',['id' => $order['id']]) }}" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn này ?');">Hủy</a>
                            @endif
                        </td>
                    </tr>
                @php $count++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
