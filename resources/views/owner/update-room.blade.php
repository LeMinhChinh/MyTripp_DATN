@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.roomHotel', ['id' => $id_rp]) }}">{{ $name_rp }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('owner.updateRoom', ['id' => $name['id']]) }}">{{ $name['name'] }}</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="upload-hotel">
        <h2 style="text-align: center; color:red">Room {{ $name['name'] }}</h2>
        <form action="{{  route('owner.handleUpdateRoom',['id' => $name['id']])}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name room (*)</label>
                        <input type="text" class="form-control" id="nameRoom" name="nameRoom" placeholder="Name room" value="{{ $name['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price (*)</label>
                        <input type="number" class="form-control" id="priceRoom" name="priceRoom" placeholder="Price" min="0" value="{{ $name['price'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Discount (*)</label>
                        <input type="number" class="form-control" id="discountRoom" name="discountRoom" placeholder="Discount : %" min="0" value="{{ $name['discount'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Bed</label>
                        <select id="bedRoom" name="bedRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            @foreach ($type as $key => $item)
                                <option value="{{ $item['id'] }}" @if($item['id'] == $name['type_bed']) selected @endif>{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Quantity bed (*)</label>
                        <input type="number" class="form-control" id="qtyBedHotel" name="qtyBedHotel" placeholder="Quantity bed" min="0" value="{{ $name['quantity_bed'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Description bed</label>
                        <input type="text" class="form-control" id="descBedRoom" name="descBedRoom" placeholder="Add description for bed type if not in the list" value="{{ $name['description_bed'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Image (*)</label>
                        <input type="file" class="form-control" id="imageRoom[]" name="imageRoom[]" multiple>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Adult (*)</label>
                        <input type="number" class="form-control" id="adultRoom" name="adultRoom" placeholder="Maximum number of adults" min="0" value="{{ $name['adult'] }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Children (*)</label>
                        <input type="number" class="form-control" id="childRoom" name="childRoom" placeholder="Maximum number of children" min="0" value="{{ $name['child'] }}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Wifi (*)</label>
                        <select id="wifiRoom" name="wifiRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1" @if($name['wifi'] == 1) selected @endif>Yes</option>
                            <option value="0" @if($name['wifi'] == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Smoke (*)</label>
                        <select id="smokeRoom" name="smokeRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1" @if($name['smoke'] == 1) selected @endif>Yes</option>
                            <option value="0" @if($name['smoke'] == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Phone (*)</label>
                        <select id="phoneRoom" name="phoneRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1" @if($name['phone'] == 1) selected @endif>Yes</option>
                            <option value="0" @if($name['phone'] == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Television (*)</label>
                        <select id="tiviRoom" name="tiviRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1" @if($name['television'] == 1) selected @endif>Yes</option>
                            <option value="0" @if($name['television'] == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Air conditioning (*)</label>
                        <select id="airRoom" name="airRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1" @if($name['air_conditioning'] == 1) selected @endif>Yes</option>
                            <option value="0" @if($name['air_conditioning'] == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Acreage</label>
                        <input type="text" class="form-control" id="acreageRoom" name="acreageRoom" placeholder="Acreage" min="0" value="{{ $name['acreage'] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Description</label>
                <textarea id="descRoom" name="descRoom">{!! $name['description'] !!}</textarea>
            </div>
            <div class="form-group save-button">
                <button type="submit" class="btn btn-primary btn-lg ps-button-save">Save</button>
            </div>
        <form>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace( 'descRoom' );
    </script>
@endpush
