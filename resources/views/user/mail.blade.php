<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" >

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css')}}">


    <link rel="stylesheet" href="{{ asset('user/css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('user/css/dev.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/dev.css')}}" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">

</head>
<body>
    <div class="mail-notifi">
        <div class="container">
            <div id="wrap-inner">
            <div id="customer" class="mt-5">
                <h3><b>Thông tin khách hàng</b></h3>
                <p class="fix-top">
                    <span class="info"><b> Khách Hàng :</b> {{ $inforBooking['nameCustomer'] }}</span>
                </p>
                <p>
                    <span class="info"><b> Email :</b>: {{ $inforBooking['emailCustomer'] }}</span>
                </p>
                <p>
                    <span class="info"><b> Điện Thoại :</b> {{ $inforBooking['phoneCustomer'] }}</span>
                </p>
                <p>
                    <span class="info"><b> Địa Chỉ :</b> {{ $inforBooking['addressCustomer'] }}</span>
                </p>
            </div>
            <div class="fix-top">
                <h3><b>Thông tin đơn đặt phòng</b> </h3>
                <table class="table-bordered table fix-top">
                    <tr class="bold">
                        <th scope="col">Khách sạn</th>
                        <th scope="col">Phòng</th>
                        <th scope="col">Giá phòng</th>
                        <th scope="col">Checkin</th>
                        <th scope="col">Checkout</th>
                    </tr>
                    <tr>
                        <td>{{ $inforBooking['nameRp'] }}</td>
                        <td>{{ $inforBooking['nameRoom'] }}</td>
                        <td>{{ number_format($inforBooking['priceRoom'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                        <td>{{ Session::get('checkin') }}</td>
                        <td>{{ Session::get('checkout') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">Tổng tiền:</td>
                        <td>{{ number_format($inforBooking['totalPrice'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                    </tr>
                </table>
            </div>
            <div>
                <br>
                <p>
                    <b>Cảm ơn quý khách đã đặt phòng tại MyTripp!</b><br />
                    • Vui lòng chờ xác nhận từ phía nhà cung cấp A Hotel.<br />
                    • Bạn sẽ nhận được cuộc gọi xác nhận từ nhà cung cấp. Vui lòng chú ý các cuộc gọi.Xin cảm ơn!.<br />
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('user/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('user/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('user/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('user/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('user/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('user/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('user/js/main.js')}}"></script>
    <script src="{{ asset('user/js/dev.js')}}"></script>

</body>
</html>
