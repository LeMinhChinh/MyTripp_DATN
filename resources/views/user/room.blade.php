@extends('user/index')
@section('title', "Search room")

@section('content')
<main class="room-main">
    <div class="container">
        <div class="rp-title">
            <a href="">Trang chủ</a><span>></span><a href="">Khách sạn</a><span>></span><a href="">Hà Nội</a><span>></span><a href="">Khách sạn Fusion Suites Saigon</a><span>></span><a href="" class="main-active">Danh sách phòng</a>
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                @include('user/partials/filter_room')
                <div class="col-9">
                   <div class="row">
                        <div class="col-6">
                            <div class="room-item" data-toggle="modal" data-target="#detailRoom">
                                <div class="room-item-img">
                                    <img src="img/room/room-1.jpg" alt="">
                                    <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                </div>
                                <div class="ri-text">
                                    <div class="rp-item-infor">
                                        <div class="rp-item-name">
                                            <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-enabled">(Còn trống)</span></p>
                                        </div>
                                        <div class="rp-item-feedback">
                                            <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>1.245.547&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>5%</span></p>
                                            <p class="rp-item-promo-price">Nay chỉ còn : <span>985.542&#8363;</span></p>
                                        </div>
                                        <div class="rp-item-featured">
                                            <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                            <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                            <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                            <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                        </div>
                                    </div>
                                    <div class="room-btn-booking">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary">Add to booking</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-success">Booking now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="detailRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog popup-detail" role="document">
                              <div class="modal-content content-detail">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><p class="rp-item-name-room"><small>Khách sạn </small> Fusion Suites Saigon - <small>Phòng </small>202A <span class="rp-room-enabled">(Còn trống)</span></p></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="rp-item-infor">
                                                <div class="rp-item-feedback">
                                                    <p class="rp-item-title-index">Đánh giá của khách hàng : </p>
                                                    <a href="">Tuyệt vời 8,9 - 245 đánh giá</a>
                                                </div>
                                                <div class="rp-item-featured">
                                                    <div class="rp-item-feedback">
                                                        <p class="rp-item-title-index">Thông tin chung : </p>
                                                        <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                                        <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                                        <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                                        <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                                    </div>
                                                    <div class="rp-item-feedback">
                                                        <p class="rp-item-title-index">Giải trí : </p>
                                                        <p><i class="fas fa-wifi"></i>Wifi miễn phí tất cả các phòng</p>
                                                        <p><i class="fas fa-phone-alt"></i>Điện thoại</p>
                                                        <p><i class="fas fa-tv"></i>Televison</p>
                                                    </div>
                                                    <div class="rp-item-feedback">
                                                        <p class="rp-item-title-index">Tiện nghi : </p>
                                                        <p><img src="https://img.icons8.com/pastel-glyph/64/000000/air-conditioner--v2.png"/>Điều hòa</p>
                                                    </div>
                                                    <div class="rp-item-feedback">
                                                        <p class="rp-item-title-index">Giá : </p>
                                                        <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>1.245.547&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>5%</span></p>
                                                        <p class="rp-item-promo-price">Nay chỉ còn : <span>985.542&#8363;</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="rp-detail-img">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                                            <div class="img-active">
                                                                <img src="img/summer-trip-hồ-cốc-1.jpg" alt="" >
                                                            </div>
                                                        </li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                                            <div class="img-active">
                                                                <img src="img/summer-trip-hồ-cốc-1.jpg" alt="" >
                                                            </div>
                                                        </li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                                            <div class="img-active">
                                                                <img src="img/summer-trip-hồ-cốc-1.jpg" alt="" >
                                                            </div>
                                                        </li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="img/summer-trip-hồ-cốc-1.jpg" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="img/summer-trip-hồ-cốc-1.jpg" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="img/summer-trip-hồ-cốc-1.jpg" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="room-item">
                                <div class="room-item-img">
                                    <img src="img/room/room-1.jpg" alt="">
                                    <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                </div>
                                <div class="ri-text">
                                    <div class="rp-item-infor">
                                        <div class="rp-item-name">
                                            <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-disabled">(Đã đặt)</span></p>
                                        </div>
                                        <div class="rp-item-feedback">
                                            <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>1.245.547&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>5%</span></p>
                                            <p class="rp-item-promo-price">Nay chỉ còn : <span>985.542&#8363;</span></p>
                                        </div>
                                        <div class="rp-item-featured">
                                            <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                            <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                            <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                            <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="room-item">
                                <div class="room-item-img">
                                    <img src="img/room/room-1.jpg" alt="">
                                    <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                </div>
                                <div class="ri-text">
                                    <div class="rp-item-infor">
                                        <div class="rp-item-name">
                                            <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-disabled">(Đã đặt)</span></p>
                                        </div>
                                        <div class="rp-item-feedback">
                                            <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>1.245.547&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>5%</span></p>
                                            <p class="rp-item-promo-price">Nay chỉ còn : <span>985.542&#8363;</span></p>
                                        </div>
                                        <div class="rp-item-featured">
                                            <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                            <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                            <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                            <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="room-item">
                                <div class="room-item-img">
                                    <img src="img/room/room-1.jpg" alt="">
                                    <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                </div>
                                <div class="ri-text">
                                    <div class="rp-item-infor">
                                        <div class="rp-item-name">
                                            <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-enabled">(Còn trống)</span></p>
                                        </div>
                                        <div class="rp-item-feedback">
                                            <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>1.245.547&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>5%</span></p>
                                            <p class="rp-item-promo-price">Nay chỉ còn : <span>985.542&#8363;</span></p>
                                        </div>
                                        <div class="rp-item-featured">
                                            <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                            <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                            <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                            <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
