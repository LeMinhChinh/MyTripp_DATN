@extends('user/partials/personal')
@section('title', "Personal Notify")

@section('content-user')
    <div class="personal-content fix-top">
        <h2>Xin chào, {{ $account['surname'] }} {{ $account['name'] }}!!!</h2>
        <p class="ps-infor-notify">Bạn có thể cập nhật thông tin mới nhất từ trang web tại đây.</p>
        @foreach ($feedback as $key => $item)
            <div class="personal-notify-item fix-top">
                <p class="ps-infor-notify">Bạn đã gửi phản hồi cho chúng tôi lúc {{ $item['created_at'] }}. Vui lòng chờ phản hồi từ chúng tôi. Xin cảm ơn!</p>
                <p class="ps-infor-notify show-feedback show-feedback-{{ $key }}">Xem nội dung phản hồi</p>
                <p class="ps-infor-notify content-feedback content-feedback-{{ $key }}">{{ $item['content'] }}</p>
            </div>
        @endforeach
    </div>
@endsection
