@extends('user/index')
@section('title', "Login")

@section('content')
<main>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="{{ route('handleLogin') }}" method="POST">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Đăng nhập
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="lgEmail" placeholder="Nhập vào email" value="{{ Session::get('emailRgtSession') }}">
                        <!-- <span class="focus-input100" data-symbol="&#xf190;"></span> -->
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Mật khẩu</span>
                        <input class="input100" type="password" name="lgPass" placeholder="Nhập vào mật khẩu" value="{{ Session::get('passwordRgtSession') }}">
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

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                           Hoặc đăng nhập bằng
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook-f"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Nếu bạn chưa có tài khoản
                        </span>

                    <a href="{{ route('register') }}" class="txt2">
                            Đăng kí
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
</main>

@endsection
