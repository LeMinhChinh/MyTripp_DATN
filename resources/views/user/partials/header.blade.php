<div class="top-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <ul class="tn-left">
                    <li><i class="fa fa-phone"></i> (+84) 32 777 5252</li>
                    <li><i class="fa fa-envelope"></i> mytripp@gmail.com</li>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="tn-right">
                    <div class="top-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                    <!-- <a href="#" class="bk-btn">Booking Now</a> -->
                    <div class="language-option">
                        <img src="{{ asset('user/img/vietnam-flag-square-icon-16.png')}}" alt="">
                        <span>VN <i class="fa fa-angle-down"></i></span>
                        {{-- <div class="flag-dropdown">
                            <ul>
                                <li><a href="#">Zi</a></li>
                                <li><a href="#">Fr</a></li>
                            </ul>
                        </div> --}}
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                @if(null!==Session::get('emailSession'))
                    <div class="nav-menu">
                        @if(Session::get('roleSession') === 0)<button class="btn btn-primary" id="menu-name">
                            <a href="{{ route('user.personalInformation',['id' => Session::get('idSession')]) }}">
                                @if (Session::get('genderSession') === 0)
                                    <i class="fas fa-female"></i>
                                @endif
                                @if (Session::get('genderSession') === 1)
                                    <i class="fas fa-male"></i>
                                @endif
                                @if (Session::get('genderSession') === null)
                                    <i class="fas fa-user"></i>
                                @endif
                                Hi, {{ Session::get('fnameSession') }} {{ Session::get('lnameSession') }}
                            </a>
                        </button>@endif
                        @if(Session::get('roleSession') === 2)<button class="btn btn-primary" id="menu-name">
                            <a href="{{ route('admin.dashboard') }}">
                                @if (Session::get('genderSession') === 0)
                                    <i class="fas fa-female"></i>
                                @endif
                                @if (Session::get('genderSession') === 1)
                                    <i class="fas fa-male"></i>
                                @endif
                                @if (Session::get('genderSession') === null)
                                    <i class="fas fa-user"></i>
                                @endif
                                Hi, {{ Session::get('fnameSession') }} {{ Session::get('lnameSession') }}
                            </a>
                        </button>@endif
                        @if(Session::get('roleSession') === 1)<button class="btn btn-primary" id="menu-name">
                            <a href="{{ route('owner.dashboard') }}">
                                @if (Session::get('genderSession') === 0)
                                    <i class="fas fa-female"></i>
                                @endif
                                @if (Session::get('genderSession') === 1)
                                    <i class="fas fa-male"></i>
                                @endif
                                @if (Session::get('genderSession') === null)
                                    <i class="fas fa-user"></i>
                                @endif
                                Hi, {{ Session::get('fnameSession') }} {{ Session::get('lnameSession') }}
                            </a>
                        </button>@endif
                        <button class="btn btn-primary" id="menu-logout"><a href="{{ route('handleLogout') }}">Đăng xuất</a></button>
                    </div>
                @else()
                    <div class="nav-menu">
                        <button class="btn btn-primary" id="menu-login"><a href="{{ route('register') }}">Đăng kí</a></button>
                        <button class="btn btn-primary" id="menu-register"><a href="{{ route('login') }}">Đăng nhập</a></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="menu-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{ route('homepage') }}">
                        {{-- <img src="{{ asset('/user/img/logo.png')}}" alt=""> --}}
                        MyTripp<span>.Com</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="nav-search">
                    <div class="form-search-user">
                        <form action="{{ route('user.search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Bạn muốn đến đâu? Hãy nhập địa điểm hoặc tên khách sạn" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword" value="{{ $keyword }}">
                                <input type="hidden" name="rate">
                                <div class="input-group-append">
                                <button class="input-group-text btn btn-primary" id="basic-addon2">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-icon-book">
                        <a href="{{ route('user.listBooking') }}" title="Booking list room" class="icon-book hide"><i class="fas fa-box"></i></a>
                        <p title="Booking list room" class="booking-page" style="cursor: pointer;"><i class="fas fa-box"></i></p>
                        <p class="count-room">
                            {{-- @if($idBook == null)
                                0
                            @else
                                {{ $countBook }}
                            @endif --}}
                            0
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        //header
        $(document).ready(function(){
            $('.booking-page').click(function(){

                var listRoom = JSON.parse(localStorage.getItem('list_id')) || []

                var listCheckin =  JSON.parse(localStorage.getItem('list_checkin')) || []

                var listCheckout = JSON.parse(localStorage.getItem('list_checkout')) || []
                console.log(listRoom)
                if(listRoom.length == 0){
                    console.log(1)
                    window.location.href =  "{{ route('user.bookingPage') }}"
                }else{
                    console.log(2)
                    $.ajax({
                        url: "{{ route('user.listBooking') }}",
                        type: "POST",
                        data: {listRoom: listRoom, listCheckin: listCheckin, listCheckout: listCheckout},
                        success: function(data){
                            if(data.success){
                                if(data.success == true){
                                    window.location.href =  "{{ route('user.viewListBooking') }}"
                                }
                            }
                        }
                    });
                }
            })
        })

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>
@endpush
