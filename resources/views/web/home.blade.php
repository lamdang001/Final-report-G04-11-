@extends('web.layouts.template')

@section('title', 'Trang chủ')

@section('content')
<div class="container search-form">
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
    <h3>Các chuyến bay</h3>
    <div class="row">
        <div class="col-md-3">
            <select id="schedule">
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule['id'] }}">{{ $schedule['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" id="qty" min=1 value="1" placeholder="Số lượng vé"/>
        </div>
        <button type="button" class="button" id="search">Xem chi tiết</button>
    </div>
</div>
<form action="{{ route('web.pay') }}" method="POST" id="form-booking">
    @csrf
    @include('web.includes.home.step1')
    @include('web.includes.home.step2')
    @include('web.includes.home.step3')
    @include('web.includes.home.step4')
</form>
@endsection