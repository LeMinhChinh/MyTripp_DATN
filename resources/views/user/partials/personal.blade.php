@extends('user/index')
@section('title', "Personal")

@section('content')
<main class="personal-main booking-main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="ps-welcome-left">
                    @if(Session::get('avatarSession') !== null)
                        <img src="{{ URL::to('/') }}/user/uploads/avatar/{{ Session::get('avatarSession') }}" alt="" class="ps-left-img">
                    @endif
                    @if(Session::get('avatarSession') === null && Session::get('genderSession') === 1)
                        <img src="{{ asset('user/img/avatar-male.webp') }}" alt="" class="ps-left-img">
                    @endif
                    @if(Session::get('avatarSession') === null && Session::get('genderSession') === 0)
                        <img src="{{ asset('user/img/female.jpg') }}" alt="" class="ps-left-img">
                    @endif
                    @if(Session::get('avatarSession') === null && Session::get('genderSession') === null)
                        <img src="{{ asset('user/img/avatar-user.png') }}" alt="" class="ps-left-img">
                    @endif
                    <div class="ps-left-info">
                    <p class="ps-left-name">{{ Session::get('fnameSession') }} {{ Session::get('lnameSession') }}</p>
                        <a href="{{ route('user.personalInformation', ['id' => Session::get('idSession')]) }}">Cập nhật hồ sơ của bạn</a>
                    </div>
                    <div class="ps-left-notifi">
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                            <a href="{{ route('user.personalInformation', ['id' => Session::get('idSession')]) }}">Thêm tên hiển thị</a>
                                <p>Có thể được cập nhật bất cứ khi nào bạn muốn và được hiển thị bên cạnh các đánh giá của bạn.</p>
                            </div>
                        </div>
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                                <a href="{{ route('user.personalInformation', ['id' => Session::get('idSession')]) }}">Thêm số điện thoại liên lạc</a>
                                <p>Thông tin này chỉ được dùng trong trường hợp chỗ nghỉ cần liên hệ với bạn.</p>
                            </div>
                        </div>
                        <div class="ps-left-add">
                            <div class="ps-left-add-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="ps-left-add-content">
                                <a href="{{ route('user.personalRequest', ['id' => Session::get('idSession')]) }}">Yêu cầu đăng phòng</a>
                                <p>Bạn là chủ sở hữu và bạn muốn đăng thông tin khách sạn (homestay, resort, ...) lên trang web.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('user/partials/form')
            </div>
            <div class="col-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.personalInformation', ['id' => Session::get('idSession')]) }}">Trang cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.personalBooking') }}">Đặt phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.personalNotify', ['id' => Session::get('idSession')]) }}">Thông báo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.personalRequest', ['id' => Session::get('idSession')]) }}">Yêu cầu đăng phòng</a>
                    </li>
                </ul>
                @yield('content-user')
            </div>
        </div>
    </div>
</main>
@endsection
