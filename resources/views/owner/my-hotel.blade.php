@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">My Hotel</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="upload-hotel">
        <p class="ps-infor-notify">Currently you have not uploaded the hotel profile on the website. Please <a class="click-upload-hotel" href="{{  route('owner.createHotel') }}">upload now!</a></p>
    </div>
@endsection
