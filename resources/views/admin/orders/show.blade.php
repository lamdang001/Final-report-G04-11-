@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vé
                    <small>Chi tiết</small>
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
                        <th>Họ tên</th>
                        <th>Chứng minh thư</th>
                        <th>Quê quán</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Chỗ ngồi</th>
                    </tr>
                </thead>
                <tbody align="center">
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
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection