<div class="container" id="step-1">
    <h3>{{ @$schedule->name }}</h3>
    <hr>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <label><b>Chuyến bay</b></label>
        </div>
        <div class="col-md-2">
            <label><b>Ngày khởi hành</b></label>
        </div>
        <div class="col-md-1">
            <label><b>Thời gian đi</b></label>
        </div>
        <div class="col-md-1">
            <label><b>Thời gian dừng</b></label>
        </div>
        <div class="col-md-2">
            <label><b>Sân bay đi</b></label>
        </div>
        <div class="col-md-2">
            <label><b>Sân bay đến</b></label>
        </div>
        <div class="col-md-1">
            <label><b>Tình trạng</b></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <input type="radio" value="{{ $schedule['id'] }}" name="choose" class="form-check-input"/>
        </div>
        <div class="col-md-2">
            <div>{{ $schedule['name'] }}</div>
        </div>
        <div class="col-md-2">
            <div>{{ date('d/m/Y',strtotime($schedule['date'])) }}</div>
        </div>
        <div class="col-md-1">
            <div>{{ $schedule['time'] }} phút</div>
        </div>
        <div class="col-md-1">
            <div>{{ $schedule['time_stop'] }} phút</div>
        </div>
        <div class="col-md-2">
            <div>{{ $schedule['start_airport'] }}</div>
        </div>
        <div class="col-md-2">
            <div>{{ $schedule['end_airport'] }}</div>
        </div>
        <div class="col-md-1">
            <div>{{ $schedule['qty'] > 0 ? 'Còn vé' : 'Hết vé' }}</div>
        </div>
    </div>
    @if (Auth::check())
        <button type="button" class="button" id="continue-1">Tiếp tục</button>
    @else
        <br>
        <p>Vui lòng nhấn vào <a href="{{ route('web.auth.login') }}">đây</a> để đăng nhập trước khi đặt vé</p>
    @endif
</div>