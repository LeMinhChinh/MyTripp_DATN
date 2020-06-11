@extends('owner/index')
@section('title', "Personal Information")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Personal Information</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="owner-infor">
        <form action="{{  route('owner.handleUpdateInfomation',['id' => $inforAcc['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                   <div class="owner-avatar">
                        @if($inforAcc['avatar'] !== null)
                            <img src="{{ URL::to('/') }}/user/uploads/avatar/{{ $inforAcc['avatar'] }}" alt="" class="ps-infor-image">
                        @endif
                        @if($inforAcc['avatar'] === null && $inforAcc['gender'] === 1)
                            <img src="{{ asset('user/img/avatar-male.webp') }}" alt="" class="ps-infor-image">
                        @endif
                        @if($inforAcc['avatar'] === null && $inforAcc['gender'] === 0)
                            <img src="{{ asset('user/img/female.jpg') }}" alt="" class="ps-infor-image">
                        @endif
                        @if($inforAcc['avatar'] === null && $inforAcc['gender'] === null)
                            <img src="{{ asset('user/img/avatar-user.png') }}" alt="" class="ps-infor-image">
                        @endif
                        <p class="ps-infor-img-title">Ảnh hồ sơ</p>
                        <input disabled="disabled" type="file" name="psAvatar" id="psAvatar" class="ps-item-content-input">
                        <p class="ps-infor-img-label"><label for="psAvatar" >Thay đổi hình ảnh</label></p>
                   </div>
                </div>
                <div class="col-8">
                    <div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Tên hiển thị</label>
                            <input type="text" class="form-control" id="psUsername" name="psUsername" placeholder="Tên hiển thị" value="{{ $inforAcc['username'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content" title="Email không thể thay đổi">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" class="form-control ps-item-content-input" id="psEmail" name="psEmail" placeholder="Email" value="{{ $inforAcc['email'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="psGender">Danh xưng</label>
                            <select class="custom-select" name="psGender" id="psGender" disabled="disabled">
                                <option value="" @if($inforAcc['gender'] === null) selected="selected" @endif>--- Danh xưng ---</option>
                                <option value="1" @if($inforAcc['gender'] === 1) selected="selected" @endif>Anh</option>
                                <option value="0" @if($inforAcc['gender'] === 0) selected="selected" @endif>Chị</option>
                            </select>
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Họ và tên đêm</label>
                            <input type="text" class="form-control" id="psSurname" name="psSurname" placeholder="Họ và tên đêm" value="{{ $inforAcc['surname'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Tên</label>
                            <input type="text" class="form-control" id="psName" name="psName" placeholder="Tên"  value="{{ $inforAcc['name'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Số điện thoại</label>
                            <input type="text" class="form-control" id="psPhone" name="psPhone" placeholder="Số điện thoại"  value="{{ $inforAcc['phone'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Ngày sinh</label>
                            <input type="date" class="form-control" id="psAge" name="psAge" placeholder="Ngày sinh"  value="{{ $inforAcc['age'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Địa chỉ</label>
                            <input type="text" class="form-control" id="psAddress" name="psAddress" placeholder="Địa chỉ"  value="{{ $inforAcc['address'] }}" disabled="disabled">
                        </div>
                        <div class="ps-item-button">
                            <button type="button" class="btn btn-success ps-button-update">Cập nhật hồ sơ</button>
                            <button type="submit" class="btn btn-primary ps-button-save" id="{{ $inforAcc['id'] }}">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
