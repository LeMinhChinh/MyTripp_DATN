<div class="col-3">
    <div class="r-filter-title">
        <p class="bk-title">Lọc danh sách phòng</p>
    </div>
    <div class="r-filter-content">
        <div class="booking-form">
            <form action="#">
               <div class="r-filter-time r-people fix-top">
                   <div class="r-time-title r-title-1">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-1 disabledIcon"></i><i class="fas fa-angle-down r-down-1"></i></p><p class="r-time-title-text">Thời gian</p>
                   </div>
                    <div class="r-time-content r-content-1 fix-top">
                        <div class="check-date">
                            <label for="date-in">Check in</label>
                            <input type="text" class="date-input booking-input" id="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check out</label>
                            <input type="text" class="date-input booking-input" id="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                    </div>
               </div>
               <hr class="fix-section">
                <div class="r-filter-need r-people">
                    <div class="r-need-title r-title-2">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-2 disabledIcon"></i><i class="fas fa-angle-down r-down-2"></i></p><p class="r-time-title-text">Nhu cầu</p>
                   </div>
                    <div class="r-need-content r-content-2 fix-top">
                        <div class="r-adult r-people">
                            <label for="guest">Số người lớn</label>
                            <input type="text" class="booking-input">
                        </div>
                        <div class="r-child r-people">
                            <label for="guest">Số trẻ con</label>
                            <input type="text" class="booking-input">
                        </div>
                        <div class="r-child r-people select-option">
                            <label for="beds">Giường</label>
                            <select id="beds" class="booking-input">
                                <option value="">1 giường đơn</option>
                                <option value="">1 giường đôi</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="fix-section">
                <div class="r-filter-prices r-people">
                    <div class="r-prices-title r-title-3">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-3 disabledIcon"></i><i class="fas fa-angle-down r-down-3"></i></p><p class="r-time-title-text">Giá</p>
                   </div>
                    <div class="r-prices-content r-content-3 fix-top">
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
                <hr class="fix-section">
                <div class="r-filter-prices r-people">
                    <div class="r-prices-title r-title-4">
                        <p class="r-time-title-icon"><i class="fas fa-angle-up r-up-4 disabledIcon"></i><i class="fas fa-angle-down r-down-4"></i></p><p class="r-time-title-text">Tiện nghi</p>
                   </div>
                    <div class="r-prices-content r-content-4 fix-top">
                        <div class="r-filter-convenient">
                            <div class="r-child r-people">
                                <label for="guest">Phòng hút thuốc</label>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Có</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Không</label>
                                </div>
                            </div>
                            <div class="r-child r-people">
                                <label for="guest">Tivi</label>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Có</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Không</label>
                                </div>
                            </div>
                            <div class="r-child r-people">
                                <label for="guest">Điều hòa</label>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Có</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Không</label>
                                </div>
                            </div>
                            <div class="r-child r-people">
                                <label for="guest">Điện thoại</label>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Có</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Không</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="filter-submit-room">Tìm kiếm</button>
            </form>
        </div>
    </div>
</div>
