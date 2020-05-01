@extends('user/index')
@section('title', "Personal")

@section('content')
<main class="personal-main booking-main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="ps-welcome-left">
                    <img src="img/room/avatar/avatar-1.jpg" alt="" class="ps-left-img">
                    <div class="ps-left-info">
                        <p class="ps-left-name">Lê Minh Chính</p>
                        <a href="">Cập nhật hồ sơ của bạn</a>
                    </div>
                    <div class="ps-left-notifi">
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                                <a href="">Thêm tên hiển thị</a>
                                <p>Có thể được cập nhật bất cứ khi nào bạn muốn và được hiển thị bên cạnh các đánh giá của bạn.</p>
                            </div>
                        </div>
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                                <a href="">Thêm số điện thoại liên lạc</a>
                                <p>Thông tin này chỉ được dùng trong trường hợp chỗ nghỉ cần liên hệ với bạn.</p>
                            </div>
                        </div>
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                                <a href="">Yêu cầu đăng phòng</a>
                                <p>Bạn là chủ sở hữu và bạn muốn đăng thông tin khách sạn (homestay, resort, ...) lên trang web.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('user/partials/form')
            </div>
            <div class="col-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Trang cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đặt phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cập nhật hồ sơ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Yêu cầu đăng phòng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection
