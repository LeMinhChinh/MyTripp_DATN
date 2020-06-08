@extends('admin/index')
@section('title', "Request")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Request</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}">
                    <select class="custom-select custom-select-sm mb-3 status-select-option" name="" id="">
                        <option value="">Filter Status</option>
                        <option value="1">Approved</option>
                        <option value="0">Awaiting approval</option>
                    </select>
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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Id</th>
                <th scope="col">Id Account</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Name Resting Place</th>
                <th scope="col">Rate</th>
                <th scope="col">Address</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRequest as $value)
                <tr class="js-account-{{ $value['id'] }}">
                    <td><input type="checkbox" class="requestCheck" id="requestCheck-{{ $value['id'] }}" name="requestCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['id_acc'] }}</td>
                    <td>{{ $value['name_acc'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['phone'] }}</td>
                    <td>{{ $value['name_rp'] }}</td>
                    <td>{{ $value['rate'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>{{ $value['description'] }}</td>
                    <td>
                        @if( $value['status']  == 0)
                            <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Awaiting approval</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Approved</button>
                            </div>
                        @endif
                        @if( $value['status'] == 1)
                            <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Awaiting approval</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Approved</button>
                            </div>
                        @endif
                    </td>
                    <td>
                        <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-request">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginations-view">
        {{ $paginate->links() }}
    </div>
@endsection
@push('scripts')
    <script>
        $(function(){
            $('.js-delete-request').click(function() {
                var self = $(this);
                var id = self.attr('id').trim();
                if($.isNumeric(id)){
                    $.ajax({
                        url: "{{ route('admin.deleteRequest') }}",
                        type: "POST",
                        data: {id: id},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            self.text('Delete');
                            if(data === 'Request not found'){
                                alert('Request not found')
                            }
                            if(data === 'Delete fail') {
                                alert('Delete fail');
                            }
                            if(data === 'Delete success') {
                                $('.js-account-'+id).hide();
                                alert('Delele success');
                            }
                        }
                    });
                }
            });
        });

        $(document).ready(function(){
            $('.requestCheck').click(function(){
                var checked = $('input.requestCheck:checked').length;
                if(checked){
                    $('.more-select-option').addClass('more-action-show')
                }else{
                    $('.more-select-option').removeClass('more-action-show')
                }
            })

            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                var status = $('.status-select-option').val()
                console.log(keyword, status)
                window.location.href =  "{{ route('admin.request') }}" + "?keyword=" + keyword + "&status="+ status;
            });

            $('.action-select').click(function(){
                var id = $('input.requestCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                console.log(id)
                $.ajax({
                    url: "{{ route('admin.deleteRequest') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Request not found'){
                            alert('Request not found')
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

            $('.js-update-request').click(function(){
                var self = $(this)
                var id = self.attr('id').trim();
                console.log(id)

                $.ajax({
                    url: "{{ route('admin.updateRequest') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        console.log(data)
                        if(data === 'Update request fail') {
                            alert('Update request fail');
                        }
                        if(data === 'Update account fail') {
                            alert('Update account fail');
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
