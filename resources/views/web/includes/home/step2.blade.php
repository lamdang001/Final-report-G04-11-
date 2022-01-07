<div class="container" id="step-2">
    @if (isset($qty_customer))
        @for ($i = 1; $i <= $qty_customer; $i++)
            <h3>Hành khách {{ $i }}</h3>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <label><b>Chứng minh nhân dân</b></label>
                    <input type="text" name="card-customer[]" maxlength="255">
                </div>
                <div class="col-md-4">
                    <label><b>Họ tên</b> <span class="text-danger">*</span></label>
                    <input type="text" name="name-customer[]" maxlength="255">
                </div>
                <div class="col-md-4">
                    <label><b>Nơi sinh</b> <span class="text-danger">*</span></label>
                    <input type="text" name="place-customer[]" maxlength="255">
                </div>
                <div class="col-md-4">
                    <label><b>Ngày sinh</b> <span class="text-danger">*</span></label>
                    <input type="date" name="birthday-customer[]" max='{{ date("Y-m-d") }}'>
                </div>
                <div class="col-md-4">
                    <label><b>Điện thoại</b></label>
                    <input type="tel" pattern="[0-9]{10}" name="phone-customer[]" placeholder="Nhập 10 số">
                </div>
            </div>
        @endfor
    @endif
    <button type="button" class="button" id="back-1" style="background-color:#fdca52;">Trở lại</button>
    <button type="button" class="button" id="continue-2">Tiếp tục</button>
</div>