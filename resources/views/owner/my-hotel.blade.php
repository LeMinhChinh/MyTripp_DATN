@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.myHotel',['id' => Session::get('idSession')]) }}">My Hotel</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control id-search-keyword" placeholder="Searching for..." id="js-keyword" data-id="{{ Session::get('idSession') }}" value="{{ $keyword }}">
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
            <p class="ps-infor-notify">Currently you have not uploaded the hotel profile on the website. Please <a class="click-upload-hotel" href="{{  route('owner.createHotel') }}">upload now!</a></p>
        @else
            <p class="ps-infor-notify">Do you own many hotels? <a class="click-upload-hotel" href="{{  route('owner.createHotel') }}">Upload more now!</a></p>
            {{-- @if($count == 1)
                @foreach ($inforRP as $key => $item)
                    <div class="single-hotel">
                        <h2 style="text-align: center; color:red">{{ $item['name'] }}</h2>
                        <form action="{{  route('owner.handleUpdateHotel',['id' => $item['id']])}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Name hotel (*)</label>
                                        <input type="text" class="form-control" id="nameHotel" name="nameHotel" placeholder="Name hotel" value="{{ $item['name'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Type (*)</label>
                                        <select class="form-control" id="typeHotel" name="typeHotel">
                                            <option selected>--- Choose type ---</option>
                                            @foreach ($type as $value)
                                                <option value="{{ $value['id'] }}" @if($item['type'] == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Place (*)</label>
                                        <select class="form-control" id="placeHotel" name="placeHotel">
                                            <option selected>--- Choose place ---</option>
                                            @foreach ($place as $v)
                                                <option value="{{ $v['id'] }}" @if($item['place'] == $v['id']) selected @endif>{{ $v['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Address (*)</label>
                                        <input type="text" class="form-control" id="addressHotel" name="addressHotel" placeholder="Address" value="{{ $item['address'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Email (*)</label>
                                        <input type="text" class="form-control" id="emailHotel" name="emailHotel" placeholder="Email" value="{{ $item['email'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Phone (*)</label>
                                        <input type="text" class="form-control" id="phoneHotel" name="phoneHotel" placeholder="Phone" value="{{ $item['phone'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Rate (*)</label>
                                        <input type="number" class="form-control" id="rateHotel" name="rateHotel" placeholder="Rate" min="0" max="5" value="{{ $item['rate'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Image (*)</label>
                                        <input type="file" class="form-control" id="imageHotel[]" name="imageHotel[]" multiple>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="inputState">Wifi (*)</label>
                                        <select id="wifiHotel" name="wifiHotel" class="form-control">
                                            <option selected>--- Choose option ---</option>
                                            <option value="1" @if($item['wifi'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($item['wifi'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Pool (*)</label>
                                        <select id="poolHotel" name="poolHotel" class="form-control">
                                            <option selected>--- Choose option ---</option>
                                            <option value="1" @if($item['pool'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($item['pool'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Parking (*)</label>
                                        <select id="parkingHotel" name="parkingHotel" class="form-control">
                                            <option selected>--- Choose option ---</option>
                                            <option value="1" @if($item['parking'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($item['parking'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Smoke (*)</label>
                                        <select id="smokeHotel" name="smokeHotel" class="form-control">
                                            <option selected>--- Choose option ---</option>
                                            <option value="1" @if($item['smoke'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($item['smoke'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Animal (*)</label>
                                        <select id="animalHotel" name="animalHotel" class="form-control">
                                            <option selected>--- Choose option ---</option>
                                            <option value="1" @if($item['animal'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if($item['animal'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group ageOption">
                                        <label for="inputState">Age (Age limited to check-in) (*)</label>
                                        <input type="number" class="form-control" id="ageHotel" name="ageHotel" placeholder="Age" min="0" value="{{ $item['age'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Check-in (*)</label>
                                        <input type="number" class="form-control" id="checkinHotel" name="checkinHotel" placeholder="Time check-in" min="0" max="24" value="{{ $item['checkin'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Check-out (*)</label>
                                        <input type="number" class="form-control" id="checkoutHotel" name="checkoutHotel" placeholder="Time check-out" min="0" max="24" value="{{ $item['checkout'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputState">Description</label>
                                <textarea id="descHotel" name="descHotel">{!! $item['description'] !!}</textarea>
                            </div>
                            <div class="form-group save-button">
                                <button type="submit" class="btn btn-primary btn-lg ps-button-save">Update profile</button>
                            </div>
                        <form>
                    </div>
                @endforeach
            @endif --}}
            {{-- @if($count > 1) --}}
                <div class="multiple-hotel">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Place</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inforRP as $value)
                                <tr class="js-account-{{ $value['id'] }}">
                                    <td><input type="checkbox" class="customCheck" id="customCheck-{{ $value['id'] }}" name="customCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['tname'] }}</td>
                                    <td>{{ $value['pname'] }}</td>
                                    <td>{{ $value['address'] }}</td>
                                    <td>{{ $value['email'] }}</td>
                                    <td>{{ $value['phone'] }}</td>
                                    <td>
                                        <button id="{{ $value['id'] }}" class="btn btn-success js-view" ><a href="{{ route('owner.updateHotel',['id' => $value['id']]) }}">Detail</a></button>
                                        <button id="{{ $value['id'] }}" class="btn btn-info js-room" ><a href="{{ route('owner.roomHotel',['id' => $value['id']]) }}">Room</a></button>
                                        <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginations-view">
                        {{ $paginate->links() }}
                    </div>
                </div>
            {{-- @endif --}}
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.js-delete-account').click(function() {
                var self = $(this);
                var idAccount = self.attr('id').trim();
                if($.isNumeric(idAccount)){
                    $.ajax({
                        url: "{{ route('owner.deleteHotel') }}",
                        type: "POST",
                        data: {id: idAccount},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            console.log(data)
                            self.text('Delete');
                            if(data === 'Hotel not found'){
                                alert('Hotel not found')
                            }
                            // if(data === 'Delete user error') {
                            //     alert('Delete user fail');
                            // }
                            if(data === 'Delete fail') {
                                alert('Delete fail');
                            }
                            if(data === 'Delete success') {
                                $('.js-account-'+idAccount).hide();
                                alert('Delele success');
                            }
                        }
                    });
                }
            });
        });

        $(document).ready(function(){
            $('.customCheck').click(function(){
                var checked = $('input.customCheck:checked').length;
                if(checked){
                    $('.more-select-option').addClass('more-action-show')
                }else{
                    $('.more-select-option').removeClass('more-action-show')
                }
            })

            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                var id = $('#js-keyword').attr('data-id')
                window.location.href = "http://localhost:8000/owner/my-hotel/"+id+"?keyword="+keyword;
            });

            $('.action-select').click(function(){
                var id = $('input.customCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                console.log(id)
                $.ajax({
                    url: "{{ route('owner.deleteHotel') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Hotel not found'){
                            alert('Hotel not found')
                        }
                        if(data === 'Delete fail') {
                            alert('Delete fail');
                        }
                        if(data === 'Delete success') {
                            $.each(id, function(index, id){
                                $('.js-account-'+id).hide();
                            })
                            alert('Delele success');
                        }
                    }
                });
            })
        });
    </script>
@endpush
