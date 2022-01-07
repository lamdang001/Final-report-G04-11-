@extends('admin.layouts.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Doanh thu bán vé các chuyến bay tháng {{ date('m') }}
                        <small>Báo cáo</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Chuyến bay</th>
                            <th>Số vé</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @php $count = 1; @endphp
                        @foreach ($revenue_ticket as $item)
                            @if (date('m') == date('m', strtotime($item->created_at)))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ \App\Models\Schedule::find($item->schedule_id)->name }}</td>
                                    <td>{{ $item->qty_buy }}</td>
                                    <td>{{ number_format($item->total,-3,',',',') }} VND</td>
                                </tr>
                            @endif 
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Doanh thu năm {{ date('Y') }}
                        <small>Báo cáo</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tháng</th>
                            <th>Số chuyến bay</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @php $count = 1; $data = []; @endphp
                        @foreach ($revenue_year as $item)
                            @if ($item->order_year == date('Y'))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $item->order_month }}</td>
                                    <td>{{ $item->count_schedule }}</td>
                                    <td>{{ number_format($item->total,-3,',',',') }} VND</td>
                                </tr>
                            @endif
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection