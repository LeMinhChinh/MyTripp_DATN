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
            <div class="fix-top">
                @if ($createSuccess)
                    <div class="alert alert-success">
                        <h6>{{ $createSuccess }}</h6>
                    </div>
                @endif

                @if ($updateSuccess)
                    <div class="alert alert-success">
                        <h6>{{ $updateSuccess }}</h6>
                    </div>
                @endif
            </div>
                <div class="multiple-hotel">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th scope="col"></th> --}}
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Place</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Publish</th>
                                <th scope="col">View</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inforRP as $value)
                                <tr class="js-account-{{ $value['id'] }}">
                                    {{-- <td><input type="checkbox" class="customCheck" id="customCheck-{{ $value['id'] }}" name="customCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td> --}}
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['tname'] }}</td>
                                    <td>{{ $value['pname'] }}</td>
                                    <td>{{ $value['address'] }}</td>
                                    <td>{{ $value['email'] }}</td>
                                    <td>{{ $value['phone'] }}</td>
                                    <td>
                                        @if( $value['publish']  == 0)
                                            <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request" style="background: #6c757d!important;border-color: #6c757d!important;">Unpublish</button>
                                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request" style="background: #007bff!important;border-color: #007bff!important;">Publish</button>
                                            </div>
                                        @endif
                                        @if( $value['publish'] == 1)
                                            <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request" style="background: #6c757d!important;border-color: #6c757d!important;">Unpublish</button>
                                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request" style="background: #007bff!important;border-color: #007bff!important;">Publish</button>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <button id="{{ $value['id'] }}" class="btn btn-success js-view" ><a href="{{ route('owner.updateHotel',['id' => $value['id']]) }}">Detail</a></button>
                                            </div>
                                            <div class="col-6">
                                                <button id="{{ $value['id'] }}" class="btn btn-info js-room" ><a href="{{ route('owner.roomHotel',['id' => $value['id']]) }}">Room</a></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginations-view">
                        {{ $paginate->appends(['keyword' => $keyword])->links() }}
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
                if (confirm('Are you sure you want to delete hotel?')) {
                    if($.isNumeric(idAccount)){
                        $.ajax({
                            url: "{{ route('owner.checkDeleteHotel') }}",
                            type: "POST",
                            data: {id: idAccount},
                            beforeSend: function(){
                                self.text('Loading ...');
                            },
                            success: function(data){
                                if(data.success){
                                    var today = new Date();
                                    var dd = today.getDate();
                                    var mm = today.getMonth()+1;
                                    var yyyy = today.getFullYear();
                                    if(dd<10){
                                            dd='0'+dd
                                        }
                                        if(mm<10){
                                            mm='0'+mm
                                        }

                                    today = new Date(yyyy, mm, dd)

                                    var changeToday = today.getTime()

                                    var yearCO = data.checkout.slice(0,4)
                                    var monthCO = data.checkout.slice(5,7)
                                    var dayCO = data.checkout.slice(8,10)

                                    var newCO = new Date(yearCO, monthCO, dayCO)

                                    var changeCO = newCO.getTime()

                                    if(changeCO > changeToday){
                                        alert("The hotel has a room being booked. Cannot be deleted!")
                                        self.text('Delete');
                                    }else{
                                        $.ajax({
                                            url: "{{ route('owner.deleteHotel') }}",
                                            type: "POST",
                                            data: {id: idAccount},
                                            beforeSend: function(){
                                                self.text('Loading ...');
                                            },
                                            success: function(data){
                                                if(data)
                                                self.text('Delete');
                                                if(data === 'Hotel not found'){
                                                    alert('Hotel not found')
                                                }
                                                if(data === 'Delete room fail') {
                                                    alert('Delete room fail');
                                                }
                                                if(data === 'Delete hotel fail') {
                                                    alert('Delete hotel fail');
                                                }
                                                if(data === 'Delete success') {
                                                    $('.js-account-'+idAccount).hide();
                                                    alert('Delele success');
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    }
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

            // $('.action-select').click(function(){
            //     var id = $('input.customCheck:checked').map(function(){
            //         return $(this).val();
            //     }).toArray();
            //     console.log(id)
            //     $.ajax({
            //         url: "{{ route('owner.deleteHotel') }}",
            //         type: "POST",
            //         data: {id: id},
            //         success: function(data){
            //             if(data === 'Hotel not found'){
            //                 alert('Hotel not found')
            //             }
            //             if(data === 'Delete room fail') {
            //                 alert('Delete room fail');
            //             }
            //             if(data === 'Delete hotel fail') {
            //                 alert('Delete hotel fail');
            //             }
            //             if(data === 'Delete success') {
            //                 $.each(id, function(index, id){
            //                     $('.js-account-'+id).hide();
            //                 })
            //                 alert('Delele success');
            //             }
            //         }
            //     });
            // })

            $('.js-update-request').click(function(){
                var self = $(this)
                var id = self.attr('id').trim();

                $.ajax({
                    url: "{{ route('owner.publishHotel') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Update fail') {
                            alert('Update fail');
                        }
                        if(data === 'Update success') {
                            if(self.hasClass('btn-primary')){
                                self.addClass('hide')
                                $('.awaiting-'+id+' .btn-success').addClass('show')
                            }

                            if(self.hasClass('btn-success')){
                                if(self.hasClass('show')){
                                    self.removeClass('show')
                                    $('.awaiting-'+id+' .btn-primary').removeClass('hide')
                                }
                            }

                            if(self.hasClass('btn-success')){
                                self.addClass('hide')
                                $('.approved-'+id+' .btn-primary').addClass('show')
                            }

                            if(self.hasClass('btn-primary')){
                                if(self.hasClass('show')){
                                    self.removeClass('show')
                                    $('.approved-'+id+' .btn-success').removeClass('hide')
                                }
                            }

                            alert('Update success');
                        }
                    }
                });
            })
        });
    </script>
@endpush
