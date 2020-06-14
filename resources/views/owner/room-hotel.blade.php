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
                    <input type="text" class="form-control id-search-keyword" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}" data-id="{{ $id }}">
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
                                <td>{{   number_format($value['price'], 0, '', ',')}}&#8363;</td>
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
                <div class="paginations-view">
                    {{ $paginate->links() }}
                </div>
            </div>
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
                        url: "{{ route('owner.deleteRoom') }}",
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
                window.location.href = "http://localhost:8000/owner/my-room/"+id+"?keyword="+keyword;
            });

            $('.action-select').click(function(){
                var id = $('input.customCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                console.log(id)
                $.ajax({
                    url: "{{ route('owner.deleteRoom') }}",
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
