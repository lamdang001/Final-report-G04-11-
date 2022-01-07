<div class="container" id="step-4">
    <h3>Thông tin chuyến bay</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h4>Tổng cộng: <span class="text-danger">{{ number_format(@$total,-3,',',',') }} VND</span></h4>
            <input type="hidden" name="total" value="{{ @$total }}" />
            <h4>Lịch trình: <span class="text-primary">{{ @$schedule->name }}</span></h4>
            <h4>Thời gian đi: <span class="text-primary">{{ @$schedule->time }} phút</span></h4>
            <h4>Ngày khởi hành: <span class="text-primary">{{ date('d/m/Y',strtotime(@$schedule->date)) }}</span></h4>
            <h4>Hình thức thanh toán:</h4>
            <select name="bank-type" required>
                <option value="1">Ví điện tử</option>
                <option value="0">Tiền mặt</option>
            </select>
        </div>
        <div class="col-md-6">
            <p>Đối với độ tuổi từ 8 trở xuống, giá vé <b class="text-danger">miễn phí</b></p>
            <p>Đối với độ tuổi từ 8 trở lên, giá vé hạng thường sẽ là <b class="text-danger">{{ number_format(@$schedule->price,-3,',',',') }} VND</b></p>
            <p>Đối với độ tuổi từ 8 trở lên, giá vé hạng vip sẽ là <b class="text-danger">{{ number_format(@$schedule->price * 1.05,-3,',',',') }} VND</b></p>
        </div>
        <div class="col-md-12">
            <button type="button" class="button" id="back-3" style="background-color:#fdca52;">Trở lại</button>
            <button type="submit" class="button" name="submit">Thanh toán</button>
        </div>
    </div>
</div>