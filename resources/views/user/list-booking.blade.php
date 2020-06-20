@extends('user/index')
@section('title', "List Booking")

@section('content')
    <main class="hotel-main">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="booking-detail">
                        <div class="booking-detail-title">
                            <h2>Chi tiết đặt phòng của bạn</h2>
                        </div>
                        <div class="booking-detail-room">
                            <p class="booking-detail-label">Checkin : </p>
                            <p>
                                @foreach ($listCheckin as $checkin)
                                    {{ $checkin }}
                                @endforeach
                            </p>
                            <p class="booking-detail-label">Checkout : </p>
                            <p>
                                @foreach ($listCheckout as $checkout)
                                    {{ $checkout }}
                                @endforeach
                            </p>
                            @foreach ($room as $item)
                                <hr>
                                <p class="booking-detail-label">Phòng đã đặt : </p>
                                <p>{{ $item['name'] }}</p>
                                <p class="booking-detail-label">Thông tin về phòng : </p>
                                <p>Giường : {{ $item['quantity_bed'] }} - {{ $item['namebed'] }}</p>
                                <p>Số ngườii lớn : {{ $item['adult'] }} - số trẻ em : {{ $item['child'] }}</p>
                                <p>Các tiện nghi : @if($item['wifi'] == 1) wifi miễn phí,  @endif @if($item['smoke'] == 1) có hút thuốc,  @endif @if($item['smoke'] == 0) không hút thuốc,  @endif @if($item['phone'] == 1) điện thoại,  @endif @if($item['television'] == 1) tivi,  @endif @if($item['air_conditioning'] == 1) điều hòa,  @endif </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="booking-detail fix-top">
                        <div class="booking-detail-title">
                            <h2>Thông tin về giá</h2>
                        </div>
                        {{-- <div class="booking-detail-room">
                            <p class="booking-detail-label">Giá phòng : <span class="booking-price">{{ number_format($room['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                            <p class="booking-detail-label">10% thuế GTGT : <span class="booking-price">{{ number_format($room['price']*10/100 ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                            <p class="booking-detail-label">Discount : <span class="booking-price">{{ $room['discount'] }}%</span></p>
                        </div>
                        <div class="booking-detail-footer">
                            <h2 name="totalPrice">Tổng giá : <span class="booking-price">{{ number_format($room['price'] + $room['price']*10/100 - ($room['price']*$room['discount']/100),0 ,'.' ,'.').'' }}&#8363;</span></h2>
                        </div> --}}
                    </div>
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        // $('input[name="selectPayment"]').change(function(){
        //     var value = $(this).val()
        //     if(value == 0){
        //         $('.show-select-bank').removeClass('hide')
        //     }else{
        //         $('.show-select-bank').addClass('hide')
        //     }
        // })

        // $('input[name="selectBank"]').change(function(){
        //     var value = $(this).val()
        //     if(value == 0){
        //         $('.select-techcombank').removeClass('hide')
        //     }else{
        //         $('.select-techcombank').addClass('hide')
        //     }

        //     if(value == 1){
        //         $('.select-vietcombank').removeClass('hide')
        //     }else{
        //         $('.select-vietcombank').addClass('hide')
        //     }

        //     if(value == 2){
        //         $('.select-viettinbank').removeClass('hide')
        //     }else{
        //         $('.select-viettinbank').addClass('hide')
        //     }

        //     if(value == 3){
        //         $('.select-agribank').removeClass('hide')
        //     }else{
        //         $('.select-agribank').addClass('hide')
        //     }
        // })
    </script>
@endpush
