<div class="container" id="step-3">
    <h3>Chọn chỗ ngồi</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Họ tên</th>
                        <th>Ghế đi</th>
                        <th>Loại vé</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($customers))
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td><input type="radio" name="customer-slot" value="customer-slot-{{ $key }}" /></td>
                                <td>{{ $customer['name'] }}</td>
                                <td id="customer-slot-{{ $key }}"></td>
                                <input type="hidden" name="slot[]" id="customer-slot-{{ $key }}-input"/>
                                <td>{{ $customer['type'] }}</td>
                                <input type="hidden" name="type[]" value="{{ $customer['type'] }}"/>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <p>Ghi chú</p>
            <ul>
                <li>
                    <span style="padding:2px 30px 0px 30px;background-color:#EFEFEF;"></span>
                    &nbsp;Ghế trống
                </li>
                <li>
                    <span style="padding:2px 30px 0px 30px;background-color:#C9302C;"></span>
                    &nbsp;Ghế đã bán
                </li>
            </ul>
        </div>
        <div class="col-md-6">
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
                            <button type="button" class="btn {{ @in_array($slot, $slots) ? 'btn-danger' : '' }}" {{ @in_array($slot, $slots) ? 'disabled' : '' }} onclick="updateSlot('{{ $slot }}',this);">{{ $slot }}</button>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="slot2">
                    @if (isset($schedule->slot_2))
                        @foreach (json_decode($schedule->slot_2,true) as $slot)
                            <button type="button" class="btn {{ @in_array($slot, $slots) ? 'btn-danger' : '' }}" {{ @in_array($slot, $slots) ? 'disabled' : '' }} onclick="updateSlot('{{ $slot }}',this);">{{ $slot }}</button>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" class="button" id="back-2" style="background-color:#fdca52;">Trở lại</button>
            <button type="button" class="button" id="continue-3">Tiếp tục</button>
        </div>
    </div>
</div>