@extends('user/index')
@section('title', "My tripp")
@section('content')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>MyTripp </h1>
                    <p class="notifi-1">Tìm kiếm ưu đãi khách sạn, chỗ nghỉ dạng nhà ở và nhiều hơn nữa...</p>
                    <p class="notifi-2">Từ những khu nghỉ dưỡng thanh bình đến những căn hộ hạng sang hiện đại</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Bạn cần phòng trống?</h3>
                    <form action="#">
                        <div class="check-date">
                            <label for="date-in">Check in</label>
                            <input type="text" class="date-input" id="date-in" placeholder="Thời gian nhận phòng">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check out</label>
                            <input type="text" class="date-input" id="date-out"  placeholder="Thời gian trả phòng">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Số người lớn</label>
                            <input type="text" class="booking-input" placeholder="Nhập vào số người lớn">
                        </div>
                        <div class="select-option">
                            <label for="room">Số trẻ con</label>
                            <input type="text" class="booking-input" placeholder="Nhập vào số trẻ con">
                        </div>
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('user/img/hero/hero-1.jpg')}}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('user/img/hero/hero-2.jpg')}}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('user/img/hero/hero-3.jpg')}}"></div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    {{-- <span>Hotel News</span> --}}
                    <h2 class="blog-section-title">Các địa điểm nổi tiếng</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('user.listRestingPlace',['idp' => 45 , 'idt' => 0]) }}">
                    <div class="blog-item set-bg" data-setbg="{{ asset('user/img/tphcm.jpg')}}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">Travel Trip</span> --}}
                            <h4>Thành phố Hồ Chí Minh</h4>
                            {{-- <div class="b-time">1500 chỗ ở</div> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('user.listRestingPlace',['idp' => 46, 'idt' => 0]) }}">
                    <div class="blog-item set-bg" data-setbg="{{ asset('user/img/vungtau.jfif')}}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">Camping</span> --}}
                            <h4>Vũng Tàu</h4>
                            {{-- <div class="b-time">1500 chỗ ở</div> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('user.listRestingPlace',['idp' => 32, 'idt' => 0]) }}">
                    <div class="blog-item set-bg" data-setbg="{{ asset('user/img/danang.jpeg')}}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">Event</span> --}}
                            <h4>Đà Nẵng</h4>
                            {{-- <div class="b-time">1500 chỗ ở</div> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-7">
                <a href="{{ route('user.listRestingPlace',['idp' => 1, 'idt' => 0]) }}">
                    <div class="blog-item small-size set-bg" data-setbg="{{ asset('user/img/hanoi.jpg')}}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">Event</span> --}}
                            <h4>Hà Nội</h4>
                            {{-- <div class="b-time">1500 chỗ ở</div> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-5">
                <a href="{{ route('user.listRestingPlace',['idp' => 31, 'idt' => 0]) }}">
                    <div class="blog-item small-size set-bg" data-setbg="{{ asset('user/img/hue.jpg')}}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">Travel</span> --}}
                            <h4>Huế</h4>
                            {{-- <div class="b-time">1500 chỗ ở</div> --}}
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nhà ở đang được giảm giá</h2>
                </div>
            </div>
        </div>
        <div class="room-discount hp-room-items">
            <div class="row">
                @foreach ($inforRoom as $index => $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item" data-toggle="modal" data-target="#detailRoom-{{ $index }}">
                            @foreach($imageRoom as $in => $it)
                                @if($index == $in)
                                    <img src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $it['0'] }}" alt="">
                                @endif
                            @endforeach
                            <h3 style="color: #0071c2">Phòng : {{ $item['name'] }}</h3>
                            <p>{{ $item['type'] }} : {{ $item['rp'] }}</p>
                            <p>Địa điểm : {{ $item['place'] }}</p>
                            @if($item['discount'])
                                <p style="text-decoration: line-through;">Giá gốc : {{   number_format($item['price'], 0, '', ',')}}&#8363;</p>
                                <p style="color:red">Giá hiện tại : {{   number_format(($item['price'] - ($item['price']*$item['discount'])/100), 0, '', ',')}}&#8363; (discount: {{ $item['discount'] }} %)</p>
                            @else
                                <p>Giá gốc : {{   number_format($item['price'], 0, '', ',')}}&#8363;</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="detailRoom-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog popup-detail" role="document">
                        <div class="modal-content content-detail">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><p class="rp-item-name-room"><small>{{ $item['type'] }} </small> {{ $item['rp'] }} - <small>Phòng </small>{{ $item['name'] }}</p></h5>
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
                                                    <p class="rp-item-people">Phòng ngủ dành cho : @if($item['adult'] > 0 && $item['child'] == 0)<span>{{ $item['adult'] }} người lớn <i class="fas fa-user-friends"></i>@endif @if($item['child'] > 0 && $item['adult'] == 0) {{ $item['child'] }} trẻ con <i class="fas fa-baby"></i>@endif @if($item['adult'] > 0 && $item['child'] > 0)<span>{{ $item['adult'] }} người lớn <i class="fas fa-user-friends"></i> và {{ $item['child'] }} trẻ con <i class="fas fa-baby"></i> @endif</p>
                                                    @if($item['acreage'] > 0)<p><i class="fa fa-home"></i>Diện tích phòng :  {{ $item['acreage'] }}m&#178;</p>@endif
                                                    @if($item['quantity_bed'] > 0)<p><i class="fa fa-bed"></i>{{ $item['quantity_bed'] }} @if($item['type_bed'] > 0) {{ $item['name_bed'] }} @endif @if($item['description_bed'] !== null) {{ $item['description_bed'] }} @endif</p>@endif
                                                    @if($item['smoke'] == 0)
                                                        <p><i class="fas fa-smoking"></i>Không hút thuốc</p>
                                                    @else
                                                        <p><i class="fas fa-smoking"></i>Có hút thuốc</p>
                                                    @endif
                                                </div>
                                                @if($item['wifi'] > 0 && $item['phone'] > 0 && $item['television'] > 0)<div class="rp-item-feedback">
                                                    <p class="rp-item-title-index">Giải trí : </p>
                                                    @if($item['wifi'] > 0)<p><i class="fas fa-wifi"></i>Wifi miễn phí tất cả các phòng</p>@endif
                                                    @if($item['phone'] > 0)<p><i class="fas fa-phone-alt"></i>Điện thoại</p>@endif
                                                    @if($item['television'] > 0)<p><i class="fas fa-tv"></i>Televison</p>@endif
                                                </div>@endif
                                                @if($item['air_conditioning'] > 0)<div class="rp-item-feedback">
                                                    <p class="rp-item-title-index">Tiện nghi : </p>
                                                    <p><img src="https://img.icons8.com/pastel-glyph/64/000000/air-conditioner--v2.png"/>Điều hòa</p>
                                                </div>@endif
                                                <div class="rp-item-feedback">
                                                    @if($item['discount'] > 0)
                                                        <p class="rp-item-price rp-price-discount"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p><p class="rp-item-discount">Giảm giá đến <span>{{ $item['discount'] }}%</span></p>
                                                        <p class="rp-item-promo-price">Nay chỉ còn : <span>{{ number_format($item['price'] - ($item['price']*$item['discount']/100) ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                                    @else
                                                        <p class="rp-item-price"><i class="fas fa-dollar-sign"></i> Giá gốc : <span>{{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="room-btn-booking">
                                                <button type="button" class="btn btn-primary">Thêm vào danh sách phòng</button>
                                                <button type="button" class="btn btn-success">Đặt phòng ngay</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="rp-detail-img">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach ($imageRoom as $y => $img)
                                                        @if($index == $y)
                                                            @foreach($img as $i => $t)
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active">
                                                                    <div class="img-active">
                                                                        <img src="{{ URL::to('/') }}/user/uploads/room/{{ $t }}" alt="" >
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach ($imageRoom as $y => $img)
                                                        @if($index == $y)
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/room/{{ $img[0] }}" >
                                                            </div>
                                                            @foreach($img as $i => $t)
                                                                @if($i > 0)
                                                                    <div class="carousel-item">
                                                                        <img class="d-block w-100" src="{{ URL::to('/') }}/user/uploads/room/{{ $t }}" alt="{{ $i }} slide">
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
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="blog-section-title">Khách sạn được yêu thích</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $a = 0 ?>
                @foreach ($inforRP as $key => $value)
                    @foreach ($inforFB as $v)
                        @if($value['id'] == $v['id'])
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('user.restingplace',['id' => $value['id']]) }}">
                                    <div class="hp-room-item set-bg"
                                        @foreach($images as $k => $img)
                                            @if($key == $k)
                                                data-setbg="{{ URL::to('/') }}/user/uploads/resting_place/{{ $img['0'] }}"
                                            @endif
                                        @endforeach
                                    >
                                        <div class="hr-text">
                                            <h3>{{ $value['name'] }}</h3>
                                            <p>{{ $value['type_name'] }} @for($i = 1; $i <= $value['rate'] ; $i++) <i class="fa fa-star"></i> @endfor</p>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="r-o">Đánh giá <span>:</span></td>
                                                        <td>
                                                            @if($v['count_id'] > 0)
                                                                @if(round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) > 9 || round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) == 9)
                                                                    {{ round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) }} - Tuyệt hảo
                                                                @endif
                                                                @if(9 > round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) && round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) > 8 || round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) == 8)
                                                                    {{ round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) }} - Tốt
                                                                @endif
                                                                @if( 8 > round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) && round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) > 7 || round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) == 7)
                                                                    {{ round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) }} - Hài lòng
                                                                @endif
                                                                @if(7 > round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2))
                                                                    {{ round(($v['sum_emotion'] *10 / ($v['count_id'] * 4)),2) }} - Không hài lòng
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="r-o">Giá trung bình/đêm <span>:</span></td>
                                                        <td>
                                                            @foreach ($arrPrice as $item)
                                                                @if($item[0] == $value['id'])
                                                                    {{   number_format(round($item[1],2), 0, '', ',')}}&#8363;
                                                                @endif()
                                                            @endforeach
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="r-o">Tiện nghi <span>:</span></td>
                                                        <td>
                                                            @if($value['pool'])
                                                                Hồ bơi,
                                                            @endif
                                                            @if($value['parking'])
                                                                Bãi đậu xe miễn phí,
                                                            @endif
                                                            @if($value['wifi'])
                                                                Wifi miễn phí,
                                                            @endif
                                                            @if($value['smoke'] == 0)
                                                                Phòng không hút thuốc
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Các kiểu nhà ở</h2>
                </div>
            </div>
        </div>
         <div class="testimonial-slider owl-carousel">
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/xdata/images/xphoto/square300/57584488.webp?k=bf724e4e9b9b75480bbe7fc675460a089ba6414fe4693b83ea3fdd8e938832a6&o=" alt="">
            <h4>Khách sạn</h4>
            {{-- <p>704,996 khách sạn</p> --}}
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_hostels/cd5489c0d29025a9ca9daa602ac1581ba042bc69.jpg" alt="">
            <h4>Homestay</h4>
            {{-- <p>773,442 homestay</p> --}}
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_resorts/6f87c6143fbd51a0bb5d15ca3b9cf84211ab0884.jpg" alt="">
            <h4>Resort</h4>
            {{-- <p>773,442 resort</p> --}}
        </div>
        <div class="ts-item">
            <img src="https://q-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-villas_300/dd0d7f8202676306a661aa4f0cf1ffab31286211.jpg" alt="">
            <h4>Biệt thự</h4>
            {{-- <p>773,442 biệt thự</p> --}}
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-apartments_300/9f60235dc09a3ac3f0a93adbc901c61ecd1ce72e.jpg" alt="">
            <h4>Căn hộ</h4>
            {{-- <p>773,442 căn hộ</p> --}}
        </div>
    </div>
    </div>

</section>
<!-- Testimonial Section End -->

@endsection
