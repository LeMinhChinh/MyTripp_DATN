@extends('user/index')
@section('title', "Search room")

@section('content')
<main class="room-main">
    <div class="container">
        <div class="rp-title">
            <a href="">Trang chủ</a><span>></span><a href="{{ route('user.listRestingPlace',['idp' => 0, 'idt' => $inforRP['id_type']]) }}">{{ $inforRP['name_type'] }}</a><span>></span><a href="{{ route('user.listRestingPlace',['idp' => $inforRP['id_place'], 'idt' => 0]) }}">{{ $inforRP['name_place'] }}</a><span>></span><a href="">{{ $inforRP['name_type'] }} {{ $inforRP['name'] }}</a><span>></span><a href="" class="main-active">Danh sách phòng trống</a>
        </div>
        <hr>
        <div class="rp-content">
            <div class="row">
                @include('user/partials/filter_room')
                <div class="col-9">
                   <div class="row">
                        @foreach ($inforRoom as $key =>  $value)
                            <div class="col-6">
                                <div class="room-item" data-toggle="modal" data-target="#detailRoom-{{ $key }}">
                                    <div class="room-item-img">
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
                                            <button type="button" class="btn btn-primary">Thêm vào danh sách phòng</button>
                                            <button type="button" class="btn btn-success">Đặt phòng ngay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="detailRoom-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog popup-detail" role="document">
                                <div class="modal-content content-detail">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><p class="rp-item-name-room"><small>Khách sạn </small> Fusion Suites Saigon - <small>Phòng </small>{{ $value['name'] }}</p></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="rp-item-infor">
                                                    {{-- <div class="rp-item-feedback">
                                                        <p class="rp-item-title-index">Đánh giá của khách hàng : </p>
                                                        <a href="">Tuyệt vời 8,9 - 245 đánh giá</a>
                                                    </div> --}}
                                                    <div class="rp-item-featured">
                                                        <div class="rp-item-feedback">
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
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
