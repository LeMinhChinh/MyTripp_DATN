<div class="data-filter-room">
    <div class="row">
        <div class="col-3">
            <div class="r-filter-title">
                <p class="bk-title">Lọc danh sách phòng</p>
            </div>
            <div class="r-filter-content">
                <div class="booking-form">
                    <form action="#">
                        <div class="r-filter-time r-people fix-top">
                            <div class="r-time-title r-title-1">
                                 <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-1 disabledIcon"></i><i class="fas fa-angle-down r-down-1"></i></p><p class="r-time-title-text">Địa điểm</p>
                            </div>
                            <div class="r-child r-people select-option">
                                <select id="beds" class="booking-input">
                                    <option value="">Địa điểm</option>
                                    @foreach ($place as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="fix-section">
                       <div class="r-filter-time r-people fix-top">
                           <div class="r-time-title r-title-1">
                                <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-1 disabledIcon"></i><i class="fas fa-angle-down r-down-1"></i></p><p class="r-time-title-text">Thời gian</p>
                           </div>
                            <div class="r-time-content r-content-1 fix-top">
                                <div class="check-date">
                                    <label for="date-in">Check in</label>
                                    <input type="date" class="booking-input" name="checkin" id="checkin">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check out</label>
                                    <input type="date" class="booking-input" name="checkout" id="checkout">
                                    <i class="icon_calendar"></i>
                                </div>
                            </div>
                            <div class="r-time-content r-content-1 fix-top hide">
                                <div class="check-date">
                                    <label for="date-in">Check in</label>
                                    <input type="date" class="booking-input" name="oldCheckin" id="oldCheckin" value="{{ $checkin }}">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check out</label>
                                    <input type="date" class="booking-input" name="oldCheckout" id="oldCheckout" value="{{ $checkout }}">
                                    <i class="icon_calendar"></i>
                                </div>
                            </div>
                       </div>
                       <hr class="fix-section">
                        <div class="r-filter-need r-people">
                            <div class="r-need-title r-title-2">
                                <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-2 disabledIcon"></i><i class="fas fa-angle-down r-down-2"></i></p><p class="r-time-title-text">Nhu cầu</p>
                           </div>
                            <div class="r-need-content r-content-2 fix-top">
                                <div class="r-adult r-people">
                                    <label for="guest">Số người lớn</label>
                                    <input type="text" class="booking-input">
                                </div>
                                <div class="r-child r-people">
                                    <label for="guest">Số trẻ con</label>
                                    <input type="text" class="booking-input">
                                </div>
                                <div class="r-child r-people select-option">
                                    <label for="beds">Giường</label>
                                    <select id="beds" class="booking-input">
                                        <option value="">Loại giường</option>
                                        @foreach ($type as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="fix-section">
                        <div class="r-filter-prices r-people">
                            <div class="r-prices-title r-title-3">
                                <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-3 disabledIcon"></i><i class="fas fa-angle-down r-down-3"></i></p><p class="r-time-title-text">Giá</p>
                           </div>
                            <div class="r-filter-convenient r-filter-price">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck5" name="filterRate" value="4">
                                    <label class="form-check-label" for="exampleCheck5">0 - 500.000 / đêm (VND)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck6" name="filterRate" value="3">
                                    <label class="form-check-label" for="exampleCheck6">500.000 - 1.000.000 / đêm (VND)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck7" name="filterRate" value="2">
                                    <label class="form-check-label" for="exampleCheck7">1.000.000 - 2.000.000 / đêm (VND)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck8" name="filterRate" value="1">
                                    <label class="form-check-label" for="exampleCheck8">2.000.000 - 4.000.000 / đêm (VND)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck8" name="filterRate" value="1">
                                    <label class="form-check-label" for="exampleCheck8">Từ 4.000.000 / đêm (VND)</label>
                                </div>
                            </div>
                        </div>
                        <hr class="fix-section">
                        <div class="r-filter-prices r-people">
                            <div class="r-prices-title r-title-4">
                                <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-4 disabledIcon"></i><i class="fas fa-angle-down r-down-4"></i></p><p class="r-time-title-text">Tiện nghi</p>
                           </div>
                            <div class="r-prices-content r-content-4 fix-top">
                                <div class="r-filter-convenient">
                                    <div class="r-child r-people">
                                        <label for="guest">Phòng hút thuốc</label>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Có</label>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Không</label>
                                        </div>
                                    </div>
                                    <div class="r-child r-people">
                                        <label for="guest">Tivi</label>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Có</label>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Không</label>
                                        </div>
                                    </div>
                                    <div class="r-child r-people">
                                        <label for="guest">Điều hòa</label>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Có</label>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Không</label>
                                        </div>
                                    </div>
                                    <div class="r-child r-people">
                                        <label for="guest">Điện thoại</label>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Có</label>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Không</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="filter-submit-room">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                @foreach ($dataRoomBooking as $key =>  $value)
                    <div class="col-6">
                        <div class="room-item" >
                            <div class="room-item-img" data-toggle="modal" data-target="#detailRoom-{{ $key }}">
                                @foreach ($images as $k => $v)
                                    @if($key == $k)
                                        <img src="{{ URL::to('/') }}/user/uploads/room/{{ $v['0'] }}" alt="">
                                    @endif
                                @endforeach
                                <p class="rp-item-click"><i class="fas fa-camera"></i>Xem chi tiết và ảnh</p>
                            </div>
                            <div class="ri-text">
                                <div class="rp-item-infor">
                                    <div class="rp-item-name">
                                        <p class="rp-item-name-room"><small>{{ $value['type'] }} </small>{{ $value['rp'] }}</p>
                                        <p class="rp-item-name-room"><small>Phòng </small>{{ $value['name'] }}</p>
                                    </div>
                                    <div class="rp-item-feedback">
                                        @if($value['discount'] > 0)
                                            <p class="rp-item-price rp-price-discount"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($value['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>{{ $value['discount'] }}%</span></p>
                                            <p class="rp-item-promo-price">Nay chỉ còn : <span>{{ number_format($value['price'] - ($value['price']*$value['discount']/100) ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                        @else
                                            <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($value['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                        @endif
                                    </div>
                                    <div class="rp-item-featured">
                                        <p class="rp-item-people">Dành cho : @if($value['adult'] > 0 && $value['child'] == 0)<span>{{ $value['adult'] }} người lớn <i class="fas fa-user-friends"></i>@endif @if($value['child'] > 0 && $value['adult'] == 0) {{ $value['child'] }} trẻ con <i class="fas fa-baby"></i>@endif @if($value['adult'] > 0 && $value['child'] > 0)<span>{{ $value['adult'] }} người lớn <i class="fas fa-user-friends"></i> và {{ $value['child'] }} trẻ con <i class="fas fa-baby"></i> @endif</p>
                                        @if($value['acreage'] > 0)<p><i class="fa fa-home"></i>Diện tích phòng :  {{ $value['acreage'] }}m&#178;</p>@endif
                                        @if($value['quantity_bed'] > 0)<p><i class="fa fa-bed"></i>{{ $value['quantity_bed'] }} @if($value['type_bed'] > 0) {{ $value['name_bed'] }} @endif @if($value['description_bed'] !== null) {{ $value['description_bed'] }} @endif</p>@endif
                                        @if($value['smoke'] == 0)
                                            <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                        @else
                                            <p><i class="fas fa-smoking"></i>Có hút thuốc</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="room-btn-booking">
                                    <button type="button" class="btn btn-primary add-to-book" id={{ $value['id'] }} data-checkin="{{ $checkin }}" data-checkout="{{ $checkout }}" data-id="{{ $value['idRp'] }}" data-name="{{ $value['rp'] }}">Thêm vào danh sách phòng</button>
                                    <button type="button" class="btn btn-success booking-now" id={{ $value['id'] }} data-checkin="{{ $checkin }}" data-checkout="{{ $checkout }}">Đặt phòng ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="detailRoom-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog popup-detail" role="document">
                        <div class="modal-content content-detail">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><p class="rp-item-name-room"><small>{{ $value['type'] }} </small> {{ $value['rp'] }} - <small>Phòng </small>{{ $value['name'] }}</p></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="rp-item-infor">
                                            <div class="rp-item-featured">
                                                <div class="rp-item-feedback">
                                                    <p class="rp-item-address">Địa chỉ : {{ $value['address'] }}</p>
                                                    <p class="rp-item-people">Phòng ngủ dành cho : @if($value['adult'] > 0 && $value['child'] == 0)<span>{{ $value['adult'] }} người lớn <i class="fas fa-user-friends"></i>@endif @if($value['child'] > 0 && $value['adult'] == 0) {{ $value['child'] }} trẻ con <i class="fas fa-baby"></i>@endif @if($value['adult'] > 0 && $value['child'] > 0)<span>{{ $value['adult'] }} người lớn <i class="fas fa-user-friends"></i> và {{ $value['child'] }} trẻ con <i class="fas fa-baby"></i> @endif</p>
                                                    @if($value['acreage'] > 0)<p><i class="fa fa-home"></i>Diện tích phòng :  {{ $value['acreage'] }}m&#178;</p>@endif
                                                    @if($value['quantity_bed'] > 0)<p><i class="fa fa-bed"></i>{{ $value['quantity_bed'] }} @if($value['type_bed'] > 0) {{ $value['name_bed'] }} @endif @if($value['description_bed'] !== null) {{ $value['description_bed'] }} @endif</p>@endif
                                                    @if($value['smoke'] == 0)
                                                        <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                                    @else
                                                        <p><i class="fas fa-smoking"></i>Có hút thuốc</p>
                                                    @endif
                                                </div>
                                                @if($value['wifi'] > 0 && $value['phone'] > 0 && $value['television'] > 0)<div class="rp-item-feedback">
                                                    <p class="rp-item-title-index">Giải trí : </p>
                                                    @if($value['wifi'] > 0)<p><i class="fas fa-wifi"></i>Wifi miễn phí tất cả các phòng</p>@endif
                                                    @if($value['phone'] > 0)<p><i class="fas fa-phone-alt"></i>Điện thoại</p>@endif
                                                    @if($value['television'] > 0)<p><i class="fas fa-tv"></i>Televison</p>@endif
                                                </div>@endif
                                                @if($value['air_conditioning'] > 0)<div class="rp-item-feedback">
                                                    <p class="rp-item-title-index">Tiện nghi : </p>
                                                    <p><img src="https://img.icons8.com/pastel-glyph/64/000000/air-conditioner--v2.png"/>Điều hòa</p>
                                                </div>@endif
                                                <div class="rp-item-feedback">
                                                    @if($value['discount'] > 0)
                                                        <p class="rp-item-price rp-price-discount"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($value['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>{{ $value['discount'] }}%</span></p>
                                                        <p class="rp-item-promo-price">Nay chỉ còn : <span>{{ number_format($value['price'] - ($value['price']*$value['discount']/100) ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                                    @else
                                                        <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($value['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-detail-img">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach ($images as $index => $img)
                                                        @if($index == $key)
                                                            @foreach($img as $i => $item)
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active">
                                                                    <div class="img-active">
                                                                        <img src="{{ URL::to('/') }}/user/uploads/room/{{ $item }}" alt="" >
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach ($images as $index => $img)
                                                        @if($index == $key)
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/room/{{ $img[0] }}" >
                                                            </div>
                                                            @foreach($img as $i => $item)
                                                                @if($i > 0)
                                                                    <div class="carousel-item">
                                                                        <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/room/{{ $item }}" alt="{{ $i }} slide">
                                                                    </div>
                                                                @endif
                                                            @endforeach
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="pagination-page fix-top">{!! $paginate->appends(['checkin' => $checkin, 'checkout' => $checkout, 'adult' => $adult, 'child' => $child])->links() !!}</div>
        </div>
    </div>
</div>
