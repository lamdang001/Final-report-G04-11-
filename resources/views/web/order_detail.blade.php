@extends('web.layouts.template')

@section('title', 'Chi tiết vé')

@section('content')
    <div class="container">
        <h3>Chi tiết vé</h3>
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
                    <th>Họ tên</th>
                    <th>Chứng minh thư</th>
                    <th>Quê quán</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Chỗ ngồi</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $order['name'] }}</td>
                        <td>{{ $order['identity_card'] }}</td>
                        <td>{{ $order['place'] }}</td>
                        <td>{{ date('d/m/Y', strtotime($order['birthday'])) }}</td>
                        <td>{{ $order['phone'] }}</td>
                        <td>{{ $order['slot'] }}</td>
                    </tr>
                @php $count++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
