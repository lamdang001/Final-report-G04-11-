<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - PHÒNG VÉ TTK TRAVEL</title>
    <link rel="icon" href="{{ asset('assets/web/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body>
    <header>
        <a href="{{ route('web.index') }}" class="brand">TTK Travel</a>
        <div class="menu-btn"></div>
        <div class="navigation">
            <div class="navigation-items">
                <a href="{{ route('web.top') }}" target="_blank">Mua vé trực tuyến</a>
            </div>
        </div>
    </header>
    <section class="home">
        <video class="video-slide active" src="{{ asset('assets/web/videos/2.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('assets/web/videos/1.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('assets/web/videos/4.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('assets/web/videos/5.mp4') }}" autoplay muted loop></video>
        <div class="content active">
            <h1>Wonderful Island<br><span>Phú Quốc</span></h1>
            <p>Trực thuộc tỉnh Kiên Giang, Phú Quốc được mệnh danh là Đảo Ngọc. Với những bãi biển nước xanh trong vắt
                như Bãi Sao và Bãi Dài, Phú Quốc thực sự là thiên đường cho những người yêu biển. Thị trấn Dương Đông là
                nơi tập trung dân cư sầm uất nhất trên đảo Phú Quốc, đặc biệt là khu chợ đêm nằm gần Dinh Cậu. Ngoài ra,
                làng chài Hàm Ninh, Gành Dầu và quần đảo An Thới cũng là những địa điểm tham quan không thể bỏ qua khi
                du lịch Phú Quốc. Đặc sản của Phú Quốc không chỉ có các loại hải sản tươi sống mà còn có hồ tiêu Phú
                Quốc, được trồng dọc theo con đường đất đỏ đi đến Bắc Đảo, Gành Dầu.</p>
            <a
                href="https://vietnammoi.vn/phu-quoc-nhieu-lan-duoc-gioi-truyen-thong-quoc-te-khen-ngoi-20200314152249081.htm" target="_blank">Xem
                thêm</a>
        </div>
        <div class="content">
            <h1>Vịnh<br><span>Hạ Long</span></h1>
            <p>Nổi tiếng với phong cảnh thiên nhiên độc đáo giữa biển khơi mênh mông, du lịch vịnh Hạ Long vì thế mà trở thành địa điểm tham quan tuyệt đẹp xuất hiện liên tục trên các mặt báo, các trang mạng xã hội. Không những thế, nơi đây còn có nền ẩm thực phong phú, mang đến nhiều trải nghiệm lý thú cho du khách tham quan.</p>
            <a href="https://vinpearl.com/vi/review-du-lich-vinh-ha-long-tu-a-z-di-dau-o-dau-an-gi-ngon">Xem thêm</a>
        </div>
        <div class="content">
            <h1>Thành phố<br><span>Vũng Tàu</span></h1>
            <p>Cách trung tâm thành phố Hồ Chí Minh chỉ khoảng 3 tiếng lái xe, với đường bờ biển trải dài 20km, Vũng Tàu là một trong những điểm đến yêu thích của du khách phía Nam. Nằm nhô hẳn ra khỏi đất liền như một dải đất, từ nơi đây, người ta có thể nhìn biển Đông cả khi trời mọc lẫn lúc hoàng hôn. Bên cạnh những giá trị cảnh quan thiên nhiên, Vũng Tàu còn là miền đất có truyền thống văn hóa lịch sử lâu đời.</p>
            <a href="https://www.ivivu.com/blog/2014/10/du-lich-vung-tau-cam-nang-tu-a-den-z/">Xem thêm</a>
        </div>
        <div class="content">
            <h1>Vịnh<br><span>Cam Ranh</span></h1>
            <p>Biển Cam Ranh đi mãi không muốn về là câu nói cửa miệng của du khách mỗi khi có dịp ghé thăm vịnh biển xinh đẹp và trong trẻo này vào những dịp hè nóng bỏng. Sở hữu hàng trăm bãi tắm thiên nhiên, Cam Ranh níu chân du khách trong bầu không khí mát rượi của biển xanh cát trắng nắng vàng, giải nhiệt xoá tan ngày hè chói chang hiệu quả.</p>
            <a href="https://nhatrangtoday.vn/vinh-cam-ranh-khanh-hoa-post32">Xem thêm</a>
        </div>
        <div class="owl-carousel owl-theme blog-post">
            <div class="slider-navigation">
                <div class="nav-btn active"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/web/js/index.js') }}"></script>
</body>

</html>
