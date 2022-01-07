<div id="top-bar" class="tb-text-white">
    <div class="container" style="color: white;">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="info">
                    <ul class="list-unstyled list-inline">
                        <li><span><i class="fa fa-map-marker"></i></span>TP.HCM</li>
                        <li><span><i class="fa fa-phone"></i></span>0123456789</li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="links">
                    <ul class="list-unstyled list-inline">
                        @if (!Auth::check())
                            <li class="sigi">
                                <a href="{{ route('web.auth.login') }}"><span><i class="fa fa-lock"></i></span>Đăng nhập</a>
                            </li>
                            <li class="sig">
                                <a href="{{ route('web.auth.register') }}"><span><i class="fa fa-plus"></i></span>Đăng ký</a>
                            </li>
                        @else
                            @php  
                                $user = \App\Models\User::find(Auth::user()->id);
                            @endphp
                            <li>
                                <a href="javascript:void(0)"><span>Xin chào, </span>{{ $user->name }}</a>
                            </li>
                            <li>
                                <a href="{{ route("web.edit.form",['id' => $user->id]) }}"><span></span>Sửa thông tin cá nhân</a>
                            </li>
                            <li>
                                <a href="{{ route("web.orders",['id' => $user->id]) }}"><span></span>Đơn hàng của tôi</a>
                            </li>
                            <li>
                                <a href="{{ route('web.auth.logout') }}"><span></span>Đăng xuất</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('web.top') }}" class="navbar-brand"><span><img src="{{ asset('assets/web/images/favicon.png') }}" width="50"/>TTK</span> Travel</a>
        </div>
    </div>
</nav>



