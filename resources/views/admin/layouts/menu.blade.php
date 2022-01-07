<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @if (Session::get('role') == 0)
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> Thống kê
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-male" aria-hidden="true"></i> Nhân viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('staff.list') }}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{ route('staff.create') }}">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Khách hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-plane" aria-hidden="true"></i> Chuyến bay<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('schedule.list') }}">Danh sách</a>
                    </li>
                    @if (Session::get('role') == 0)
                        <li>
                            <a href="{{ route('schedule.create') }}">Tạo mới</a>
                        </li>
                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-money" aria-hidden="true"></i> Đơn hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('order.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>