@extends('owner/index')
@section('title', "Dashboard")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="dashboard-parameter">
        <h2 style="text-align: center; color: #fb5151">General statistics</h2>
        <div class="row fix-top">
            <div class="col-3">
                <div class="dashboard-total-booking dashboard-total">
                    <p class="total-booking-title total">Total Booking</p>
                    <p class="total-booking-number total">{{ $countBook }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="dashboard-total-revenue dashboard-total">
                    <p class="total-booking-title total">Total Revenue</p>
                    <p class="total-booking-number total">{{ number_format($total,0 ,'.' ,'.').'' }}&#8363;</p>
                </div>
            </div>
            <div class="col-3">
                <div class="dashboard-total-hotel dashboard-total">
                    <p class="total-booking-title total">Total Hotel</p>
                    <p class="total-booking-number total">{{ $countRP }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="dashboard-total-room dashboard-total">
                    <p class="total-booking-title total">Total Room</p>
                    <p class="total-booking-number total">{{ $countRoom }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-char fix-top">
        <div class="row">
           <div class="col-6">
                @foreach ($totalMonth as $key => $item)
                    <input type="text" data-total="{{ $item }}" style="display: none" class="total-month total-{{ $key }}">
                @endforeach
                <input type="text" data-id={{ Session::get('idSession') }} style="display: none" class="id-owner">
                <canvas id="myChart" width="50" height="50"></canvas>
                <h3 style="text-align: center">Total revenue by month (2020)</h3>
           </div>
           <div class="col-6">
                <p class="fix-top">View by :
                    <span>
                        <div class="form-group">
                            <select class="form-control" id="rp" name="rp">
                                <option value="all" selected>--- All hotel ---</option>
                                @foreach ($rp as $item)
                                    <option value="{{ $item['id'] }}" @if($hotel == $item['id']) selected @endif>{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="input-group mb-3">
                            <select class="form-control" id="place" name="place">
                                <option value="" selected>--- All hotel ---</option>
                                @foreach ($rp as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}-</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="js-search">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div> --}}
                    </span>
                </p>
           </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    let totalMonth = []
    for (let i = 0; i < 12; i++) {
        var total = $('.total-'+i).attr('data-total')
        totalMonth.push(total)
    }
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug', 'Sep', 'Oct','Nov', 'Dec'],
            datasets: [{
                label: 'Total Revenue',
                data: totalMonth,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    $(document).ready(function(){
        $('#rp').change(function(){
            var hotel = $(this).val()
            var owner = $('.id-owner').attr('data-id')
            window.location.href = "http://localhost:8000/owner/dashboard/"+owner+"?hotel="+hotel
        })
    })
    </script>
@endpush
