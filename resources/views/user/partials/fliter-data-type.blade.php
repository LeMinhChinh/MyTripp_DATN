<p class="hotel-notification">Hãy lựa chọn cho mình nơi ở tốt nhất @if($place) <span class="main-active">tại {{ $place['name'] }}</span> @endif</p>
<div class="list-hotel-item">
    @foreach ($inforListRP as $key => $value)
        <div class="rp-result-item" data-toggle="modal" data-target="#detailRoom" data-index="{{ $key }}">
            <div class="row">
                <div class="col-4">
                    <div class="rp-item-img">
                        <a href="{{ route('user.restingplace',['id' => $value['id']]) }}">
                            @foreach($images as $k => $v)
                                @if($key == $k)
                                    <img src="{{ URL::to('/') }}/user/uploads/resting_place/{{ $v['0'] }}" alt="">
                                @endif
                            @endforeach
                        </a>
                    </div>
                </div>
                <div class="col-5">
                    <div class="rp-item-infor">
                        <div class="rp-name">
                            <p><small>{{ $value['tname'] }} </small><a href="{{ route('user.restingplace',['id' => $value['id']]) }}">{{ $value['name'] }}</a> @for($i = 1; $i <= $value['rate'] ; $i++) <i class="fa fa-star"></i> @endfor </p>
                        </div>
                        <div class="rp-map">
                            <span class="glyphicon glyphicon-map-marker"></span><p>{{ $value['address'] }} - <a href="" class="rp-click-map" data-toggle="modal" data-target="#popupMap">Xem trên bản đồ</a></p>
                        </div>
                        <div class="rp-description">
                            {!! $value['description'] !!}
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="hotel-fb-price">
                        <div class="hotel-list-feedback">
                            <div class="hotel-feedback-user">
                                @foreach ($count as $c)
                                    @if($value['id'] == $c['id'])
                                        <div class="hotel-fb-user-number">
                                            @if($c['count_id'] > 0)
                                                <p class="hotel-fb-number">{{ round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) }}</p>
                                            @else
                                                <p class="hotel-fb-number-default">...</p>
                                            @endif
                                        </div>
                                        <div class="hotel-fb-user-text">
                                                @if($c['count_id'] > 0)
                                                    @if(round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 9 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 9)
                                                        <p class="hotel-fb-user-text-up">Tuyệt hảo</p>
                                                    @endif
                                                    @if(9 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) && round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 8 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 8)
                                                        <p class="hotel-fb-user-text-up">Tốt</p>
                                                    @endif
                                                    @if( 8 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) && round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) > 7 || round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2) == 7)
                                                        <p class="hotel-fb-user-text-up">Hài lòng</p>
                                                    @endif
                                                    @if(7 > round(($c['sum_emotion'] *10 / ($c['count_id'] * 4)),2))
                                                        <p class="hotel-fb-user-text-up">Không hài lòng</p>
                                                    @endif
                                                    <p class="hotel-fb-user-text-down">{{ $c['count_id'] }} đánh giá </p>
                                                @else
                                                    <p class="hotel-fb-user-text-up-deafault">Tuyệt hảo</p>
                                                    <p class="hotel-fb-user-text-down">Chưa có đánh giá</p>
                                                @endif
                                        </div>
                                    @endif
                                @endforeach
                                <div class="clear-fix"></div>
                            </div>
                        </div>
                        <div class="hotel-avg-price">
                            <div class="sr__card_price bui-spacer--large">
                            Giá trung bình/đêm: <br><span>VND&nbsp;2.524.952</span>
                            </div>
                            <button type="button" class="btn btn-primary"><a href="{{ route('user.restingplace',['id' => $value['id']]) }}" class="hotel-search-rooms">Tìm phòng trống</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination-page fix-top">{!! $paginate->links() !!}</div>
