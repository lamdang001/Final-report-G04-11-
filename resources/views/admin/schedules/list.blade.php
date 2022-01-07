@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyến bay
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
                        <th>Chuyến bay</th>
                        <th>Sân bay đi</th>
                        <th>Sân bay đến</th>
                        <th>Khởi hành</th>
                        <th>Thời gian</th>
                        <th>Thời gian dừng</th>
                        <th>Giá vé hạng thường</th>
                        <th>Giá vé hạng vip</th>
                        <th>Số lượng vé</th>
                        @if (Session::get('role') == 0)
                            <th>Hành động</th>
                        @endif
                    </tr>
                </thead>
                <tbody align="center">
                    @php $count = 1; @endphp
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $schedule->name }}</td>
                            <td>{{ $schedule->start_airport }}</td>
                            <td>{{ $schedule->end_airport }}</td>
                            <td>{{ date('d/m/Y',strtotime($schedule->date)) }}</td>
                            <td>{{ $schedule->time }} phút</td>
                            <td>{{ $schedule->time_stop }} phút</td>
                            <td>{{ number_format($schedule->price,-3,',',',') }} VND</td>
                            <td>{{ number_format($schedule->price * 1.05,-3,',',',') }} VND</td>
                            <td>{{ $schedule->qty }}</td>
                            @if (Session::get('role') == 0)
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hành động
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="min-width: 80px;">
                                            <li><a href="{{ route('schedule.show',['id' => $schedule['id']]) }}">Xem chi tiết</a></li>
                                            @if (Session::get('role') == 0)
                                                <li><a href="{{ route('schedule.edit.form',['id' => $schedule['id']]) }}">Sửa</a></li>
                                                <li><a href="{{ route('schedule.delete',['id' => $schedule['id']]) }}" onclick="return confirm('Bạn có muốn xóa chuyến bay này ?');">Xóa</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            @endif
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