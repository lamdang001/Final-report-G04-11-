@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
                </h1>
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
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                <tbody align="center">
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
                                <a href="{{ route('order.show',['id' => $order['id']]) }}">Xem</a>
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
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hành động
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="min-width: 80px;">
                                        @if ($order['status'] == 0)
                                            <li><a href="{{ route('order.update.status',['id' => $order['id'], 'status' => 2]) }}" onclick="return confirm('Bạn có muốn hủy đơn hàng này ?');">Hủy</a></li>
                                            <li><a href="{{ route('order.update.status',['id' => $order['id'], 'status' => 1]) }}">Xác nhận</a></li>
                                        @elseif ($order['status'] == 1)
                                            <li><a href="{{ route('order.delete',['id' => $order['id']]) }}" onclick="return confirm('Bạn có muốn xóa đơn hàng này ?');">Xóa</a></li>
                                        @else 
                                            <li><a href="{{ route('order.delete',['id' => $order['id']]) }}" onclick="return confirm('Bạn có muốn xóa đơn hàng này ?');">Xóa</a></li>
                                        @endif
                                        </ul>
                                    </div>
                                </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection