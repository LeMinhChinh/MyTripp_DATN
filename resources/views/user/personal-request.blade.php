@extends('user/partials/personal')
@section('title', "Personal Request")

@section('content-user')
    <div class="personal-content fix-top">
        <h2>Xin chào, {{ $inforAcc['surname'] }} {{ $inforAcc['name'] }}!!!</h2>
        @if($count == 0)
            <p class="ps-infor-notify">Bạn là chủ khách sạn, resort, ... Bạn muốn đăng thông tin khách sạn trên trang web. Hãy gửi yêu cầu ngay đến chúng tôi.</p>
        @else
            <p class="ps-infor-notify ps-infor-note ">Yêu cầu của bạn đang trong trạng thái chờ duyệt. Vui lòng đợi phản hồi từ chúng tôi. Xin cảm ơn!</p>
        @endif
    </div>
    <div class="personal-content-request fix-top">
        <form action="{{ route('user.handleRequest') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group ps-request-infor">
                        <label for="formGroupExampleInput">Thông tin liên hệ</label>
                    </div>
                    <div class="form-group" style="display: none">
                        <input type="text" class="form-control" id="idOwner" placeholder="Họ và tên chủ khách sạn" name="idOwner" value="{{ $inforAcc['id'] }}">
                    </div>
                    <div class="form-group">
                        <label for="nameOwner">Chủ khách sạn (*)</label>
                        <input type="text" class="form-control" id="nameOwner" placeholder="Họ và tên chủ khách sạn" name="nameOwner" value="{{ $inforAcc['surname'] }} {{ $inforAcc['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="emailOwner">Email (*)</label>
                        <input type="email" class="form-control" id="emailOwner" placeholder="Email" name="emailOwner" value="{{ $inforAcc['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phoneOwner">Số điện thoại (*)</label>
                        <input type="number" class="form-control" id="phoneOwner" placeholder="Số điện thoại" name="phoneOwner" value="{{ $inforAcc['phone'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group ps-request-infor">
                        <label for="formGroupExampleInput">Thông tin khách sạn</label>
                    </div>
                    <div class="form-group">
                        <label for="nameRP">Tên khách sạn (*)</label>
                        <input type="text" class="form-control" id="nameRP" placeholder="Tên khách sạn" name="nameRP">
                    </div>
                    <div class="form-group">
                        <label for="rateRP">Đánh giá sao (*)</label>
                        <input type="number" class="form-control" id="rateRP" placeholder="Đánh giá sao" name="rateRP">
                    </div>
                    <div class="form-group">
                        <label for="addressRP">Địa chỉ (*)</label>
                        <input type="text" class="form-control" id="phonaddressRPeOwner" placeholder="Địa chỉ" name="addressRP">
                    </div>
                    <div class="form-group">
                        <label for="descriptionRP">Thêm mô tả</label>
                        <textarea type="text" class="form-control" id="descriptionRP" placeholder="Thêm mô tả" name="descriptionRP" rows="4" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="ps-request-submit">
                <button type="submit" class="btn btn-primary btn-request" @if($count > 0) disabled="disabled" @endif>Gửi yêu cầu</button>
            </div>
        </form>
    </div>
@endsection
