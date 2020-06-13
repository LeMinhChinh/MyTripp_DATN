@extends('owner/index')
@section('title', "My Room")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.myHotel', ['id' => Session::get('idSession')]) }}">My hotel</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('owner.roomHotel', ['id' => $id]) }}">{{ $name }}</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control id-search-keyword" placeholder="Searching for..." id="js-keyword">
                    {{-- <select class="custom-select custom-select-sm mb-3 role-select-option" name="" id="">
                        <option value="">Filter role</option>
                        <option value="2">Super Admin</option>
                        <option value="1">Owner</option>
                        <option value="0">Customer</option>

                    </select> --}}
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle more-select-option" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More option
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item action-select" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="upload-hotel">
        @if($count == 0)
            <p class="ps-infor-notify">Currently you have not uploaded the room profile on the website. Please <a class="click-upload-hotel" href="{{  route('owner.createRoom',['id' => $id]) }}">upload now!</a></p>
        @else
            <p class="ps-infor-notify">Does your hotel have many rooms? <a class="click-upload-hotel" href="{{  route('owner.createRoom',['id' => $id]) }}">Upload more now!</a></p>
            <div class="multiple-hotel">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Room</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Bed</th>
                            <th scope="col">Quantity bed</th>
                            <th scope="col">Description bed</th>
                            <th scope="col">Adult</th>
                            <th scope="col">Child</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inforRoom as $value)
                            <tr class="js-account-{{ $value['id'] }}">
                                <td><input type="checkbox" class="customCheck" id="customCheck-{{ $value['id'] }}" name="customCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td>
                                <td>{{ $value['name'] }}</td>
                                <td>{{ $value['price'] }}</td>
                                <td>{{ $value['discount'] }}%</td>
                                <td>{{ $value['namebed'] }}</td>
                                <td>{{ $value['quantity_bed'] }}</td>
                                <td>{{ $value['description_bed'] }}</td>
                                <td>{{ $value['adult'] }}</td>
                                <td>{{ $value['child'] }}</td>
                                <td>
                                    <button id="{{ $value['id'] }}" class="btn btn-success js-view" ><a href="{{ route('owner.updateRoom',['id' => $value['id']]) }}">Detail</a></button>
                                    <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account" >Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
