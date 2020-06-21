@extends('owner/index')
@section('title', "Personal Information")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">My Information</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="owner-infor">
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
                    </div>
                    <div class="owner-title">
                        <p class="ps-infor-img-title">Avatar</p>
                    </div>
                    <div class="owner-name">
                        <input disabled="disabled" type="file" name="psAvatar" id="psAvatar" class="ps-item-content-input">
                        <p class="ps-infor-img-label"><label for="psAvatar" >Choose file</label></p>
                    </div>
                </div>
                <div class="col-8">
                    <div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Username</label>
                            <input type="text" class="form-control" id="psUsername" name="psUsername" placeholder="Username" value="{{ $inforAcc['username'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content" title="Email không thể thay đổi">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" class="form-control ps-item-content-input" id="psEmail" name="psEmail" placeholder="Email" value="{{ $inforAcc['email'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="psGender">Gender</label>
                            <select class="custom-select" name="psGender" id="psGender" disabled="disabled">
                                <option value="" @if($inforAcc['gender'] === null) selected="selected" @endif>--- Gender ---</option>
                                <option value="1" @if($inforAcc['gender'] === 1) selected="selected" @endif>Male</option>
                                <option value="0" @if($inforAcc['gender'] === 0) selected="selected" @endif>Femail</option>
                            </select>
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Surname</label>
                            <input type="text" class="form-control" id="psSurname" name="psSurname" placeholder="Surname" value="{{ $inforAcc['surname'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="psName" name="psName" placeholder="Name"  value="{{ $inforAcc['name'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Phone</label>
                            <input type="text" class="form-control" id="psPhone" name="psPhone" placeholder="Phone"  value="{{ $inforAcc['phone'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput">Age</label>
                            <input type="date" class="form-control" id="psAge" name="psAge" placeholder="Age"  value="{{ $inforAcc['age'] }}" disabled="disabled">
                        </div>
                        <div class="form-group ps-item-content">
                            <label for="formGroupExampleInput2">Address</label>
                            <input type="text" class="form-control" id="psAddress" name="psAddress" placeholder="Address"  value="{{ $inforAcc['address'] }}" disabled="disabled">
                        </div>
                        <div class="ps-item-button">
                            <button type="button" class="btn btn-success ps-button-update">Update</button>
                            <button type="submit" class="btn btn-primary ps-button-save" id="{{ $inforAcc['id'] }}">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
