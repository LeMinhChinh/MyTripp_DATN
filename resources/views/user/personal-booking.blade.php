@extends('user/partials/personal')
@section('title', "Personal Booking")

@section('content-user')
    <div class="personal-content booking-list fix-top">
        @if($booking == null)
        <h3>Bạn chưa có đơn đặt phòng nào</h3>
        @else
            <div class="fix-top">
                @if ($bookingSuccess)
                    <div class="alert alert-success">
                        <h6>{{ $bookingSuccess }}</h6>
                    </div>
                @endif
            </div>
            <h3>Thông tin các đơn đặt phòng của bạn</h3>
            <table class="table table-hover fix-top">
                <thead>
                    <tr>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $value)
                        <tr class="js-booking-{{ $value['id'] }} js-booking">
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['phone'] }}</td>
                            <td>{{ $value['email'] }}</td>
                            <td>{{ $value['address'] }}</td>
                            <td>{{ number_format($value['total'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                            <td>{{ $value['note'] }}</td>
                            <td>
                                @if( $value['status']  == 0)
                                    <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                        <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Đang chờ duyệt</button>
                                        <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Đã duyệt</button>
                                    </div>
                                @endif
                                @if( $value['status'] == 1)
                                    <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                        <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Đang chờ duyệt</button>
                                        <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Đã duyệt</button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="personal-content booking-list-detail fix-top hide">
                <h3>Chi tiết đơn đặt phòng <span class="close-detail">x</span></h3>
                <table class="table table-hover fix-top">
                    <thead>
                        <tr>
                            <th scope="col">Khách sạn</th>
                            <th scope="col">Phòng</th>
                            <th scope="col">Giá phòng</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Checkin</th>
                            <th scope="col">Checkout</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookingDetail as $value)
                            <tr class="js-booking-detail-{{ $value['id_book'] }} hide js-booking-detail" >
                                <td>{{ $value['name_rp'] }}</td>
                                <td>{{ $value['name_room'] }}</td>
                                <td>{{ $value['price'] }}</td>
                                <td>{{ $value['discount'] }}</td>
                                <td>{{ $value['checkin'] }}</td>
                                <td>{{ $value['checkout'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginations-view">
                    {{ $paginate->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    $(function(){
        for(let i = 1; i<=100; i++){
            $('.js-booking-'+i).click(function(){
                $('.js-booking').removeClass('active-table')
                $(this).addClass('active-table')
                $('.booking-list-detail').removeClass('hide');
                $('.js-booking-detail').addClass('hide');
                $('.js-booking-detail-'+i).removeClass('hide');
            })
        }
    });

    $('.close-detail').click(function(){
        $('.booking-list-detail').addClass('hide');
        $('.js-booking').removeClass('active-table')
    })

    $(document).ready(function(){
        localStorage.removeItem('list_id')
        localStorage.removeItem('list_checkin')
        localStorage.removeItem('list_checkout')
    })

</script>
@endpush
