@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Create Hotel</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="upload-hotel">
        <h2 style="text-align: center; color:red">Information Hotel</h2>
        <form action="{{  route('owner.handleCreateHotel')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name hotel</label>
                        <input type="text" class="form-control" id="nameHotel" name="nameHotel" placeholder="Name hotel">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Type</label>
                        <select class="form-control" id="tyleHotel" name="tyleHotel">
                            <option selected>--- Choose type ---</option>
                            @foreach ($type as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Place</label>
                        <select class="form-control" id="placeHotel" name="placeHotel">
                            <option selected>--- Choose place ---</option>
                            @foreach ($place as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Address</label>
                        <input type="text" class="form-control" id="addressHotel" name="addressHotel" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input type="text" class="form-control" id="emailHotel" name="emailHotel" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Phone</label>
                        <input type="text" class="form-control" id="phoneHotel" name="phoneHotel" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Rate</label>
                        <input type="number" class="form-control" id="rateHotel" name="rateHotel" placeholder="Rate" min="0" max="5">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Image</label>
                        <input type="file" class="form-control" id="imageHotel[]" name="imageHotel[]" multiple>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="inputState">Wifi</label>
                        <select id="wifiHotel" name="wifiHotel" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Pool</label>
                        <select id="poolHotel" name="poolHotel" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Parking</label>
                        <select id="parkingHotel" name="parkingHotel" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Smoke</label>
                        <select id="smokeHotel" name="smokeHotel" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group ageOption">
                        <label for="inputState">Age (Age limited to check-in)</label>
                        <select id="ageHotel" name="ageHotel" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Check-in</label>
                        <input type="number" class="form-control" id="checkinHotel" name="checkinHotel" placeholder="Time check-in" min="0" max="24">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Check-out</label>
                        <input type="number" class="form-control" id="checkoutHotel" name="checkoutHotel" placeholder="Time check-out" min="0" max="24">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Description</label>
                <textarea id="descHotel" name="descHotel"></textarea>
            </div>
            <div class="form-group save-button">
                <button type="submit" class="btn btn-primary btn-lg ps-button-save" id="{{ Session::get('idSession') }}">Save</button>
            </div>
        <form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#ageHotel').change(function(){
            console.log($('#ageHotel').val())
            if($('#ageHotel').val() == 1){
                $('.ageOption').addClass('divide')
                var ageLimit = `<div class="form-group ageLimit">
                                    <label for="inputState">Age Limit</label>
                                    <input type="number" class="form-control" id="ageLimitHotel" name="ageLimitHotel" placeholder="Age limit" min="0">
                                </div>`
                $(ageLimit).insertAfter($('.ageOption'))
            }else{
                $('.ageOption').removeClass('divide')
                $('.ageLimit').remove()
            }
        })

        CKEDITOR.replace( 'descHotel' );
    </script>
@endpush
