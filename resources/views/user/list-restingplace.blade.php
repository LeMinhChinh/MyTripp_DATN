@extends('user/index')
@section('title', "List resting place")

@section('content')
<main class="hotel-main">
    <div class="container">
        <div class="rp-title">
            <a href="{{ route('homepage') }}">Trang chủ</a><span>></span>@if($place) <a href="{{ route('user.listRestingPlace',['idp' => $place['id'], 'idt' => 0]) }}" class="main-active">Khách sạn (homestay, ...) {{ $place['name'] }}</a> @endif @if($type) <a href="{{ route('user.listRestingPlace',['idp' => 0, 'idt' => $type['id']]) }}" class="main-active">Danh sách {{ $type['name'] }}</a> @endif
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                @include('user/partials/filter_rp')
                <div class="col-9">
                   <div class="list-hotel">
                        <p class="hotel-notification">Hãy lựa chọn cho mình nơi ở tốt nhất @if($place) <span class="main-active">tại {{ $place['name'] }}</span> @endif</p>
                       <div class="list-hotel-item">
                            @foreach ($inforListRP as $key => $value)
                                <div class="rp-result-item" data-toggle="modal" data-target="#detailRoom" data-index="{{ $key }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="rp-item-img">
                                                <a href="{{ route('user.restingplace',['id' => $value['id']]) }}">
                                                    @foreach($images as $k => $v)
                                                        @if($key == $k)
                                                            <img src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $v['0'] }}" alt="">
                                                        @endif
                                                    @endforeach
                                                </a>
                                                {{-- {{ URL::to('/') }}/user/uploads/resting_place/{{ $image[0] }} --}}
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="rp-item-infor">
                                                <div class="rp-name">
                                                    <p><small>{{ $value['tname'] }} </small><a href="{{ route('user.restingplace',['id' => $value['id']]) }}">{{ $value['name'] }}</a> @for($i = 1; $i <= $value['rate'] ; $i++) <i class="fa fa-star"></i> @endfor </p>
                                                </div>
                                                <div class="rp-map">
                                                    <span class="glyphicon glyphicon-map-marker"></span><p>{{ $value['address'] }} - <a href="" class="rp-click-map" data-toggle="modal" data-target="#popupMap">Xem trên bản đồ</a></p>
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
                                                            <p class="hotel-fb-number hideEvaluate">9.1</p>
                                                            <p class="hotel-fb-number-default">...</p>
                                                        </div>
                                                        <div class="hotel-fb-user-text">
                                                            <p class="hotel-fb-user-text-up hideEvaluate">Tuyệt hảo</p>
                                                            <p class="hotel-fb-user-text-up-deafault">Tuyệt hảo</p>
                                                            @foreach ($count as $c)
                                                                @if($value['id'] == $c['id'])
                                                                    <p class="hotel-fb-user-text-down enabled-feedback">{{ $c['count_id'] }} đánh giá </p>
                                                                @endif
                                                                
                                                            @endforeach
                                                            <p class="hotel-fb-user-text-down disabled-feedback">Chưa có đánh giá</p>
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
                       <div class="pagination-page fix-top">{!! $paginate->links() !!}</div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
