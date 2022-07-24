@extends('landing_layout.l_app')

@section('main-content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 mt-10 ">
        <!--begin::Container-->
        <div class="container rounded" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
            <!--begin::Heading-->
            <div class="text-center pt-9">
                <!--begin::Title-->
                <h3 class="fs-2hx" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}" style="color: #47BE7D">Contact us</h3>
                <!--end::Title-->
                <span><hr></span>
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <div class="card" >
                    <!--begin::Body-->
                    <div class="card-body p-lg-17">
                        <!--begin::Row-->
                        <div class="row mb-3">
                            <!--begin::Col-->
                            <div class="col-md-6 pe-lg-10">
                                <!--begin::Form-->
                                <form action="" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_contact_form">
                                   @csrf
                                    <h1 class="fw-bold text-dark mb-9">Send Us Email</h1>
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Mr. David" name="name">
                                            <!--end::Input-->
                                            <div class="help-block text-danger with-errors name-error"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--end::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--end::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="example@gmail.com" name="email">
                                            <!--end::Input-->
                                            <div class="help-block text-danger with-errors email-error"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-semibold mb-2">Subject</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="Enter subject" name="subject">
                                        <!--end::Input-->
                                        <div class="help-block text-danger with-errors subject-error"></div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold mb-2">Message</label>
                                        <textarea class="form-control form-control-solid" rows="6" name="message" placeholder="Enter your message"></textarea>
                                        <div class="help-block text-danger with-errors subject-error"></div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Submit-->
                                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Send</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                    <!--end::Submit-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 ps-lg-10 ">
                                <!--begin::Map-->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.5494371383306!2d88.62315501446767!3d24.36218287104751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754fc8cffffffff%3A0x398330dea7d93595!2sSATT%20IT-%20Web%20Development%20Company%20in%20Bangladesh!5e0!3m2!1sen!2sbd!4v1658573591883!5m2!1sen!2sbd" width="550" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!--end::Map-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-5 mb-5 mb-lg-15">
                            <!--begin::Col-->
                            <div class="col-sm-6 pe-lg-10">
                                <!--begin::Phone-->
                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                    <!--begin::Icon-->
                                    <i class="fas fa-phone-alt fs-1" style="color:#009EF7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Subtitle-->
                                    <h1 class="text-dark fw-bold my-5">Call us</h1>
                                    <!--end::Subtitle-->
                                    <!--begin::Number-->
                                    <div class="text-gray-700 fw-semibold fs-2">1 (833) 597-7538</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Phone-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-sm-6 ps-lg-10">
                                <!--begin::Address-->
                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                            <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Subtitle-->
                                    <h1 class="text-dark fw-bold my-5">Our Head Office</h1>
                                    <!--end::Subtitle-->
                                    <!--begin::Description-->
                                    <div class="text-gray-700 fs-3 fw-semibold">৫৭১, মুক্তিযোদ্ধা রোড, টিকাপাড়া, বোয়ালিয়া, রাজশাহী</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Address-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        
                    </div>
                    <!--end::Body-->
                </div>
               
            </div>
            <!--end::Row-->
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
@endsection  
                
