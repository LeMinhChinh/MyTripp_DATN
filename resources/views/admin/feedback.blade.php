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
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value={{ $keyword }}>
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
                <th scope="col">Content</th>
                <th scope="col">Reply</th>
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
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['content'] }}</td>
                    <td>{{ $value['reply'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <button id="{{ $value['id'] }}" class="btn btn-primary js-reply-account" data-toggle="modal" data-target="#data-{{ $value['id'] }}">Reply</button>
                            </div>
                            <div class="col-6">
                                <button id="{{ $value['id'] }}" class="btn btn-danger js-delete-account">Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="data-{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Enter your reply to customer</label>
                                <textarea class="form-control content-reply-{{ $value['id'] }}" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary js-send-reply" data-id={{ $value['id'] }}>Send</button>
                        </div>
                      </div>
                    </div>
                  </div>
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
                window.location.href =  "{{ route('admin.feedback') }}" + "?keyword=" + keyword ;
            });

            $('.customCheck').click(function(){
                var checked = $('input.customCheck:checked').length;
                if(checked){
                    $('.more-select-option').addClass('more-action-show')
                }else{
                    $('.more-select-option').removeClass('more-action-show')
                }
            })

            $('.action-select').click(function(){
                var id = $('input.customCheck:checked').map(function(){
                    return $(this).val();
                }).toArray();
                if (confirm('Are you sure you want to delete request pricing?')) {
                    $.ajax({
                        url: "{{ route('admin.deleteFeedback') }}",
                        type: "POST",
                        data: {id: id},
                        success: function(data){
                            if(data === 'Feedback not found') {
                                alert('Feedback not found');
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
                }
            })

            $('.js-send-reply').click(function(){
                var self = $(this);
                var id = self.attr('data-id').trim();
                var content = $.trim($(".content-reply-"+id).val());
                console.log(id, content)

                $.ajax({
                    url: "{{ route('admin.replyFeedback') }}",
                    type: "POST",
                    data: {id: id, content: content},
                    success: function(data){
                        if(data === 'SenReplyd fail') {
                            alert('Reply fail');
                        }
                        if(data === 'Reply success') {
                            $('.modal.fade').removeClass('show')
                            $('.modal.fade').removeAttr('style')
                            $('.modal-backdrop.fade').remove()
                            $('body').removeAttr('style')
                            $('body').removeClass('modal-open')
                            $(".content-reply-"+id).val()
                            alert('Reply success');
                        }
                    }
                });
            })
        });

        $(function(){
            $('.js-delete-account').click(function() {
                var self = $(this);
                var id = self.attr('id').trim();
                if (confirm('Are you sure you want to delete request pricing?')) {
                    if($.isNumeric(id)){
                        $.ajax({
                            url: "{{ route('admin.deleteFeedback') }}",
                            type: "POST",
                            data: {id: id},
                            beforeSend: function(){
                                self.text('Loading ...');
                            },
                            success: function(data){
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
                }
            });
        });
    </script>
@endpush
