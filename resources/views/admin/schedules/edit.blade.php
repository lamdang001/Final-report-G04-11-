@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lịch trình
                    <small>Cập nhật</small>
                </h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible mt-2">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('schedule.edit',['id' => $schedule->id]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="name">Tên chuyến bay: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập tên lịch trình" id="name" name="name" value="{{ $schedule->name }}">
                    </div>
                    <div class="form-group">
                        <label for="qty">Số lượng: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng" id="qty" name="qty" min=1 value="{{ $schedule->qty }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá vé: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Nhập giá vé" id="price" name="price" min=1 value="{{ $schedule->price }}">
                    </div>
                    <div class="form-group">
                        <label for="start_airport">Sân bay đi: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập sân bay đi" id="start_airport" name="start_airport" value="{{ $schedule->start_airport }}">
                    </div>
                    <div class="form-group">
                        <label for="end_airport">Sân bay đến: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập sân bay đến" id="end_airport" name="end_airport" value="{{ $schedule->end_airport }}">
                    </div>
                    <div class="form-group">
                        <label for="date">Ngày khởi hành:</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $schedule->date }}" min='{{ date("Y-m-d") }}'>
                    </div>
                    <div class="form-group">
                        <label for="time">Thời gian bay:</label>
                        <input type="number" class="form-control" id="time" name="time" value="{{ $schedule->time }}" min=1>
                    </div>
                    <div class="form-group">
                        <label for="time_stop">Thời gian dừng:</label>
                        <input type="number" class="form-control" id="time_stop" name="time_stop" value="{{ $schedule->time_stop }}" min=1>
                    </div>
                    <div class="form-group">
                        <label for="slot_1">Ghế hạng 1: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ví dụ: V1A,V1B,V1C,V2A,V2B,..." id="slot_1" name="slot_1" value="{{ implode(',', json_decode($schedule->slot_1, true)) }}">
                    </div>
                    <div class="form-group">
                        <label for="slot_2">Ghế hạng 2: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ví dụ: 1A,1B,1C,2A,2B,..." id="slot_2" name="slot_2" value="{{ implode(',', json_decode($schedule->slot_2, true)) }}">
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection