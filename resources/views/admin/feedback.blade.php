@extends('admin/index')
@section('title', "Account")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Feedback</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" id={{ $keyword }}>
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
                <th scope="col">Surname</th>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">Created at</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $value)
                <tr class="js-account-{{ $value['id'] }}">
                    <td><input type="checkbox" class="customCheck" id="customCheck-{{ $value['id'] }}" name="customCheck-{{ $value['id'] }}" value="{{ $value['id'] }}"></td>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['id_acc'] }}</td>
                    <td>{{ $value['surname'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['content'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td>
                        <button id="{{ $value['id'] }}" class="btn btn-primary js-delete-account">Reply</button>
                        <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account">Delete</button>
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
        $(document).ready(function(){
            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                window.location.href =  "{{ route('admin.account') }}" + "?keyword=" + keyword ;
            });

            $('.customCheck').click(function(){
                var checked = $('input.customCheck:checked').length;
                if(checked){
                    $('.more-select-option').addClass('more-action-show')
                }else{
                    $('.more-select-option').removeClass('more-action-show')
                }
            })

        });
    </script>
@endpush
