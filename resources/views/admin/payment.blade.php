@extends('admin/index')
@section('title', "Pricing")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Pricing</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}">
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
                <th scope="col">Id Owner</th>
                <th scope="col">Name Owner</th>
                <th scope="col">Payment</th>
                <th scope="col">Bank</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $value)
                <tr class="js-account-{{ $value['id'] }}">
                    <td><input type="checkbox" class="requestCheck" id="requestCheck-{{ $value['id'] }}" name="requestCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td>
                    <td>{{ $value['id_owner'] }}</td>
                    <td>{{ $value['name_owner'] }}</td>
                    <td>
                        @if($value['payment'] == 0)
                            Banking
                        @endif
                        @if($value['payment'] == 1)
                            Paypal
                        @endif
                    </td>
                    <td>
                        @if($value['bank'] == 0)
                            Techcombank
                        @endif
                        @if($value['bank'] == 1)
                            Vietcombank
                        @endif
                        @if($value['bank'] == 2)
                            Viettinbank
                        @endif
                        @if($value['bank'] == 3)
                            Agribank
                        @endif
                    </td>
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
        {{ $paginate->appends(['keyword' => $keyword])->links() }}
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
                        url: "{{ route('admin.deletePayment') }}",
                        type: "POST",
                        data: {id: id},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            self.text('Delete');
                            if(data === 'Payment not found'){
                                alert('Payment not found')
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
                window.location.href =  "{{ route('admin.pricing') }}" + "?keyword=" + keyword;
            });

            $('.action-select').click(function(){
                var id = $('input.requestCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                console.log(id)
                $.ajax({
                    url: "{{ route('admin.deletePayment') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Payment not found'){
                            alert('Payment not found')
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

                $.ajax({
                    url: "{{ route('admin.updatePayment') }}",
                    type: "POST",
                    data: {id: id},
                    success: function(data){
                        if(data === 'Update payment fail') {
                            alert('Update payment fail');
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
