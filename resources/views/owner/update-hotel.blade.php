@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.myHotel',['id' => Session::get('idSession')]) }}">My Hotel</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('owner.updateHotel',['id' => $inforRP['id']]) }}">{{ $inforRP['name'] }}</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="upload-hotel">
        <div class="single-hotel">
            <h2 style="text-align: center; color:red">{{ $inforRP['name'] }}</h2>
            <div class="fix-top">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($updateError)
                    <div class="alert alert-danger">
                        <h6>{{ $updateError }}</h6>
                    </div>
                @endif
            </div>
            <form action="{{  route('owner.handleUpdateHotel',['id' => $inforRP['id']])}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name hotel (*)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name hotel" value="{{ $inforRP['name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Type (*)</label>
                            <select class="form-control" id="type" name="type">
                                <option selected>--- Choose type ---</option>
                                @foreach ($type as $value)
                                    <option value="{{ $value['id'] }}" @if($inforRP['type'] == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Place (*)</label>
                            <select class="form-control" id="place" name="place">
                                <option selected>--- Choose place ---</option>
                                @foreach ($place as $v)
                                    <option value="{{ $v['id'] }}" @if($inforRP['place'] == $v['id']) selected @endif>{{ $v['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Address (*)</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $inforRP['address'] }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email (*)</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $inforRP['email'] }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Phone (*)</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $inforRP['phone'] }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Rate (*)</label>
                            <input type="number" class="form-control" id="rate" name="rate" placeholder="Rate" min="0" max="5" value="{{ $inforRP['rate'] }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Image (*)</label>
                            <input type="file" class="form-control" id="image[]" name="image[]" multiple>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputState">Wifi (*)</label>
                            <select id="wifi" name="wifi" class="form-control">
                                <option selected>--- Choose option ---</option>
                                <option value="1" @if($inforRP['wifi'] == 1) selected @endif>Yes</option>
                                <option value="0" @if($inforRP['wifi'] == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Pool (*)</label>
                            <select id="pool" name="pool" class="form-control">
                                <option selected>--- Choose option ---</option>
                                <option value="1" @if($inforRP['pool'] == 1) selected @endif>Yes</option>
                                <option value="0" @if($inforRP['pool'] == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Parking (*)</label>
                            <select id="parking" name="parking" class="form-control">
                                <option selected>--- Choose option ---</option>
                                <option value="1" @if($inforRP['parking'] == 1) selected @endif>Yes</option>
                                <option value="0" @if($inforRP['parking'] == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Smoke (*)</label>
                            <select id="smoke" name="smoke" class="form-control">
                                <option selected>--- Choose option ---</option>
                                <option value="1" @if($inforRP['smoke'] == 1) selected @endif>Yes</option>
                                <option value="0" @if($inforRP['smoke'] == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Animal (*)</label>
                            <select id="animal" name="animal" class="form-control">
                                <option selected>--- Choose option ---</option>
                                <option value="1" @if($inforRP['animal'] == 1) selected @endif>Yes</option>
                                <option value="0" @if($inforRP['animal'] == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group ageOption">
                            <label for="inputState">Age (Age limited to check-in) (*)</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Age" min="0" value="{{ $inforRP['age'] }}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Check-in (*)</label>
                            <input type="number" class="form-control" id="checkin" name="checkin" placeholder="Time check-in" min="0" max="24" value="{{ $inforRP['checkin'] }}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Check-out (*)</label>
                            <input type="number" class="form-control" id="checkout" name="checkout" placeholder="Time check-out" min="0" max="24" value="{{ $inforRP['checkout'] }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputState">Description</label>
                    <textarea id="desc" name="desc">{!! $inforRP['description'] !!}</textarea>
                </div>
                <div class="form-group save-button">
                    <button type="submit" class="btn btn-primary btn-lg ps-button-save">Update profile</button>
                </div>
            <form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#age').change(function(){
            if($('#age').val() == 1){
                $('.ageOption').addClass('divide')
                var ageLimit = `<div class="form-group ageLimit">
                                    <label for="inputState">Age Limit (*)</label>
                                    <input type="number" class="form-control" id="ageLimit" name="ageLimit" placeholder="Age limit" min="0">
                                </div>`
                $(ageLimit).insertAfter($('.ageOption'))
            }else{
                $('.ageOption').removeClass('divide')
                $('.ageLimit').remove()
            }
        })


        if($('#desc').length > 0){
            CKEDITOR.replace( 'desc' )
        }

    </script>
@endpush
