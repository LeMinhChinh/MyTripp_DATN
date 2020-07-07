@extends('owner/index')
@section('title', "Request Booking")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.requestBooking',['id' => Session::get('idSession')]) }}">Request Booking</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control id-search-keyword" id="js-keyword" placeholder="Searching for..." value="{{ $keyword }}" data-id="{{ Session::get('idSession') }}">
                    <select class="custom-select custom-select-sm mb-3 role-select-option" name="" id="">
                        <option value="" @if($status === null) selected @endif>Filter status</option>
                        <option value="1" @if($status === "1") selected @endif>Approved</option>
                        <option value="0" @if($status === "0") selected @endif>Awaiting approval</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle more-select-option" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More option
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item action-select" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Total</th>
                <th scope="col">Note</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inforRequest as $value)
                <tr class="js-booking-{{ $value['id'] }} js-booking">
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['phone'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>{{ number_format($value['total'],0 ,'.' ,'.').'' }}&#8363;</td>
                    <td>{{ $value['note'] }}</td>
                    <td>
                        @if( $value['status']  == 0)
                            <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Awaiting approval</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Approved</button>
                            </div>
                        @endif
                        @if( $value['status'] == 1)
                            <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Awaiting approval</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Approved</button>
                            </div>
                        @endif
                    </td>
                    <td>
                        <button id="{{ $value['id'] }}" class="btn btn-info js-view-{{  $value['id'] }}">View</button>
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
                        <td>{{ $value['name_room'] }}</td>
                        <td>{{ number_format($value['price'],0 ,'.' ,'.').'' }}&#8363;</td>
                        <td>{{ $value['discount'] }}</td>
                        <td>{{ $value['checkin'] }}</td>
                        <td>{{ $value['checkout'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginations-view">
        {{ $paginate->appends(['keyword' => $keyword, 'status' => $status])->links() }}
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            for(let i = 1; i<=100; i++){
                $('.js-view-'+i).click(function(){
                    $('.js-booking').removeClass('active-table')
                    $('.js-booking-'+i).addClass('active-table')
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

        $('#js-search').click(function(){
            var keyword = $('#js-keyword').val().trim()
            var status = $('.role-select-option').val()
            var id = $('#js-keyword').attr('data-id')
            window.location.href =  "http://localhost:8000/owner/request-booking/"+id+"?keyword=" + keyword + "&status="+ status;
        });

        $('.js-update-request').click(function(){
            var self = $(this)
            var id = self.attr('id').trim();
            console.log(id)

            $.ajax({
                url: "{{ route('owner.approvalBooking') }}",
                type: "POST",
                data: {id: id},
                success: function(data){
                    if(data === 'Approval fail') {
                        alert('Approval fail');
                    }
                    if(data === 'Approval success') {
                        if(self.hasClass('btn-primary')){
                            self.addClass('hide')
                            $('.awaiting-'+id+' .btn-success').addClass('show')
                        }

                        if(self.hasClass('btn-success')){
                            if(self.hasClass('show')){
                                self.removeClass('show')
                                $('.awaiting-'+id+' .btn-primary').removeClass('hide')
                            }
                        }

                        if(self.hasClass('btn-success')){
                            self.addClass('hide')
                            $('.approved-'+id+' .btn-primary').addClass('show')
                        }

                        if(self.hasClass('btn-primary')){
                            if(self.hasClass('show')){
                                self.removeClass('show')
                                $('.approved-'+id+' .btn-success').removeClass('hide')
                            }
                        }

                        alert('Approval success');
                    }
                }
            });
        })
    </script>
@endpush
