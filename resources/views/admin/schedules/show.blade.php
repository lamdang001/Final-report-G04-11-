@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỗ ngồi
                    <small>Sơ đồ</small>
                </h1>
            </div>
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#slot1">Hàng ghế 1 (ghế vip)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#slot2">Hàng ghế 2 (ghế thường)</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="slot1">
                        @if (isset($schedule->slot_1))
                            @foreach (json_decode($schedule->slot_1,true) as $slot)
                                <button type="button" class="btn {{ in_array($slot, $slots) ? 'btn-danger' : '' }}" id="{{ $slot }}" {{ in_array($slot, $slots) ? 'disabled' : '' }}>{{ $slot }}</button>
                            @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="slot2">
                        @if (isset($schedule->slot_2))
                            @foreach (json_decode($schedule->slot_2,true) as $slot)
                                <button type="button" class="btn {{ in_array($slot, $slots) ? 'btn-danger' : '' }}" id="{{ $slot }}" {{ in_array($slot, $slots) ? 'disabled' : '' }}>{{ $slot }}</button>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="margin-top:2rem;">
                <p>Ghi chú</p>
                <ul>
                    <li>
                        <span style="padding:2px 30px 0px 30px;background-color:#EFEFEF;"></span>
                        &nbsp;Ghế trống
                    </li>
                    <li>
                        <span style="padding:2px 30px 0px 30px;background-color:#E6908D;"></span>
                        &nbsp;Ghế đã bán
                    </li>
                </ul>
            </div>
        </div>
    </div>    
</div>
@endsection