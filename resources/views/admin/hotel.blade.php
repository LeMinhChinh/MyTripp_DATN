@extends('admin/index')
@section('title', "Hotel")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Hotel</a>
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
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Owner</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Publish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRP as $value)
                <tr class="js-account-{{ $value['id'] }}">
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['surname'] }}{{ $value['name'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['phone'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>
                        @if( $value['publish']  == 0)
                            <div class="awaiting-request-enabled awaiting-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Unpublish</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Publish</button>
                            </div>
                        @endif
                        @if( $value['publish'] == 1)
                            <div class="approved-request-enabled approved-{{ $value['id'] }}">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-update-request">Unpublish</button>
                                <button id="{{ $value['id'] }}" class="btn btn-success js-update-request">Publish</button>
                            </div>
                        @endif
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
        $(document).ready(function(){
            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                var role = $('.role-select-option').val()
                window.location.href =  "{{ route('admin.hotel') }}" + "?keyword=" + keyword;
            });

            $('.js-update-request').click(function(){
                var self = $(this)
                var id = self.attr('id').trim();

                $.ajax({
                    url: "{{ route('admin.updateHotel') }}",
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
