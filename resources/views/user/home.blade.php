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
                <div class="blog-item set-bg" data-setbg="{{ asset('user/img/blog/blog-1.jpg')}}">
                    <div class="bi-text">
                        {{-- <span class="b-tag">Travel Trip</span> --}}
                        <h4><a href="#">Thành phố Hồ Chí Minh</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="{{ asset('user/img/blog/blog-2.jpg')}}">
                    <div class="bi-text">
                        {{-- <span class="b-tag">Camping</span> --}}
                        <h4><a href="#">Vũng Tàu</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="{{ asset('user/img/blog/blog-3.jpg')}}">
                    <div class="bi-text">
                        {{-- <span class="b-tag">Event</span> --}}
                        <h4><a href="#">Đà Nẵng</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog-item small-size set-bg" data-setbg="{{ asset('user/img/blog/blog-wide.jpg')}}">
                    <div class="bi-text">
                        {{-- <span class="b-tag">Event</span> --}}
                        <h4><a href="#">Hà Nội</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item small-size set-bg" data-setbg="{{ asset('user/img/blog/blog-10.jpg')}}">
                    <div class="bi-text">
                        {{-- <span class="b-tag">Travel</span> --}}
                        <h4><a href="#">Huế</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                    </div>
                </div>
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
                    <h2>Nhà ở được khách yêu thích</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Travel Plan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Catering Service</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Babysitting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Laundry</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Hire Driver</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <img src="{{ asset('user/img/summer-trip-hồ-cốc-1.jpg')}}" alt="">
                    <h4>Bar & Drink</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
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
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('user/img/room/room-b1.jpg')}}">
                        <div class="hr-text">
                            <h3>Double Room</h3>
                            <h2>199$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('user/img/room/room-b2.jpg')}}">
                        <div class="hr-text">
                            <h3>Premium King Room</h3>
                            <h2>159$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('user/img/room/room-b3.jpg')}}">
                        <div class="hr-text">
                            <h3>Deluxe Room</h3>
                            <h2>198$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('user/img/room/room-b4.jpg')}}">
                        <div class="hr-text">
                            <h3>Family Room</h3>
                            <h2>299$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
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
            <p>704,996 khách sạn</p>
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_hostels/cd5489c0d29025a9ca9daa602ac1581ba042bc69.jpg" alt="">
            <h4>Homestay</h4>
            <p>773,442 homestay</p>
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_resorts/6f87c6143fbd51a0bb5d15ca3b9cf84211ab0884.jpg" alt="">
            <h4>Resort</h4>
            <p>773,442 resort</p>
        </div>
        <div class="ts-item">
            <img src="https://q-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-villas_300/dd0d7f8202676306a661aa4f0cf1ffab31286211.jpg" alt="">
            <h4>Biệt thự</h4>
            <p>773,442 biệt thự</p>
        </div>
        <div class="ts-item">
            <img src="https://r-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-apartments_300/9f60235dc09a3ac3f0a93adbc901c61ecd1ce72e.jpg" alt="">
            <h4>Căn hộ</h4>
            <p>773,442 căn hộ</p>
        </div>
    </div>
    </div>

</section>
<!-- Testimonial Section End -->

@endsection
