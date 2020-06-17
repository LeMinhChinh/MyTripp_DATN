<div class="col-3">
    <div class="r-filter-title">
        <p class="bk-title">Lọc danh sách khách sạn</p>
    </div>
    <div class="hotel-filter-content">
        <div class="booking-form">
            <form action="#">
                <div class="r-filter-prices r-people fix-top">
                    <div class="r-prices-title r-title-3">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-3 disabledIcon"></i><i class="fas fa-angle-down r-down-3"></i></p><p class="r-time-title-text">Giá</p>
                   </div>
                    <div class="r-prices-content r-content-3">
                        <div class="r-filter-price">
                            <div data-role="page" class="r-child r-people">
                                <div data-role="main" class="ui-content">
                                    <div data-role="rangeslider">
                                      <label for="price-min">Price</label>
                                      <input type="range" name="price-min" id="price-min" value="0" min="0" max="10000000" step="0.01">
                                      <label for="price-max">Price:</label>
                                      <input type="range" name="price-max" id="price-max" value="10000000" min="0" max="10000000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="r-filter-convenients r-people fix-top">
                    <div class="r-prices-title r-title-4">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-4 disabledIcon"></i><i class="fas fa-angle-down r-down-4"></i></p><p class="r-time-title-text">Đánh giá sao</p>
                   </div>
                    <div class="r-prices-content r-content-4">
                        <div class="r-filter-convenient">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck1" name="filterRate" value="1">
                                <label class="form-check-label" for="exampleCheck1"><i class="fa fa-star"></i></label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck2" name="filterRate" value="2">
                                <label class="form-check-label" for="exampleCheck1"><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck2" name="filterRate" value="3">
                                <label class="form-check-label" for="exampleCheck1"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck3" name="filterRate" value="4">
                                <label class="form-check-label" for="exampleCheck3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-rate" id="exampleCheck4" name="filterRate" value="5">
                                <label class="form-check-label" for="exampleCheck4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
                <hr class="fix-section">
                <div class="r-filter-convenients r-people">
                    <div class="r-prices-title r-title-1">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-1 disabledIcon"></i><i class="fas fa-angle-down r-down-1"></i></p><p class="r-time-title-text">Điểm đánh giá khách hàng</p>
                   </div>
                    <div class="r-prices-content r-content-1">
                        <div class="r-filter-convenient">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck5" name="filterRate" value="4">
                                <label class="form-check-label" for="exampleCheck5">Tuyệt vời : 9.5 điểm trở lên</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck6" name="filterRate" value="3">
                                <label class="form-check-label" for="exampleCheck6">Rất tốt : 8.5 điểm trở lên</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck7" name="filterRate" value="2">
                                <label class="form-check-label" for="exampleCheck7">Tốt : 8 điểm trở lên</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input check-input-fb" id="exampleCheck8" name="filterRate" value="1">
                                <label class="form-check-label" for="exampleCheck8">Hài lòng : 7 điểm trở lên</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
                {{-- <hr class="fix-section">
                <div class="r-filter-avg-price r-people">
                    <div class="r-prices-title r-title-2">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-2 disabledIcon"></i><i class="fas fa-angle-down r-down-2"></i></p><p class="r-time-title-text">Giá trung bình/đêm</p>
                   </div>
                    <div class="r-prices-content r-content-2">
                        <div class="r-filter-convenient">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Từ thấp - cao</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Từ cao - thấp</label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <button class="filter-submit-rp">Tìm kiếm</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('input[name="filterRate"]').change(function() {
                var rate = $(".check-input-rate:checked").map(function(){
                    return $(this).val();
                }).toArray();

                var fb = $(".check-input-fb:checked").map(function(){
                    return $(this).val();
                }).toArray();
                console.log(rate, fb)
                $.ajax({
                        url: "{{ route('user.filterRPByType') }}",
                        type: "POST",
                        data: {rate: rate, fb: fb},
                        success: function(data){
                        }
                    });
            });
        });
    </script>
@endpush()
