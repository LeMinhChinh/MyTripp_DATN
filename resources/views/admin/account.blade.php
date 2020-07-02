@extends('admin/index')
@section('title', "Account")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Account</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}">
                    <select class="custom-select custom-select-sm mb-3 role-select-option" name="" id="">
                        <option value="">Filter role</option>
                        <option value="2" @if($role === 2) selected @endif>Super Admin</option>
                        <option value="1" @if($role === 1) selected @endif>Owner</option>
                        <option value="0" @if($role === 0 && $role !== '') selected @endif>Customer</option>
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
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Surname</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAcc as $value)
                <tr class="js-account-{{ $value['id'] }}">
                    <td><input type="checkbox" class="customCheck" id="customCheck-{{ $value['id'] }}" name="customCheck-{{ $value['id'] }}" @if($value['role'] ==2) disabled="disabled" @endif value="{{ $value['id'] }}"></td>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['username'] }}</td>
                    <td>{{ $value['surname'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['phone'] }}</td>
                    <td>
                        @if( $value['role']  == 2)Super Admin @endif
                        @if( $value['role'] == 1)Owner @endif
                        @if( $value['role'] == 0)Customer @endif
                    </td>
                    <td>
                        @if( $value['status']  == 0)
                            <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request" @if($value['role'] ==2) disabled="disabled" @endif>Deactive</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request" @if($value['role'] ==2) disabled="disabled" @endif>Active</button>
                            </div>
                        @endif
                        @if( $value['status'] == 1)
                            <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request" @if($value['role'] ==2) disabled="disabled" @endif>Deactive</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request" @if($value['role'] ==2) disabled="disabled" @endif>Active</button>
                            </div>
                        @endif
                    </td>
                    <td>
                        <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account" @if($value['role'] == 2) disabled="disabled" @endif>Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginations-view">
        {{ $paginate->appends(['keyword' => $keyword, 'role' => $role])->links() }}
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
                        url: "{{ route('admin.deleteAccount') }}",
                        type: "POST",
                        data: {id: idAccount},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            console.log(data)
                            self.text('Delete');
                            if(data === 'User not found'){
                                alert('User not found')
                            }
                            if(data === 'Delete user error') {
                                alert('Delete user fail');
                            }
                            if(data === 'Delete feedback error') {
                                alert('Delete feedback fail');
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
                var role = $('.role-select-option').val()
                window.location.href =  "{{ route('admin.account') }}" + "?keyword=" + keyword + "&role="+ role;
            });

            $('.action-select').click(function(){
                var id = $('input.customCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                console.log(id)
                $.ajax({
                    url: "{{ route('admin.deleteAccount') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        console.log(data)
                        if(data === 'User not found'){
                            alert('User not found')
                        }
                        if(data === 'Delete user error') {
                            alert('Delete user fail');
                        }
                        if(data === 'Delete feedback error') {
                            alert('Delete feedback fail');
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

                $.ajax({
                    url: "{{ route('admin.updateAccount') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Update account fail') {
                            alert('Update account fail');
                        }
                        if(data === 'Update hotel fail') {
                            alert('Update hotel fail');
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
