@extends('user/index')
@section('title', "Search")

@section('content')
<main class="hotel-main">
    <div class="container">
        <div class="rp-title">
            <a href="{{ route('homepage') }}">Trang chủ</a><span>></span><a href="" class="main-active">Khách sạn còn phòng trống</a>
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                <div class="col-3">
                    <div class="r-filter-title">
                        <p class="bk-title">Lọc danh sách khách sạn</p>
                    </div>
                    <div class="hotel-filter-content">
                        <div class="booking-form">
                            <form action="{{ route('user.restingplaceBooking') }}" method="GET">
                                <input type="hidden" id="checkin" name="checkin" value="{{ $checkin }}">
                                <input type="hidden" id="checkout" name="checkout" value="{{ $checkout }}">
                                <input type="hidden" id="adult" name="adult" value="{{ $adult }}">
                                <input type="hidden" id="child" name="child" value="{{ $child }}">
                                <div class="r-filter-convenients r-people fix-top">
                                    <div class="r-prices-title r-title-4">
                                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-4 disabledIcon"></i><i class="fas fa-angle-down r-down-4"></i></p><p class="r-time-title-text">Đánh giá sao</p>
                                   </div>
                                    <div class="r-prices-content r-content-4">
                                        <div class="r-filter-convenient">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck11" name="rate[]" value="1" @if($rate !== null) @foreach ($rate as $item)
                                                    @if($item ==1) checked @endif
                                                @endforeach @endif>
                                                <label class="form-check-label" for="exampleCheck11"><i class="fa fa-star"></i></label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck12" name="rate[]" value="2" @if($rate !== null) @foreach ($rate as $item)
                                                    @if($item ==2) checked @endif
                                                @endforeach @endif>
                                                <label class="form-check-label" for="exampleCheck12"><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck13" name="rate[]" value="3" @if($rate !== null) @foreach ($rate as $item)
                                                    @if($item ==3) checked @endif
                                                @endforeach @endif>
                                                <label class="form-check-label" for="exampleCheck13"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck14" name="rate[]" value="4" @if($rate !== null) @foreach ($rate as $item)
                                                    @if($item ==4) checked @endif
                                                @endforeach @endif>
                                                <label class="form-check-label" for="exampleCheck14"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck15" name="rate[]" value="5" @if($rate !== null) @foreach ($rate as $item)
                                                    @if($item ==5) checked @endif
                                                @endforeach @endif>
                                                <label class="form-check-label" for="exampleCheck15"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                                <hr class="fix-section">
                                <div class="r-filter-convenients r-people">
                                    <div class="r-prices-title r-title-1">
                                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-1 disabledIcon"></i><i class="fas fa-angle-down r-down-1"></i></p><p class="r-time-title-text">Điểm đánh giá khách hàng</p>
                                   </div>
                                    <div class="r-prices-content r-content-1">
                                        <div class="r-filter-convenient">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck5" name="feedback" value="4">
                                                <label class="form-check-label" for="exampleCheck5">Tuyệt hảo : 9.5 điểm trở lên</label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck6" name="feedback" value="3">
                                                <label class="form-check-label" for="exampleCheck6">Rất tốt : 8.5 điểm trở lên</label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck7" name="feedback" value="2">
                                                <label class="form-check-label" for="exampleCheck7">Tốt : 8 điểm trở lên</label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck8" name="feedback" value="1">
                                                <label class="form-check-label" for="exampleCheck8">Hài lòng : 7 điểm trở lên</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                                <hr class="fix-section">
                                <div class="r-filter-avg-price r-people">
                                    <div class="r-prices-title r-title-2">
                                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-2 disabledIcon"></i><i class="fas fa-angle-down r-down-2"></i></p><p class="r-time-title-text">Giá trung bình/đêm</p>
                                   </div>
                                    <div class="r-prices-content r-content-2">
                                        <div class="r-filter-convenient">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck9">
                                                <label class="form-check-label" for="exampleCheck9">Từ thấp - cao</label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck10">
                                                <label class="form-check-label" for="exampleCheck10">Từ cao - thấp</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="filter-submit-rp">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="list-hotel" style="margin-top: -20px">
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
                                                {!! $value['description'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="hotel-fb-price">
                                            <div class="hotel-list-feedback">
                                                <div class="hotel-feedback-user">
                                                    @foreach ($count as $c)
                                                        @if($value['id'] == $c['id'])
                                                            <div class="hotel-fb-user-number">
                                                                @if($c['count_id'] > 0)
                                                                    <p class="hotel-fb-number">{{ round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) }}</p>
                                                                @else
                                                                    <p class="hotel-fb-number-default">...</p>
                                                                @endif
                                                            </div>
                                                            <div class="hotel-fb-user-text">
                                                                    @if($c['count_id'] > 0)
                                                                        @if(round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 9 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 9)
                                                                            <p class="hotel-fb-user-text-up">Tuyệt hảo</p>
                                                                        @endif
                                                                        @if(9 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) && round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 8 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 8)
                                                                            <p class="hotel-fb-user-text-up">Tốt</p>
                                                                        @endif
                                                                        @if( 8 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) && round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 7 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 7)
                                                                            <p class="hotel-fb-user-text-up">Hài lòng</p>
                                                                        @endif
                                                                        @if(7 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2))
                                                                            <p class="hotel-fb-user-text-up">Không hài lòng</p>
                                                                        @endif
                                                                        <p class="hotel-fb-user-text-down">{{ $c['count_id'] }} đánh giá </p>
                                                                    @else
                                                                        <p class="hotel-fb-user-text-up-deafault">Tuyệt hảo</p>
                                                                        <p class="hotel-fb-user-text-down">Chưa có đánh giá</p>
                                                                    @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="clear-fix"></div>
                                                </div>
                                            </div>
                                            <div class="hotel-avg-price">
                                                <div class="sr__card_price bui-spacer--large">
                                                Giá trung bình/đêm: <br><span>VND&nbsp;2.524.952</span>
                                                </div>
                                                <form action="{{ route('user.searchRoom',['id' => $value['id']]) }}" method="GET" class="booking-form-content">
                                                    <input type="hidden" name="checkin" id="checkin" value="{{ $checkin }}">
                                                    <input type="hidden" name="checkout" id="checkout" value="{{ $checkout }}">
                                                    <input type="hidden" name="adult" value="{{ $adult }}">
                                                    <input type="hidden" name="child" value="{{ $child }}">

                                                    <input type="hidden" name="place">
                                                    <input type="hidden" name="bed">
                                                    <input type="hidden" name="price">
                                                    <input type="hidden" name="wifi">

                                                    <input type="hidden" name="smoke">
                                                    <input type="hidden" name="tivi">
                                                    <input type="hidden" name="air">
                                                    <input type="hidden" name="phone">

                                                    <button type="submit" class="form-submit btn btn-primary">{{ $value['count'] }} phòng trống</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                   </div>
                   <div class="pagination-page fix-top">{!! $paginate->appends(['checkin' => $checkin, 'checkout' => $checkout, 'adult' => $adult, 'child' => $child,'hotel' => $id,'rate' => $rate])->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
