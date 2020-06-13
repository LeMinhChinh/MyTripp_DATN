@extends('owner/index')
@section('title', "My Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.roomHotel', ['id' => $id]) }}">{{ $name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('owner.createRoom', ['id' => $id]) }}">Create Room</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="upload-hotel">
        <h2 style="text-align: center; color:red">New Room's {{ $name }}</h2>
        <form action="{{  route('owner.handleCreateRoom')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group" style="display: none">
                        <label for="formGroupExampleInput">Id hotel (*)</label>
                        <input type="text" class="form-control" id="idHotel" name="idHotel" value="{{ $id }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name room (*)</label>
                        <input type="text" class="form-control" id="nameRoom" name="nameRoom" placeholder="Name room">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price (*)</label>
                        <input type="number" class="form-control" id="priceRoom" name="priceRoom" placeholder="Price" min="0">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Discount (*)</label>
                        <input type="number" class="form-control" id="discountRoom" name="discountRoom" placeholder="Discount : %" min="0">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Bed</label>
                        <select id="bedRoom" name="bedRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            @foreach ($type as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Quantity bed (*)</label>
                        <input type="number" class="form-control" id="qtyBedHotel" name="qtyBedHotel" placeholder="Quantity bed" min="0">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Description bed</label>
                        <input type="text" class="form-control" id="descBedRoom" name="descBedRoom" placeholder="Add description for bed type if not in the list">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Image (*)</label>
                        <input type="file" class="form-control" id="imageRoom[]" name="imageRoom[]" multiple>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Adult (*)</label>
                        <input type="number" class="form-control" id="adultRoom" name="adultRoom" placeholder="Maximum number of adults" min="0">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Children (*)</label>
                        <input type="number" class="form-control" id="childRoom" name="childRoom" placeholder="Maximum number of children" min="0">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Wifi (*)</label>
                        <select id="wifiRoom" name="wifiRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Smoke (*)</label>
                        <select id="smokeRoom" name="smokeRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Phone (*)</label>
                        <select id="phoneRoom" name="phoneRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Television (*)</label>
                        <select id="tiviRoom" name="tiviRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Air conditioning  (*)</label>
                        <select id="airRoom" name="airRoom" class="form-control">
                            <option selected>--- Choose option ---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Acreage</label>
                        <input type="text" class="form-control" id="acreageRoom" name="acreageRoom" placeholder="Acreage" min="0">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Description</label>
                <textarea id="descRoom" name="descRoom"></textarea>
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
