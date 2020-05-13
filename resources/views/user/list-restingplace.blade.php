@extends('user/index')
@section('title', "List resting place")

@section('content')
<main class="hotel-main">
    <div class="container">
        <div class="rp-title">
            <a href="">Trang chủ</a><span>></span><a href="" class="main-active">Khách sạn (homestay, ...) {{ $place['name'] }}</a>
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                @include('user/partials/filter_rp')
                <div class="col-9">
                   <div class="list-hotel">
                        <p class="hotel-notification">Hãy lựa chọn cho mình nơi ở tốt nhất tại<span class="main-active"> {{ $place['name'] }}</span></p>
                       <div class="list-hotel-item">
                            @foreach ($inforRP as $key => $value)
                                <div class="rp-result-item" data-toggle="modal" data-target="#detailRoom">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="rp-item-img">
                                                <img src="{{  asset('user/img/146006268.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="rp-item-infor">
                                                <div class="rp-name">
                                                    <p><small>{{ $value['tname'] }} </small><a href="">{{ $value['name'] }}</a> <span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></p>
                                                </div>
                                                <div class="rp-map">
                                                    <span class="glyphicon glyphicon-map-marker"></span><p>24 Phạm Tuấn Tài, Nghĩa Tân, Cầu Giấy, Hà Nội - <a href="" class="rp-click-map" data-toggle="modal" data-target="#popupMap">Xem trên bản đồ</a></p>
                                                </div>
                                                <div class="rp-description">
                                                    <p>Lakeside 1 Hotel Nam Định cung cấp chỗ nghỉ tại Như Thức. Khách sạn 3 sao này có lễ tân 24 giờ, dịch vụ phòng và WiFi miễn phí. Chỗ nghỉ có thể bố trí chỗ đỗ xe riêng với một khoản phụ phí.</p>
                                                    <p>Phòng nghỉ tại khách sạn được trang bị máy điều hòa, TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, chậu rửa vệ sinh, máy sấy tóc và tủ để quần áo.</p>
                                                    <p>Khách sạn phục vụ bữa sáng kiểu Á hàng ngày.</p>
                                                    <p>Lakeside 1 Hotel Nam Định cung cấp chỗ nghỉ 3 sao với bể sục.</p>
                                                    <p>Khách sạn cách thành phố Ninh Bình 32 km. Sân bay gần nhất là Sân bay quốc tế Cát Bi, nằm trong bán kính 100 km từ LakeSide 1 Hotel Nam Định. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="hotel-fb-price">
                                                <div class="hotel-list-feedback">
                                                    <div class="hotel-feedback-user">
                                                        <div class="hotel-fb-user-number">
                                                            9.1
                                                        </div>
                                                        <div class="hotel-fb-user-text">
                                                            <p class="hotel-fb-user-text-up">Tuyệt hảo</p>
                                                            <p class="hotel-fb-user-text-down">1,250 đánh gía</p>
                                                        </div>
                                                        <div class="clear-fix"></div>
                                                    </div>
                                                </div>
                                                <div class="hotel-avg-price">
                                                    <div class="sr__card_price bui-spacer--large">
                                                    Giá trung bình/đêm: <br><span>VND&nbsp;2.524.952</span>
                                                    </div>
                                                    <button type="button" class="btn btn-primary">Danh sách phòng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
