@extends('user/partials/personal')
@section('title', "Personal Information")

@section('content-user')
    <div class="personal-content fix-top">
        <h2>Xin chào, {{ $inforAcc['surname'] }} {{ $inforAcc['name'] }}!!!</h2>
        <p class="ps-infor-notify">Những thông tin này được hiển thị kế bên các đánh giá, xếp hạng, hình ảnh v.v... mà bạn đã chia sẻ công khai. Mọi cập nhật cũng sẽ xuất hiện trong các đóng góp trước đây của bạn.</p>

        <div class="fix-top">
            @if ($errorAvatar)
                <div class="alert alert-danger">
                    <h6>{{ $errorAvatar }}</h6>
                </div>
            @endif

            @if ($updateSuccess)
                <div class="alert alert-success">
                    <h6>{{ $updateSuccess }}</h6>
                </div>
            @endif

            @if ($updateError)
                <div class="alert alert-danger">
                    <h6>{{ $updateError }}</h6>
                </div>
            @endif
        </div>
        <hr class="fix-section">
        <div class="ps-infor fix-top">
            <form action="{{  route('user.handleUpdateInfomation',['id' => $inforAcc['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
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
                        </div>
                        <div class="owner-title">
                            <p class="ps-infor-img-title">Ảnh hồ sơ</p>
                        </div>
                        <div class="owner-name">
                            <input disabled="disabled" type="file" name="psAvatar" id="psAvatar" class="ps-item-content-input">
                            <p class="ps-infor-img-label"><label for="psAvatar" >Chọn tập tin</label></p>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Tên hiển thị</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="text" class="ps-item-content-username ps-item-content-input" value="{{ $inforAcc['username'] }}" id="psUsername" name="psUsername" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Email</p>
                            </div>
                            <div class="ps-item-content" title="Email không thể thay đổi">
                                <input type="text" class="ps-item-content-email ps-item-content-input" value="{{ $inforAcc['email'] }}" id="psEmail" name="psEmail" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <label for="psGender">Danh xưng</label>
                            </div>
                            <div class="ps-item-content">
                                <select class="custom-select" name="psGender" id="psGender" disabled="disabled">
                                    <option value="" @if($inforAcc['gender'] === null) selected="selected" @endif>--- Danh xưng ---</option>
                                    <option value="1" @if($inforAcc['gender'] === 1) selected="selected" @endif>Anh</option>
                                    <option value="0" @if($inforAcc['gender'] === 0) selected="selected" @endif>Chị</option>
                                </select>
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Họ và tên đệm</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="text" class="ps-item-content-surname ps-item-content-input" value="{{ $inforAcc['surname'] }}" id="psSurname" name="psSurname" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Tên</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="text" class="ps-item-content-name ps-item-content-input" value="{{ $inforAcc['name'] }}" id="psName" name="psName" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Số điện thoại</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="text" class="ps-item-content-phone ps-item-content-input" value="{{ $inforAcc['phone'] }}" id="psPhone" name="psPhone" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Ngày sinh</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="date" class="ps-item-content-age ps-item-content-input" value="{{ $inforAcc['age'] }}" id="psAge" name="psAge" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-infor-item">
                            <div class="ps-item-title">
                                <p>Địa chỉ</p>
                            </div>
                            <div class="ps-item-content">
                                <input type="text" class="ps-item-content-address ps-item-content-input" value="{{ $inforAcc['address'] }}" id="psAddress" name="psAddress" disabled="disabled">
                            </div>
                        </div>
                        <div class="ps-item-button">
                            <button type="button" class="btn btn-success ps-button-update">Cập nhật hồ sơ</button>
                            <button type="submit" class="btn btn-primary ps-button-save">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#psAvatar').change(function(){
            var x = $('#psAvatar').val()
            var fileName = `<div class="owner-name-file"><p class="ps-name-file">Namefile : `+x.slice(12)+`</p></div>`
            console.log(fileName)
            $(fileName).insertAfter($('.owner-name'))
        })
    </script>
@endpush
