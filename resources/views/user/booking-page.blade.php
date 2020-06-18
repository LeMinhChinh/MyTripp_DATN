@extends('user/index')
@section('title', "Booking")

@section('content')
    <main class="hotel-main">
        <div class="form-booking">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="booking-detail">
                            <div class="booking-detail-title">
                                <h2>Chi tiết đặt phòng của bạn</h2>
                            </div>
                            <div class="booking-detail-room">
                                <p class="booking-detail-label">Checkin : </p>
                                <p>{{ Session::get('checkin') }}</p>
                                <p class="booking-detail-label">Checkout : </p>
                                <p>{{ Session::get('checkout') }}</p>
                                <p class="booking-detail-label">Phòng đã đặt : </p>
                                <p>{{ $room['name'] }}</p>
                                <p class="booking-detail-label">Thông tin về phòng : </p>
                                <p>Giường : {{ $room['quantity_bed'] }} - {{ $room['namebed'] }}</p>
                                <p>Số nguoi lớn : {{ $room['adult'] }} - số trẻ em : {{ $room['child'] }}</p>
                                <p>Các tiện nghi : @if($room['wifi'] == 1) wifi miễn phí,  @endif @if($room['smoke'] == 1) có hút thuốc,  @endif @if($room['smoke'] == 0) không hút thuốc,  @endif @if($room['phone'] == 1) điện thoại,  @endif @if($room['television'] == 1) tivi,  @endif @if($room['air_conditioning'] == 1) điều hòa,  @endif </p>
                            </div>
                        </div>
                        <div class="booking-detail fix-top">
                            <div class="booking-detail-title">
                                <h2>Thông tin về giá</h2>
                            </div>
                            <div class="booking-detail-room">
                                <p class="booking-detail-label">Giá phòng : <span class="booking-price">{{ number_format($room['price'] ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                <p class="booking-detail-label">10% thuế GTGT : <span class="booking-price">{{ number_format($room['price']*10/100 ,0 ,'.' ,'.').'' }}&#8363;</span></p>
                                <p class="booking-detail-label">Discount : <span class="booking-price">{{ $room['discount'] }}%</span></p>
                            </div>
                            <div class="booking-detail-footer">
                                <h2>Tổng giá : <span class="booking-price">{{ number_format($room['price'] + $room['price']*10/100 - ($room['price']*$room['discount']/100),0 ,'.' ,'.').'' }}&#8363;</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="booking-detail-rp">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('/user/uploads/resting_place/159863910.jpg')}}" alt="" class="booking-detail-imgrp">
                                </div>
                                <div class="col-8">
                                    <div class="booking-detail-inforp">
                                        <h2>Thien truong</h2>
                                        <p>Khach san 4 sao </p>
                                        <p>Danh gia : 8.4</p>
                                        <p>Dia chi : abc</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Session::get('idSession'))
                            <form>
                                <h2 class="infor-request">Nhập thông tin của bạn!</h2>
                                <div class="booking-detail-form fix-top">
                                    <div class="form-group" style="display: none">
                                        <label for="formGroupExampleInput">Id</label>
                                        <input type="text" class="form-control" id="idCustomer" name="idCustomer" placeholder="id">
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Họ và tên (*)</label>
                                      <input type="text" class="form-control" id="nameCustomer" name="nameCustomer" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupExampleInput2">Số điện thoại (*)</label>
                                      <input type="text" class="form-control" id="phoneCustomer" name="phoneCustomer" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Email (*)</label>
                                        <input type="text" class="form-control" id="emailCustomer" name="emailCustomer" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Yêu cầu thêm (nếu có)</label>
                                        <textarea type="text" class="form-control" id="noteCustomer" name="noteCustomer" placeholder="Note" cols="4"></textarea>
                                    </div>
                                </div>

                                <h2 class="infor-request fix-top">Hình thức thanh toán</h2>
                                <div class="booking-detail-form fix-top">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="selectPayment" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="customRadioInline1">Chuyển khoản qua ngân hàng</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="selectPayment" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="customRadioInline2">Thanh toán qua Paypal</label>
                                    </div>
                                    <div class="show-select-bank hide">
                                        <div class="form-group single-lable select-bank-lable">
                                            <label for="formGroupExampleInput2">Select a bank</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline5" name="selectBank" class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="customRadioInline5"><img class="logo-bank" src="{{ asset('user/img/Techcombank_logo.png')}}" alt=""></label>
                                            <div class="select-techcombank hide select-bankname">
                                                <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                                                <p class="number-bank">Số tài khoản : 19034687418010</p>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline6" name="selectBank" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="customRadioInline6"><img class="logo-bank" src="{{ asset('user/img/Vietcombank_logo.jpg')}}" alt=""></label>
                                            <div class="select-vietcombank hide select-bankname">
                                                <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                                                <p class="number-bank">Số tài khoản : 19034687418010</p>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline3" name="selectBank" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="customRadioInline3"><img class="logo-bank" src="{{ asset('user/img/Viettinbank_logo.png')}}" alt=""></label>
                                            <div class="select-viettinbank hide select-bankname">
                                                <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                                                <p class="number-bank">Số tài khoản : 19034687418010</p>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline4" name="selectBank" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="customRadioInline4"><img class="logo-bank" src="{{ asset('user/img/agribank_logo.jpg')}}" alt=""></label>
                                            <div class="select-agribank hide select-bankname">
                                                <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                                                <p class="number-bank">Số tài khoản : 19034687418010</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group save-button fix-top">
                                    <button type="submit" class="btn btn-primary btn-lg ps-button-save">Thanh toán</button>
                                </div>
                            </form>
                        @else
                            <h2 class="infor-request">Vui lòng đăng nhập để đặt phòng! <span><a href="" data-toggle="modal" data-target="#formLogin">Đăng nhập</a></span> ngay</h2>
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
                                                        <form class="login100-form validate-form" action="{{ route('bookingHandleLogin') }}" method="POST">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $('input[name="selectPayment"]').change(function(){
            var value = $(this).val()
            if(value == 0){
                $('.show-select-bank').removeClass('hide')
            }else{
                $('.show-select-bank').addClass('hide')
            }
        })

        $('input[name="selectBank"]').change(function(){
            var value = $(this).val()
            if(value == 0){
                $('.select-techcombank').removeClass('hide')
            }else{
                $('.select-techcombank').addClass('hide')
            }

            if(value == 1){
                $('.select-vietcombank').removeClass('hide')
            }else{
                $('.select-vietcombank').addClass('hide')
            }

            if(value == 2){
                $('.select-viettinbank').removeClass('hide')
            }else{
                $('.select-viettinbank').addClass('hide')
            }

            if(value == 3){
                $('.select-agribank').removeClass('hide')
            }else{
                $('.select-agribank').addClass('hide')
            }
        })
    </script>
@endpush
