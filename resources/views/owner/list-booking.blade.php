@extends('owner/index')
@section('title', "List booking")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.dashboard',['id' => Session::get('idSession')]) }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">List booking</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}">
                    <select class="custom-select custom-select-sm mb-3 hotel-select-option" name="" id="">
                        <option value="">Select hotel</option>
                        @foreach ($rp as $item)
                            <option value="{{ $item['id'] }}" @if($item['id'] == $hotel) selected @endif>{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-5">

            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Hotel</th>
                <th scope="col">Room</th>
                <th scope="col">Checkin</th>
                <th scope="col">Checkout</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($booking as $value)
                <tr>
                    <td>{{ $value['name_rp'] }}</td>
                    <td>{{ $value['name_room'] }}</td>
                    <td>{{ $value['checkin'] }}</td>
                    <td class="time-checkout-{{ $value['id'] }}">{{ $value['checkout'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginations-view">
        {{ $paginate->appends(['keyword' => $keyword, 'hotel' => $hotel])->links() }}
    </div>
@endsection

@push('scripts')
    <script>
        $('#js-search').click(function(){
            var keyword = $('#js-keyword').val().trim();
            var hotel = $('.hotel-select-option').val()
            window.location.href =  "{{ route('owner.listBooking') }}" + "?keyword=" + keyword + "&hotel="+ hotel;
        });

        $(document).ready(function(){
            var today = new Date();

            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                }
                if(mm<10){
                    mm='0'+mm
                }

            today = yyyy+'-'+mm+'-'+dd;
            var yearToday = today.slice(0,4)
            var monthToday = today.slice(5,7)
            var dayToday = today.slice(8,10)

            var newToday = new Date(yearToday, monthToday, dayToday)

            var changeTime = newToday.getTime()

            for(let i=1; i<=100;i++){
                var checkout = $('.time-checkout-'+i).text()

                if(checkout !== ""){
                    var year = checkout.slice(0,4)
                    var month = checkout.slice(5,7)
                    var day = checkout.slice(8,10)

                    var newCheckout = new Date(year, month, day)
                    var changeNewTime = newCheckout.getTime()

                    if(changeNewTime < changeTime){
                        $('.time-checkout-'+i).parents("tr").addClass('active-checkout')
                    }
                }
            }
        })
    </script>
@endpush
