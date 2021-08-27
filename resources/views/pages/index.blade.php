@extends('layout')
@section('content')
    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Văn phòng dịch thuật Minh Tuệ</h1>
                        <p class="p-large">Công ty chúng tôi đề cao sứ mệnh phục vụ khách hàng. Mọi nỗ lực của chúng tôi đều
                            hướng đến một mục đích duy nhất là đem đến cho khách hàng
                            các dịch vụ tốt hơn với chi phí ít hơn và nhiều ưu điểm vượt trội.</p>
                        <a class="btn-solid-lg popup-with-move-anim" href="#details-lightbox"><i
                                class="fab fa-pied-piper-hat"></i>Dịch vụ</a>
                        <a class="btn-solid-lg secondary" href="{{ URL::to('/contact') }}"><i
                                class="fab fa-facebook-messenger"></i>Liên hệ</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ URL::asset('frontend/images/header-smartphone.png') }}"
                            alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Introduction -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Với cộng đồng hơn 25.000 biên dịch, phiên dịch viên chuyên nghiệp, chúng tôi cung cấp các giải pháp
                        dịch thuật với hơn 50 cặp ngôn ngữ. Các bản dịch luôn được kiểm soát kỹ lưởng về hình thức cũng như
                        nội dung để đáp ứng các yêu cầu khắt khe nhất theo yêu cầu của cho khách hàng tại Việt Nam cũng như
                        Quốc tế.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->


    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-1.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Đội ngũ chuyên nghiệp</h5>
                            <p>Đội ngũ dịch thuật chuyên nghiệp: đã qua đào tạo, chuẩn hóa và có chuyên môn cao.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-2.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Đảm bảo chất lượng</h5>
                            <p>Quy trình dịch thuật đảm bảo chất lượng: logic và khoa học, hoàn tiền nếu sai sót > 7%.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-3.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Đúng thời hạn</h5>
                            <p>Cam kết thành đúng thời hạn theo hợp đồng, hoàn tiền nếu chậm quá 24h.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-4.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Giá thành cạnh tranh</h5>
                            <p>Giá thành hợp lý và cạnh tranh nhất: dẫn đầu về giá và chính sách giá.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-5.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Bảo mật tài liệu tuyệt đối</h5>
                            <p>chúng tôi ký kết hợp đồng bảo mật tài liệu để đảm bảo bí mật thông
                                tin một cách tối đa.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ URL::asset('frontend/images/features-icon-6.svg') }}"
                                alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Phục vụ khách hàng</h5>
                            <p>Hệ thống chi nhánh chi nhánh tại thành phố Huế và nhiều tỉnh
                                thành khác.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->


    <!-- Details 1 -->
    <div id="details" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Đội ngũ dịch thuật chuyên nghiệp</h2>
                        <p>Hiểu rằng chất lượng dịch thuật luôn là mối quan tâm hàng đầu của Quý khách hàng, do đó văn phòng
                            dịch thuật Minh Tuệ chọn đội ngũ nhân viên là các chuyên gia ngôn ngữ có
                            kinh nghiệm tốt nghiệp từ các Trường đại học ngoại ngữ danh tiếng, am hiểu một hoặc nhiều lĩnh
                            vực nhất định.</p>
                        <p>Dù dự án dịch thuật lớn hay nhỏ, chúng tôi luôn đảm bảo thời gian hoàn thành bản dịch
                            đáp ứng chất lượng và đúng thời hạn theo yêu cầu.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ URL::asset('frontend/images/details-1.jpg') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->


    <!-- Details 2 -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ URL::asset('frontend/images/details-2.jpg') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Giá hợp lý và cạnh tranh nhất</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-chevron-right"></i>
                                <div class="media-body">Chúng tôi cam kết mức giá chúng tôi đưa ra là hợp lý và cạnh tranh
                                    nhất. Quý khách hàng có thể tham khảo Báo giá hoặc gọi ngay cho chúng tôi theo số
                                    0336757208 để nhận báo giá miễn phí từ các chuyên gia tư vấn.</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-chevron-right"></i>
                                <div class="media-body">Hotline: 0336757208</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-chevron-right"></i>
                                <div class="media-body">Email: dichthuat.nmt@gmail.com</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">Dịch vụ</a>
                        <a class="btn-outline-reg" href="{{ URL::to('/contact') }}">Liên hệ</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of details 2 -->


    <!-- Details Lightbox -->
    <!-- Lightbox -->
    <div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="{{ URL::asset('frontend/images/details-lightbox.jpg') }}"
                        alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>Dịch vụ dịch thuật</h3>
                <hr>
                <p>
                    Bậc thầy về ngôn ngữ, chất lượng vượt niềm tin.
                </p>
                <ul class="list-unstyled li-space-lg">
                    @foreach ($service_index as $item)
                        <li class="media">
                            <i class="fas fa-chevron-right"></i>
                            <a href="{{ URL::to('/service-detail/' . $item->service_slug) }}" target="_blank"
                                rel="noopener noreferrer">

                                <div class="media-body">{{ $item->service_name }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <a class="btn-solid-reg mfp-close page-scroll" href="{{ URL::to('/contact') }}">Liên hệ</a> <button
                    class="btn-outline-reg mfp-close as-button" type="button">Quay lại</button>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
    <!-- end of details lightbox -->


    <!-- Details 3 -->
    <div class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Văn phòng dịch thuật Minh Tuệ</h2>
                        <p>BIÊN DỊCH CÔNG CHỨNG 50+ NGÔN NGỮ</p>
                        <p>BIÊN DỊCH 100+ CHUYÊN NGÀNH</p>
                        <p>CUNG CẤP PHIÊN DỊCH DỰ ÁN</p>
                        <p>HỢP PHÁP HÓA LÃNH SỰ TRỌN GÓI</p>
                        <p>GIẢI PHÁP DỊCH THUẬT TOÀN DIỆN VÀ LINH HOẠT</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ URL::asset('frontend/images/details-3.jpg') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of details 3 -->


    <!-- Statistics -->
    <div class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Counter -->
                    <div id="counter">
                        <div class="cell">
                            <div class="counter-value number-count" data-count="231">1</div>
                            <p class="counter-info">Happy Users</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="385">1</div>
                            <p class="counter-info">Issues Solved</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="159">1</div>
                            <p class="counter-info">Good Reviews</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="127">1</div>
                            <p class="counter-info">Case Studies</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="211">1</div>
                            <p class="counter-info">Orders Received</p>
                        </div>
                    </div>
                    <!-- end of counter -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Testimonials -->
    <div class="slider-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Ý kiến của khách hàng</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-1.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">It's been so fun to work with Pavo, I've managed to
                                                integrate it properly into my business flow and it's great</p>
                                            <p class="testimonial-author">Jude Thorn - Designer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-2.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">We were so focused on launching as many campaigns as
                                                possible that we've forgotten to target our loyal customers</p>
                                            <p class="testimonial-author">Roy Smith - Developer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-3.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">I've been searching for a tool like Pavo for so
                                                long. I love the reports it generates and the amazing high accuracy</p>
                                            <p class="testimonial-author">Marsha Singer - Marketer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-4.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">We've been waiting for a powerful piece of software
                                                that can help businesses manage their marketing projects</p>
                                            <p class="testimonial-author">Tim Shaw - Designer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-5.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Searching for a great prototyping and layout design
                                                app was difficult but thankfully I found app suite quickly</p>
                                            <p class="testimonial-author">Lindsay Spice - Marketer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image"
                                            src="{{ URL::asset('frontend/images/testimonial-6.jpg') }}"
                                            alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">The app support team is amazing. They've helped me
                                                with some issues and I am so grateful to the entire team</p>
                                            <p class="testimonial-author">Ann Blake - Developer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->


    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="decoration-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Dịch vụ nổi bật</h2>
                    <p class="p-heading">Các dịch vụ được khách hàng quan tâm nhiều nhất</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($service_index as $item)
                        <!-- Card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">{{ $item->service_name }}</div>
                                <div>
                                    <img src="{{ URL::asset('/uploads/service/' . $item->service_image) }}"
                                        alt="{{ $item->service_name }}" style="width: 100%; border-radius: 5%">
                                </div>
                                <p>{!! $item->service_desc !!}</p>
                                <div class="button-wrapper">
                                    <a class="btn-solid-reg page-scroll"
                                        href="{{ URL::to('/service-detail/' . $item->service_slug) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div> <!-- end of card -->
                        <!-- end of card -->
                    @endforeach
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->


    <!-- Conclusion -->
    <div id="download" class="basic-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ URL::asset('frontend/images/conclusion-smartphone.png') }}"
                            alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <p>Liên hệ với chúng tôi
                            <br>
                            SĐT: 0336757208
                            <br>
                            Email: dichthuat.nmt@gmail.com
                        </p>
                        <a class="btn-solid-lg popup-with-move-anim" href="#details-lightbox">Dịch vụ</a>
                        <a class="btn-solid-lg secondary" href="{{ URL::to('/contact') }}"></i>Liên hệ</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-5 -->
    <!-- end of conclusion -->
@endsection
