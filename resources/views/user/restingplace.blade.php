@extends('user/index')
@section('title', "Resting place")

@section('content')
<main class="rp-main booking-main">
    <div class="container">
        <div class="rp-title">
            <a href="{{ route('homepage') }}">Trang chủ</a><span>></span><a href="{{ route('user.listRestingPlace',['idp' => 0,'idt' => $inforRP['type']]) }}">{{ $inforRP['tname'] }}</a><span>></span><a href="{{ route('user.listRestingPlace',['idp' => $inforRP['place'], 'idt' => 0]) }}">{{ $inforRP['pname'] }}</a><span>></span><a href="" class="main-active">{{ $inforRP['tname'] }} {{ $inforRP['name'] }}</a>
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                <div class="col-3">
                    @include('user/partials/form')
                </div>
                <div class="col-9">
                    <div class="rp-menu">
                        <ul>
                            <li><a href="#ttt">Thông tin chung</a></li>
                            <li><a href="#tn">Tiện nghi</a></li>
                            <li><a href="#qt">Quy tắc</a></li>
                            <!-- <li><a href="#tk">Tìm kiếm</a></li> -->
                            <li><a href="#dg">Đánh giá của khách hàng</a></li>
                        </ul>
                        <hr>
                    </div>
                    <div id="ttt" class="rp-infor">
                        <div class="rp-name">
                            <p><small>{{ $inforRP['tname'] }} </small>{{ $inforRP['name'] }} @for($i = 1; $i <= $inforRP['rate'] ; $i++) <span><i class="fa fa-star"></i></span> @endfor</p>
                        </div>
                        <div class="rp-book">
                            <span class="rp-wishlist"><i class="fa fa-heart"></i></span>
                            <button type="button" class="btn btn-primary">Danh sách phòng</button>
                        </div>
                        <div class="clear-fix"></div>
                        <div class="rp-map">
                            <span class="glyphicon glyphicon-map-marker"></span><p>{{ $inforRP['address'] }} - <a href="" class="rp-click-map" data-toggle="modal" data-target="#popupMap">Xem trên bản đồ</a></p>
                        </div>
                        <div class="modal fade" id="popupMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.7158132539735!2d105.78418831488369!3d21.044054085990023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab339514fb6b%3A0xd86058e46d2043b8!2zMjQgUGjhuqFtIFR14bqlbiBUw6BpLCBE4buLY2ggVuG7jW5nIEjhuq11LCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1585722434338!5m2!1svi!2s" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">Xem trên bản đồ</iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($image as $key => $img)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active">
                                    <div class="img-active">
                                        <img src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $img }}" alt="" >
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $image[0] }}" >
                            </div>
                            @foreach ($image as $key => $img)
                                @if($key > 0)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $img }}" alt="{{ $key }} slide">
                                    </div>
                                @endif
                            @endforeach
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
                    <div class="rp-description">
                        <p>Lakeside 1 Hotel Nam Định cung cấp chỗ nghỉ tại Như Thức. Khách sạn 3 sao này có lễ tân 24 giờ, dịch vụ phòng và WiFi miễn phí. Chỗ nghỉ có thể bố trí chỗ đỗ xe riêng với một khoản phụ phí.</p>
                        <p>Phòng nghỉ tại khách sạn được trang bị máy điều hòa, TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, chậu rửa vệ sinh, máy sấy tóc và tủ để quần áo.</p>
                        <p>Khách sạn phục vụ bữa sáng kiểu Á hàng ngày.</p>
                        <p>Lakeside 1 Hotel Nam Định cung cấp chỗ nghỉ 3 sao với bể sục.</p>
                        <p>Khách sạn cách thành phố Ninh Bình 32 km. Sân bay gần nhất là Sân bay quốc tế Cát Bi, nằm trong bán kính 100 km từ LakeSide 1 Hotel Nam Định. </p>
                    </div>
                    <div id="tn" class="rp-convenient">
                        <div class="rp-search-header">
                            <p>Các tiện nghi</p>
                        </div>
                        <div class="rp-convenient-content">
                            @if($inforRP['pool'])
                                <div class="rp-content-pool rpc-content">
                                    <svg class="bk-icon -iconset-pool hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M8.7 79.2a3.8 3.8 0 0 1 5.5-1.3c21 15 34.5 9 50 2.2 14.5-6.5 30.8-13.7 53.6-1.4a4.5 4.5 0 0 1 1.8 5.9 3.9 3.9 0 0 1-5.4 2c-19.5-10.7-32.8-4.8-47 1.5-8.7 3.9-17.6 7.9-28 7.9A50 50 0 0 1 9.9 85.2a4.6 4.6 0 0 1-1.2-6zm109 15.5c-22.7-12.4-39-5-53.5 1.4-15.5 6.9-29 12.9-50-2.2a3.8 3.8 0 0 0-5.6 1.3 4.6 4.6 0 0 0 1.2 6A50 50 0 0 0 39.3 112c10.3 0 19.2-4 28-7.9 14-6.3 27.4-12.2 46.9-1.6a3.9 3.9 0 0 0 5.4-2 4.5 4.5 0 0 0-1.8-5.8zM100 56a12 12 0 1 0-12-12 12 12 0 0 0 12 12zM64.2 72c7.2-3.3 15.2-7 23.8-8.2 0 0-4-8.8-6.8-13.9l-18-29.2c-2.5-4.3-7.5-6-13.5-3.6L27.9 26a6.2 6.2 0 0 0-3.5 7.8 6 6 0 0 0 8 3.4L50 29.7a4 4 0 0 1 5 1.7l6 13.2L24 72c17.6 9.8 26.3 6.3 40.3 0z"></path></svg>
                                    Hồ bơi
                                </div>
                            @endif
                            @if($inforRP['parking'])
                                <div class="rp-content-parking rpc-content">
                                    <svg class="bk-icon -iconset-parking_sign hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M70.8 44H58v16h12.8a8 8 0 0 0 0-16z"></path><path d="M108 8H20A12 12 0 0 0 8 20v88a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12V20a12 12 0 0 0-12-12zM70 76H58v24H42V28h28a24 24 0 0 1 0 48z"></path></svg>
                                    Bãi đậu xe miễn phí
                                </div>
                            @endif
                            @if($inforRP['wifi'])
                                <div class="rp-content-wifi rpc-content">
                                    <svg class="bk-icon -iconset-wifi hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><circle cx="64" cy="100" r="12"></circle><path d="M118.3 32.7A94.9 94.9 0 0 0 64 16 94.9 94.9 0 0 0 9.7 32.7a4 4 0 1 0 4.6 6.6A87 87 0 0 1 64 24a87 87 0 0 1 49.7 15.3 4 4 0 1 0 4.6-6.6zM87.7 68.4a54.9 54.9 0 0 0-47.4 0 4 4 0 0 0 3.4 7.2 47 47 0 0 1 40.6 0 4 4 0 0 0 3.4-7.2z"></path><path d="M104 50.5a81.2 81.2 0 0 0-80 0 4 4 0 0 0 4 7 73.2 73.2 0 0 1 72 0 4 4 0 0 0 4-7z"></path></svg>
                                    Wifi miễn phí
                                </div>
                            @endif
                            @if($inforRP['smoke'] == 0)
                                <div class="rp-content-smoke rpc-content">
                                    <svg class="bk-icon -iconset-nosmoking hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M64 8a56 56 0 1 0 56 56A56 56 0 0 0 64 8zm0 104a48 48 0 0 1-36.6-79l31 31H28v8h38.3L95 100.6A47.8 47.8 0 0 1 64 112zm36.6-17l-23-23H84v-8H69.7L33 27.4A48 48 0 0 1 100.6 95zM92 64h8v8h-8zm0-10c0-7.7-5.9-14-13.2-14H78a2 2 0 0 1-2-2 10 10 0 0 0-10-10h-8a2 2 0 0 1 0-4h8a14 14 0 0 1 13.8 12c9 .6 16.2 8.4 16.2 18a2 2 0 0 1-4 0zm-8 0a2 2 0 0 1-4 0 2 2 0 0 0-2-2h-3a15 15 0 0 1-15-15 2 2 0 0 1 4 0 11 11 0 0 0 11 11h3a6 6 0 0 1 6 6z"></path></svg>
                                    Phòng không hút thuốc
                                </div>
                            @endif
                            <div class="clear-fix"></div>
                        </div>
                    </div>
                    <hr class="fix-section">
                    <div id="qt" class="rp-rule">
                        <div class="rp-search-header">
                            <p>Quy tắc</p>
                        </div>
                        <div class="rp-rule-content">
                            <div class="rp-rule-checkin rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Nhận phòng
                                    </div>
                                    <div class="col-9">
                                        <span data-component="prc/timebar" class="u-display-block" data-from="14:00" data-from-label="14:00" data-caption="Từ 14:00 giờ">
                                            <span class="timebar">
                                                <span class="timebar__core">
                                                    <span class="timebar__base">
                                                        <span class="timebar__bar" style="left:58.333333333333336%; width:42%"></span>
                                                    </span>

                                                        <span class="timebar__label" style="left: 58.3333%; margin-left: -14px;">14:00</span>



                                                        <span class="timebar__caption" style="left: 79.3333%; margin-left: -43.5px;">
                                                            Từ 14:00 giờ
                                                            <span class="timebar__caption-pointer"></span>
                                                        </span>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-checkout rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Trả phòng
                                    </div>
                                    <div class="col-9">
                                        <span data-component="prc/timebar" class="u-display-block" data-until="10:00" data-until-label="10:00" data-from="06:00" data-from-label="06:00" data-caption="06:00 - 10:00">
                                            <span class="timebar   ">
                                                <span class="timebar__core">
                                                    <span class="timebar__base">
                                                        <span class="timebar__bar" style="left:25%; width:16.66666666666667%"></span>
                                                    </span>

                                                        <span class="timebar__label" style="left: 25%; margin-left: -14px;">06:00</span>


                                                        <span class="timebar__label" style="left: 41.6667%; margin-left: -14px;">10:00</span>


                                                        <span class="timebar__caption" style="left: 33.3333%; margin-left: -45px;">
                                                        06:00 - 10:00
                                                        <span class="timebar__caption-pointer"></span></span>

                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-cancer rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Huỷ đặt phòng
                                    </div>
                                    <div class="col-9">
                                        <p>
                                            Các chính sách hủy và thanh toán trước có khác biệt dựa trên loại chỗ nghỉ.
                                            Vui lòng <a href="#availability_target" id="rm_cond_link_enter_dates">nhập ngày tháng lưu trú</a> và kiểm tra các điều kiện của phòng bạn chọn.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-people rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Trẻ em và giường
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-rule-child">
                                            <p>Phù hợp cho tất cả trẻ em.</p>
                                            <p>Trẻ em từ 4 tuổi trở lên được tính như người lớn tại chỗ nghỉ này.</p>
                                            <p class="rp-rule-child-note">Để xem thông tin giá và tình trạng phòng trống chính xác, vui lòng thêm số lượng và độ tuổi của trẻ em trong nhóm của bạn khi tìm kiếm. </p>
                                            <table class="table table-bordered">
                                                <tbody>
                                                  <tr>
                                                    <td>0-1 tuổi</td>
                                                    <td>Có thể sử dụng cũi hoặc giường phụ nếu có yêu cầu</td>
                                                    <td class="rp-price-free">MIỄN PHÍ</td>
                                                  </tr>
                                                  <tr>
                                                    <td>2-15 tuổi</td>
                                                    <td>Có thể sử dụng giường phụ nếu có yêu cầu</td>
                                                    <td class="rp-price-free">MIỄN PHÍ</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Từ 16 tuổi trở lên</td>
                                                    <td>Có thể sử dụng giường phụ nếu có yêu cầu</td>
                                                    <td>€ 25/người/đêm</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-age rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Độ tuổi
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-rule-child">
                                            @if($inforRP['age'] == 0)
                                                <p>Không có yêu cầu về độ tuổi khi nhận phòng</p>
                                            @endif
                                            @if($inforRP['age'] > 0)
                                                <p>{{ $inforRP['age'] }} tuổi</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-smoke rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Hút thuốc
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-rule-child">
                                            @if($inforRP['smoke'] == 0)
                                                <p>Không cho phép hút thuốc</p>
                                            @endif
                                            @if($inforRP['age'] == 1)
                                                <p>Có phòng hút thuốc</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rp-rule-animal rp-rule-range">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="icon_calendar"></i>
                                        Vật nuôi
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-rule-child">
                                            @if($inforRP['animal'] == 0)
                                                <p>Vật nuôi không được phép</p>
                                            @endif
                                            @if($inforRP['animal'] == 1)
                                                <p>Được mang theo vật nuôi</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="fix-section">
                    <!-- <div id="tk" class="rp-search">
                        <div class="rp-search-header">
                            <p>Tìm kiếm phòng trống tại khách sạn Fusion Suites Saigon</p>
                        </div>
                        <div class="booking-form">
                            <form action="#">
                                <div class="rp-search-form-left">
                                    <div class="rp-search-left-top">
                                        <div class="check-date">
                                            <label for="date-in">Check In:</label>
                                            <input type="text" class="date-input" id="date-in">
                                            <i class="icon_calendar"></i>
                                        </div>
                                        <div class="check-date">
                                            <label for="date-out">Check Out:</label>
                                            <input type="text" class="date-input" id="date-out">
                                            <i class="icon_calendar"></i>
                                        </div>
                                    </div>
                                    <div class="rp-search-left-bottom">
                                        <div class="select-option">
                                            <label for="guest">Guests:</label>
                                            <select id="guest">
                                                <option value="">2 Adults</option>
                                                <option value="">3 Adults</option>
                                            </select>
                                        </div>
                                        <div class="select-option">
                                            <label for="room">Room:</label>
                                            <select id="room">
                                                <option value="">1 Room</option>
                                                <option value="">2 Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="rp-search-form-right">
                                    <button type="submit">Check Availability</button>
                                </div>
                                <div class="clear-fix"></div>
                            </form>
                        </div>
                        <div class="rp-search-result">
                            <div class="rp-result-item" data-toggle="modal" data-target="#detailRoom">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="rp-item-img">
                                            <img src="img/146006268.jpg" alt="">
                                            <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="rp-item-infor">
                                            <div class="rp-item-name">
                                                <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-enabled">(Còn trống)</span></p>
                                            </div>
                                            <div class="rp-item-featured">
                                                <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                                <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                                <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                                <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="rp-item-booking">
                                            <button type="button" class="btn btn-success">Booking now</button>
                                            <button type="button" class="btn btn-primary">Add to booking</button>
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
                            <div class="rp-result-item">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="rp-item-img">
                                            <img src="img/146006268.jpg" alt="">
                                            <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="rp-item-infor">
                                            <div class="rp-item-name">
                                                <p class="rp-item-name-room"><small>Phòng </small>202A <span class="rp-room-enabled">(Còn trống)</span></p>
                                            </div>
                                            <div class="rp-item-featured">
                                                <p class="rp-item-people">Phòng ngủ dành cho : <span>5 người <i class="fas fa-users"></i> <i class="fas fa-user-friends" style="display: none;"></i><i class="fas fa-user" style="display: none;"></i></span></p>
                                                <p><i class="fa fa-home"></i>Diện tích phòng :  50m&#178;</p>
                                                <p><i class="fa fa-bed"></i>1 giường đơn</p>
                                                <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="rp-item-booking">
                                            <button type="button" class="btn btn-success">Booking now</button>
                                            <button type="button" class="btn btn-primary">Add to booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div id="dg" class="rd-reviews">
                        <div class="rp-search-header">
                            <p>Đánh giá của khách hàng</p>
                        </div>
                        @if($feedback)
                            @foreach ($feedback as $fb)
                                <div class="review-item">
                                    <div class="ri-pic">
                                        @if($fb['avatar'] !== null)
                                            <img src="{{ URL::to('/') }}/user/uploads/avatar/{{ $fb['avatar'] }}" alt="" class="ps-left-img">
                                        @endif
                                        @if($fb['avatar'] === null && $fb['gender'] === 1)
                                            <img src="{{ asset('user/img/avatar-male.webp') }}" alt="" class="ps-left-img">
                                        @endif
                                        @if($fb['avatar'] === null && $fb['gender'] === 0)
                                            <img src="{{ asset('user/img/female.jpg') }}" alt="" class="ps-left-img">
                                        @endif
                                    </div>
                                    <div class="ri-text">
                                        <span>{{ $fb['created_at'] }}</span>
                                        <h5>
                                            @if($fb['username'] === null)
                                                {{ $fb['surname'] }} {{ $fb['name'] }}
                                            @elseif($fb['username'] !== null)
                                                {{ $fb['username'] }}
                                            @endif
                                            <span>
                                                @if($fb['emotion'] == 1)
                                                    <img src="{{ asset('user/img/emotion_1.gif') }}" alt="" class="ps-right-img">
                                                @endif
                                                @if($fb['emotion'] == 2)
                                                    <img src="{{ asset('user/img/emotion_2.gif') }}" alt="" class="ps-right-img">
                                                @endif
                                                @if($fb['emotion'] == 3)
                                                    <img src="{{ asset('user/img/emotion_3.gif') }}" alt="" class="ps-right-img">
                                                @endif
                                                @if($fb['emotion'] == 4)
                                                    <img src="{{ asset('user/img/emotion_4.gif') }}" alt="" class="ps-right-img">
                                                @endif
                                            </span>
                                        </h5>

                                        <p>{{ $fb['content'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @empty($feedback)
                            <h5>
                                Hiện tại chưa có phản hồi từ khách hàng!!!
                            </h5>
                        @endempty
                    </div>
                    @if($count > 4)
                        <div class="rv-off-overfollow rv-overfollow">
                            Xem tất cả đánh giá ...
                        </div>
                    @endif
                    <div class="rv-on-overfollow rv-overfollow rv-on-display">
                        Ẩn bớt đánh giá ...
                    </div>
                    <div class="review-add fix-top">
                        <div class="rp-search-header">
                            <p>Đánh giá của bạn</p>
                        </div>
                        <div class="rp-request-login">
                            @if(Session::get('idSession') === null)
                                <h5 class=rp-validate-review>Vui lòng <a href="" data-toggle="modal" data-target="#formLogin">đăng nhập</a> để đánh giá</h5>
                            @endif

                            <div class="modal fade" id="formLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5> --}}
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="limiter">
                                                <div class="container-login100">
                                                    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                                                        <form class="login100-form validate-form" action="{{ route('reviewHandleLogin') }}" method="POST">
                                                            @csrf
                                                            <span class="login100-form-title p-b-49">
                                                                Đăng nhập
                                                            </span>

                                                            <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                                                                <span class="label-input100">Email</span>
                                                                <input class="input100" type="text" name="lgEmail" placeholder="Nhập vào email">
                                                                <!-- <span class="focus-input100" data-symbol="&#xf190;"></span> -->
                                                            </div>

                                                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                                                <span class="label-input100">Mật khẩu</span>
                                                                <input class="input100" type="password" name="lgPass" placeholder="Nhập vào mật khẩu">
                                                                <!-- <span class="focus-input100" data-symbol="&#xf190;"></span> -->
                                                            </div>

                                                            <div class="text-right p-t-8 p-b-31">
                                                                <a href="#">
                                                                    Quên mật khẩu?
                                                                </a>
                                                            </div>

                                                            <div class="container-login100-form-btn">
                                                                <div class="wrap-login100-form-btn">
                                                                    <div class="login100-form-bgbtn"></div>
                                                                    <button class="login100-form-btn">
                                                                        Đăng nhập
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rp-form-review">
                            @if(Session::get('idSession') !== null)
                                <form action="{{ route('user.reviewRestingPlace',['idrp' => $inforRP['id'], 'idacc' => Session::get('idSession')]) }}" class="ra-form">
                            @elseif(Session::get('idSession') === null)
                                <form action="{{ route('user.reviewRestingPlace',['idrp' => $inforRP['id'], 'idacc' => 0]) }}" class="ra-form">
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <h5>Mức độ hài lòng :
                                                <ul class="rv-emotion-list">
                                                    <li class="rv-emotion-item">
                                                        <input type="radio" name="rvEmotionicon" id="emotion-1" value="1">
                                                        <label for="emotion-1">
                                                            <img src="{{ asset('user/img/emotion_1.gif') }}" alt="" class="rv-emotion">
                                                            <span>Không hài lòng</span>
                                                        </label>
                                                    </li>
                                                    <li class="rv-emotion-item">
                                                        <input type="radio" name="rvEmotionicon" id="emotion-2" value="2">
                                                        <label for="emotion-2">
                                                            <img src="{{ asset('user/img/emotion_2.gif') }}" alt="" class="rv-emotion">
                                                            <span>Hài lòng</span>
                                                        </label>
                                                    </li>
                                                    <li class="rv-emotion-item">
                                                        <input type="radio" name="rvEmotionicon" id="emotion-3" value="3">
                                                        <label for="emotion-3">
                                                            <img src="{{ asset('user/img/emotion_3.gif') }}" alt="" class="rv-emotion">
                                                            <span>Tốt</span>
                                                        </label>
                                                    </li>
                                                    <li class="rv-emotion-item">
                                                        <input type="radio" name="rvEmotionicon" id="emotion-4" value="4">
                                                        <label for="emotion-4">
                                                            <img src="{{ asset('user/img/emotion_4.gif') }}" alt="" class="rv-emotion">
                                                            <span>Tuyệt hảo</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </h5>
                                        </div>
                                        <textarea name="rvEmotionContent" placeholder="Đánh giá của bạn về khách sạn"></textarea>
                                        <button type="submit" class="btn btn-primary btn-lg">Đánh giá</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
