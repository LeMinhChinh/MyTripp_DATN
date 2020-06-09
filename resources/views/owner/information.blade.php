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
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <form>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Tên hiển thị</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên hiển thị">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Email</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Danh xưng</label>
                        <select class="custom-select" id="inputGroupSelect02">
                            <option selected>--- Danh xưng ---</option>
                            <option value="1">Anh</option>
                            <option value="0">Chị</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Họ và tên đêm</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Họ và tên đêm">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tên</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Số điện thoại</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ngày sinh</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Địa chỉ</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Địa chỉ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
