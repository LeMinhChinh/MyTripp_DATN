
<div class="container">
    <div class="footer-text">
        <div class="row">
            <div class="col-lg-4">
                <div class="ft-about">
                    <div class="logo">
                        <div class="logo">
                            <a href="{{ route('homepage') }}">
                                {{-- <img src="{{ asset('/user/img/logo.png')}}" alt=""> --}}
                                MyTripp<span>.Com</span>
                            </a>
                        </div>
                    </div>
                    <p>Tìm kiếm ưu đãi khách sạn, chỗ nghỉ dạng nhà ở và nhiều hơn nữa...</p>
                    <div class="fa-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ft-contact">
                    <h6>Liên hệ</h6>
                    <ul>
                        <li>(+84) 32 777 5252</li>
                        <li>mytripp@gmail.com</li>
                        <li>Số 3, Đại Học Giao Thông Vận Tải</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="ft-newslatter">
                    <h6>Phản hồi</h6>
                    <p>Gửi phản hồi của bạn đến quản lí website về chất lượng của nhà cung cấp</p>
                    <div  class="fn-form">
                        <input type="text" placeholder="Phản hồi của bạn" class="feedback-content">
                        <button class="send-feedback" id={{ Session::get('idSession') }}><i class="fa fa-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <ul>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Riêng tư</a></li>
                    <li><a href="#">Chính sách</a></li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('.send-feedback').click(function() {
                var self = $(this);
                var id = self.attr('id').trim();
                var content = $('.feedback-content').val()
                console.log(id, content)
                if(id > 0){
                    $.ajax({
                        url: "{{ route('user.sendFeedBack') }}",
                        type: "POST",
                        data: {id: id, content: content},
                        success: function(data){
                            if(data === 'Feedback fail') {
                                alert('Gửi phản hồi không thành công.Vui lòng thử lại.');
                            }
                            if(data === 'Feedback success') {
                                $('.feedback-content').val('')
                                alert('Gửi phản hồi thành công. Vui lòng kiểm tra lại trong thông báo.');
                            }
                        }
                    });
                }else{
                    // window.location.href =  "{{ route('login') }}";
                    alert('Vui lòng đăng nhập để gửi phản hồi.');

                }
            });
        });
    </script>
@endpush()
