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

            @if ($createError)
                <div class="alert alert-danger">
                    <h6>{{ $createError }}</h6>
                </div>
            @endif

            @if ($createSuccess)
                <div class="alert alert-success">
                    <h6>{{ $createSuccess }}</h6>
                </div>
            @endif
        </div>
        <form action="{{  route('owner.handleCreateRoom')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group" style="display: none">
                        <label for="formGroupExampleInput">Id hotel (*)</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name room (*)</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name room" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price (*)</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" min="0" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Discount (*)</label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount : %" min="0" value="{{ old('discount') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Bed</label>
                        <select id="bed" name="bed" class="form-control">
                            <option value="0" selected>--- Choose option ---</option>
                            @foreach ($type as $key => $item)
                                <option value="{{ $item['id'] }}" @if(old('bed') === $item['id']) selected @endif>{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Quantity bed (*)</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity bed" min="0" value="{{ old('quantity') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Description bed</label>
                        <input type="text" class="form-control" id="desc" name="desc" placeholder="Add description for bed type if not in the list" value="{{ old('desc') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Image (*)</label>
                        <input type="file" class="form-control" id="image[]" name="image[]" multiple value="{{ old('image') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Adult (*)</label>
                        <input type="number" class="form-control" id="adult" name="adult" placeholder="Maximum number of adults" min="0" value="{{ old('adult') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Children (*)</label>
                        <input type="number" class="form-control" id="child" name="child" placeholder="Maximum number of children" min="0" value="{{ old('child') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Wifi (*)</label>
                        <select id="wifi" name="wifi" class="form-control">
                            <option value="2" selected>--- Choose option ---</option>
                            <option value="1" @if(old('wifi') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('wifi') === 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Smoke (*)</label>
                        <select id="smoke" name="smoke" class="form-control">
                            <option value="2" selected>--- Choose option ---</option>
                            <option value="1" @if(old('smoke') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('smoke') === 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Phone (*)</label>
                        <select id="phone" name="phone" class="form-control">
                            <option value="2" selected>--- Choose option ---</option>
                            <option value="1" @if(old('phone') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('phone') === 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Television (*)</label>
                        <select id="television" name="television" class="form-control">
                            <option value="2" selected>--- Choose option ---</option>
                            <option value="1" @if(old('television') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('television') === 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Air conditioning  (*)</label>
                        <select id="aircondition" name="aircondition" class="form-control">
                            <option value="2" selected>--- Choose option ---</option>
                            <option value="1" @if(old('aircondition') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('aircondition') === 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Acreage</label>
                        <input type="text" class="form-control" id="acreage" name="acreage" placeholder="Acreage" min="0" value="{{ old('acreage') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Description</label>
                <textarea id="descrition" name="descrition">{{ old('descrition') }}</textarea>
            </div>
            <div class="form-group save-button">
                <button type="submit" class="btn btn-primary btn-lg ps-button-save">Save</button>
            </div>
        <form>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace( 'descrition' );
    </script>
@endpush
