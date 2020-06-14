@extends('owner/index')
@section('title', "Payment plan")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.pricingPlan', ['id' =>  Session::get('idSession')]) }}">Pricing plan</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('owner.paymentPlan') }}">Payment plan</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    @if($payment !== null)
        @if($payment == 0)
            <div class="notifi-payment">
                <p>You have sent an upgrade request. Please wait for a response from us!</p>
            </div>
        @endif
        @if($status == 2)
            <div class="notifi-payment">
                <p>You are using the premium version. No need to continue paying fees</p>
            </div>
        @endif
    @endif
    <div class="container">
        <form action="{{  route('owner.handlepaymentPlan')}}" method="POST" >
            @csrf
            <h2 style="text-align: center; color:red">Payment plan</h2>
            <div class="form-group" style="display: none">
                <label for="formGroupExampleInput">Id owner</label>
                <input type="text" class="form-control" id="idOwner" name="idOwner" placeholder="Hotel name" value="{{ Session::get('idSession') }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Owner name</label>
                <input type="text" class="form-control" id="nameOwner" name="nameOwner" placeholder="Owner name" value="{{ Session::get('fnameSession') }} {{ Session::get('lnameSession') }}">
            </div>
            <div class="form-group single-lable">
                <label for="formGroupExampleInput2">Payments</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="selectPayment" class="custom-control-input" value="0">
                <label class="custom-control-label" for="customRadioInline1">Banking</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="selectPayment" class="custom-control-input" value="1">
                <label class="custom-control-label" for="customRadioInline2">Paypal</label>
            </div>
            <div class="show-select-bank hide">
                <div class="form-group single-lable select-bank-lable">
                    <label for="formGroupExampleInput2">Select a bank</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline5" name="selectBank" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="customRadioInline5"><img class="logo-bank" src="{{ asset('user/img/Techcombank_logo.png')}}" alt=""></label>
                    <div class="select-techcombank hide">
                        <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                        <p class="number-bank">Số tài khoản : 19034687418010</p>
                    </div>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline6" name="selectBank" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="customRadioInline6"><img class="logo-bank" src="{{ asset('user/img/Vietcombank_logo.jpg')}}" alt=""></label>
                    <div class="select-vietcombank hide">
                        <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                        <p class="number-bank">Số tài khoản : 19034687418010</p>
                    </div>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="selectBank" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="customRadioInline3"><img class="logo-bank" src="{{ asset('user/img/Viettinbank_logo.png')}}" alt=""></label>
                    <div class="select-viettinbank hide">
                        <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                        <p class="number-bank">Số tài khoản : 19034687418010</p>
                    </div>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="selectBank" class="custom-control-input" value="3">
                    <label class="custom-control-label" for="customRadioInline4"><img class="logo-bank" src="{{ asset('user/img/agribank_logo.jpg')}}" alt=""></label>
                    <div class="select-agribank hide">
                        <p class="name-bank">Chủ tài khoản : Lê Minh Chinh</p>
                        <p class="number-bank">Số tài khoản : 19034687418010</p>
                    </div>
                </div>
            </div>
            <div class="form-group save-button">
                <button type="submit" class="btn btn-primary btn-lg ps-button-save">Paid</button>
            </div>
        </form>
    </div>
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

        if($('.notifi-payment').length){
            $('.ps-button-save').css('cursor','no-drop')
            $('.ps-button-save').attr('disabled','disabled')
        }
    </script>
@endpush
