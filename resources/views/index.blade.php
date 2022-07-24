@extends('landing_layout.l_app')

@section('landing_hero')
<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-400px px-9">
    <!--begin::Heading-->
    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
        <!--begin::Title-->
        <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">{{ $setting->title ?? 'Company Title' }}
            <br />
            <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                <span id="kt_landing_hero_text">{{ $setting->motto ?? 'Company Motto' }}</span>
            </span></h1>
        <!--end::Title-->
        <!--begin::Action-->
        <a href="/metronic8/demo1/../demo1/index.html" class="btn btn-primary">ক্লিক</a>
        <!--end::Action-->
    </div>
    <!--end::Heading-->
    <!--begin::Clients-->
    {{-- <div class="d-flex flex-center flex-wrap position-relative"> --}}
        
    {{-- </div> --}}
    <!--end::Clients-->
    

</div>
<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="tns tns-default">
            <!--begin::Slider-->
            <div
                data-tns="true"
                data-tns-loop="true"
                data-tns-swipe-angle="false"
                data-tns-speed="2000"
                data-tns-autoplay="true"
                data-tns-autoplay-timeout="5000"
                data-tns-controls="true"
                data-tns-nav="false"
                data-tns-items="4"
                data-tns-center="false"
                data-tns-dots="false"
                data-tns-prev-button="#kt_team_slider_prev2"
                data-tns-next-button="#kt_team_slider_next2"
            >

                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                   <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                
            </div>
            <!--end::Slider-->

            <!--begin::Slider button-->
            <button class="btn btn-icon btn-color-light" id="kt_team_slider_prev2">
                <span class="svg-icon svg-icon-3x">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                    </svg>
                </span>
            </button>
            <!--end::Slider button-->

            <!--begin::Slider button-->
            <button class="btn btn-icon btn-color-light" id="kt_team_slider_next2">
                <span class="svg-icon svg-icon-3x">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                    </svg>
                </span>
            </button>
            <!--end::Slider button-->
        </div>
    </div>
</div>
@endsection

@section('curve')
<!--begin::Curve bottom-->
<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
            fill="currentColor"></path>
    </svg>
</div>
<!--end::Curve bottom-->
@endsection

@section('main-content')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">নিজের শেখা নিজেই গুছিয়ে <br> নেয়ার যাত্রা শুরু হোক</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-4 text-dark fw-bold">যেকোনো বিষয়ের যেকোনো টপিকে পড়ালেখা করতে চলে যাও তোমার পছন্দের সেকশনে</div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3"></span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">চাকুরী প্রস্তুতি</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">বিশ্ববিদ্যালয় ভর্তি যুদ্ধের প্রস্তুতি</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">মেডিকেল/ডেন্টাল প্রস্তুতি</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3"></span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">অনলাইন এক্সাম</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">স্কিল ডেভেলপমেন্ট</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                       <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9"
                            alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            {{-- <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span> --}}
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">বাংলা কোরআন ও হাদিস</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                       <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">শেখো নিজের ইচ্ছেমতো, পেয়ে 
                            যাও ১ <br> লক্ষেরও বেশি প্রশ্নের সমাহার</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                    data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                    data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ asset('assets') }}/media/product-demos/demo1.png"
                            class="card-rounded shadow mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ asset('assets') }}/media/product-demos/demo2.png"
                            class="card-rounded shadow mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ asset('assets') }}/media/product-demos/demo4.png"
                            class="card-rounded shadow mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ asset('assets') }}/media/product-demos/demo5.png"
                            class="card-rounded shadow mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm-n10">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="pb-15 pt-18 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <!--begin::Title-->
                    <h2 class="fs-2hx text-white fw-bolder mb-5" style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">স্যাটের অর্জন সমূহ</h2>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-4 text-white fw-bold" >ওয়েব সার্ভিস হলো ওয়েব সম্পর্কিত সেবাসমূহ অর্থাৎ নেটওয়ার্ক সংযুক্ত বিভিন্ন কম্পিউটারে চালু <br> থাকা বিভিন্ন সফটওয়ারের মধ্যে আন্তক্রিয়ার একটি ব্যবস্থা। </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700"
                                        data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-white fw-bolder fs-5 lh-0">সর্বমোট প্রশ্ন</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80"
                                        data-kt-countup-suffix="K+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-white fw-bolder fs-5 lh-0">সর্বমোট শিক্ষার্থী</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35"
                                        data-kt-countup-suffix="M+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-white fw-bolder fs-5 lh-0">সাবস্ক্রাইবার</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
                <!--begin::Testimonial-->
                <div class="fs-2 fw-bold text-white text-center mb-3">
                    <span class="fs-1 lh-1 text-white">“</span>আমাদের হাল ছেড়ে দেয়া উচিত নয় এবং সমস্যা গুলোকে আমাদের 
                    
                    <br />
                    <span class="text-danger me-1">পরাজিত করার </span>,সুযোগ দেয়া উচিত নয়
                    <span class="fs-1 lh-1 text-white">“</span></div>
                <!--end::Testimonial-->
                <!--begin::Author-->
                <div class="fs-2 fw-bold text-muted text-center">
                    <a href="https://facebook.com/azizbbl255" class="link-primary fs-4 fw-bolder">আজিজুর রহমান আজিজ </a>
                    <span class="fs-4 fw-bolder text-white"> &nbsp;স্যাটের প্রতিষ্ঠাতা</span>
                </div>
                <!--end::Author-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Statistics Section-->
    <!--begin::Team Section-->
    <div class="py-10 py-lg-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-12">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">আমাদের বেস্ট ফিচার সমূহ</h3>
                <!--end::Title-->
                <!--begin::Sub-title-->
                <div class="fs-5 text-muted fw-bold">ওয়েব সার্ভিস হলো ওয়েব সম্পর্কিত সেবাসমূহ অর্থাৎ নেটওয়ার্ক সংযুক্ত বিভিন্ন কম্পিউটারে চালু

                    <br />থাকা বিভিন্ন সফটওয়ারের মধ্যে আন্তক্রিয়ার একটি ব্যবস্থা।</div>
                <!--end::Sub-title=-->
            </div>
            <!--end::Heading-->
            <!--begin::Slider-->
            <div class="tns tns-default">
                <!--begin::Wrapper-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                    data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                    data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                    data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo8.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">অনলাইন এক্সাম</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">Development Lead</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo17.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">চাকরি প্রস্তুতি</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">Creative Director</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo6.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">ভর্তি পরীক্ষা প্রস্তুতি</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="text-muted fs-6 fw-bold mt-1">Python Expert</div>
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo4.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">স্কিল ডেভেলপমেন্ট</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">Project Manager</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo3.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">প্রোগ্রামিং</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">Art Director</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo2.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">পিডিএফ জেনারেটর</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">Marketing Manager</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center">
                        <!--begin::Photo-->
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image:url('{{ asset('assets') }}/media/demos/demo1.png')"></div>
                        <!--end::Photo-->
                        <!--begin::Person-->
                        <div class="mb-0">
                            <!--begin::Name-->
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">এক্সাম জেনারেটর</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            {{-- <div class="text-muted fs-6 fw-bold mt-1">QA Managers</div> --}}
                            <!--begin::Position-->
                        </div>
                        <!--end::Person-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
                <!--begin::Button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
            </div>
            <!--end::Slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Team Section-->
    <!--begin::Projects Section-->
    <div class="mb-lg-n15 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <!--begin::Card body-->
                <div class="card-body p-lg-20">
                    <!--begin::Heading-->
                    <div class="text-center mb-5 mb-lg-10">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="explore"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Explore</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Tabs wrapper-->
                    <div class="d-flex flex-center mb-5 mb-lg-15">
                        <!--begin::Tabs-->
                        <div class="mb-5 hover-scroll-x">
                            <div class="d-grid">
                                <ul class="nav nav-tabs flex-center flex-nowrap text-nowrap mb-2 fw-bolder fs-5">
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Latest</a>
                                    </li>
                                    @foreach($main_categories as $main_category)
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_{{$main_category->id}}">{{$main_category->name}}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        
                        <!--end::Tabs-->
                    </div>
                    <!--end::Tabs wrapper-->
                    <!--begin::Tabs content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane show active" id="kt_landing_projects_latest">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                @foreach($categories as $category)
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">{{ $category->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                @endforeach
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        @foreach($main_categories as $key => $main_category)
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_{{ $main_category->id  }}">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                @foreach($main_category->categories as $category)
                                <!--begin::Col-->
                                <div class="col-md-3 card bg-light card-rounded pt-5 m-3 pb-0">
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">{{ $category->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                @endforeach
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        @endforeach
                      
                    </div>
                    <!--end::Tabs content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Projects Section-->
    <!--begin::Pricing Section-->
    <div class="mt-sm-n20">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bolder text-white mb-5" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Clear Pricing Makes it Easy</h1>
                        <div class="text-gray-600 fw-bold fs-5">Save thousands to millions of bucks by using single tool
                            for different
                            <br />amazing and outstanding cool and great useful admin</div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="text-center" id="kt_pricing">
                        <!--begin::Nav group-->
                        <div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true"
                            style="border: 1px dashed #2B4666;">
                            <a href="#"
                                class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active"
                                data-kt-plan="month">Monthly</a>
                            <a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3"
                                data-kt-plan="annual">Annual</a>
                        </div>
                        <!--end::Nav group-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-boldest">Startup</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold mb-5">Best Settings for Startups</div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="mb-2 text-primary">$</span>
                                                <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="99"
                                                    data-kt-plan-price-annual="999">99</span>
                                                <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon"
                                                    data-kt-plan-price-annual="Ann">/ Mon</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10 Active
                                                    Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30
                                                    Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">Keen Analytics Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">Targets Timelines &amp;
                                                    Files</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-gray-800">Unlimited Projects</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-white mb-5 fw-boldest">Business</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-white opacity-75 fw-bold mb-5">Best Settings for Business
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="mb-2 text-white">$</span>
                                                <span class="fs-3x fw-bolder text-white" data-kt-plan-price-month="199"
                                                    data-kt-plan-price-annual="1999">199</span>
                                                <span class="fs-7 fw-bold text-white opacity-75"
                                                    data-kt-plan-price-month="Mon" data-kt-plan-price-annual="Ann">/
                                                    Mon</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up to
                                                    10 Active Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up to
                                                    30 Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Keen
                                                    Analytics Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Targets
                                                    Timelines &amp; Files</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-white opacity-75">Unlimited
                                                    Projects</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#"
                                            class="btn btn-color-primary btn-active-light-primary btn-light">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-boldest">Enterprise</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold mb-5">Best Settings for Enterprise</div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="mb-2 text-primary">$</span>
                                                <span class="fs-3x fw-bolder text-primary"
                                                    data-kt-plan-price-month="999"
                                                    data-kt-plan-price-annual="9999">999</span>
                                                <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon"
                                                    data-kt-plan-price-annual="Ann">/ Mon</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10 Active
                                                    Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30
                                                    Project Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Keen Analytics
                                                    Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Targets
                                                    Timelines &amp; Files</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Unlimited
                                                    Projects</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                        <!--begin::Select-->
                                        <a href="#" class="btn btn-primary">Select</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Pricing-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Pricing Section-->
    <!--begin::Skill Development section-->
    <div class="mt-20 mb-lg-n20 z-index-2 bg-light py-10 ">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">স্কিল ডেভেলপমেন্ট কোর্স সমূহ</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-4 text-dark fw-bold">আজ কোন স্কিলটি শিখতে চান?</div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="tns tns-default">
                        <!--begin::Slider-->
                        <div
                            data-tns="true"
                            data-tns-loop="true"
                            data-tns-swipe-angle="false"
                            data-tns-speed="2000"
                            data-tns-autoplay="true"
                            data-tns-autoplay-timeout="5000"
                            data-tns-controls="true"
                            data-tns-nav="false"
                            data-tns-items="4"
                            data-tns-center="false"
                            data-tns-dots="false"
                            data-tns-prev-button="#kt_team_slider_prev4"
                            data-tns-next-button="#kt_team_slider_next4"
                        >
                            @for($i=1; $i<6; $i++)
                            <!--begin::Item-->
                           <div class="col-md-3 ">
                                <!--begin::Engage widget 1-->
                                <div class="card h-md-100 m-3">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column flex-center">
                                        <!--begin::Heading-->
                                        <div class="mb-2">
                                            <!--begin::Illustration-->
                                            <div class="text-center">
                                                <img src="{{ asset('assets') }}/media/illustrations/sketchy-1/2.png" class="theme-light-show w-200px" alt="">
                                                
                                            </div>
                                            <!--end::Illustration-->
                                            <!--begin::Title-->
                                            <h1 class="fw-semibold text-gray-800 text-center lh-lg pt-7">HTML</h1>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Links-->
                                        <div class="text-center mb-1">
                                            <!--begin::Link-->
                                            <a class="btn btn-sm btn-light btn-active-success" href="/metronic8/demo1/../demo1/apps/user-management/users/view.html">Learn More</a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Links-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Engage widget 1-->
                            </div>
                            <!--end::Item-->
                            @endfor
                        </div>
                        <!--end::Slider-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-color-success" id="kt_team_slider_prev4">
                            <span class="svg-icon svg-icon-3x">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                        <!--end::Slider button-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-color-success" id="kt_team_slider_next4">
                            <span class="svg-icon svg-icon-3x">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                        <!--end::Slider button-->
                    </div>
                
                <!--end::Col-->
               
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Skill Development section-->
    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-n20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container mt-20">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our
                    Clients Say</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br />for different amazing and great useful admin</div>
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row g-lg-10 mb-10 mb-lg-20">
                <!--begin::Col-->
                <div class="col-lg-12 mx-auto">
                    <!--begin::Testimonial-->
                    <div class="tns tns-default">
                        <!--begin::Slider-->
                        <div
                            data-tns="true"
                            data-tns-loop="true"
                            data-tns-swipe-angle="false"
                            data-tns-speed="2000"
                            data-tns-autoplay="true"
                            data-tns-autoplay-timeout="5000"
                            data-tns-controls="true"
                            data-tns-nav="false"
                            data-tns-items="2"
                            data-tns-center="false"
                            data-tns-dots="false"
                            data-tns-prev-button="#kt_team_slider_prev3"
                            data-tns-next-button="#kt_team_slider_next3"
                        >
                            @for($i=1; $i<6; $i++)
                            <!--begin::Item-->
                            <div class="card bg-light px-7 py-7 m-5">
                                <!--begin::Testimonial-->
                                <div class="d-flex flex-column justify-content-center align-content-center h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0 ">
                                    <!--begin::Wrapper-->
                                    <div class="mb-7">
                                        <!--begin::Title-->
                                        <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                            <br />and the most well structured</div>
                                        <!--end::Title-->
                                        <!--begin::Feedback-->
                                        <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have ever
                                            used. The codes are up to tandard. The css styles are very clean. In fact the cleanest
                                            and the most up to standard I have ever seen.</div>
                                        <!--end::Feedback-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Author-->
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-circle symbol-50px me-5">
                                            <img src="{{ asset('assets') }}/media/avatars/300-2.jpg" class="" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Janya Clebert</a>
                                            <span class="text-muted d-block fw-bold">Development Lead</span>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Author-->
                                </div>
                                <!--end::Testimonial-->
                            </div>
                            <!--end::Item-->
                            @endfor
                        
                        </div>
                        <!--end::Slider-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-color-success" id="kt_team_slider_prev3">
                            <span class="svg-icon svg-icon-3x">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                        <!--end::Slider button-->

                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-color-success" id="kt_team_slider_next3">
                            <span class="svg-icon svg-icon-3x">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                        <!--end::Slider button-->
                    </div>
                   
                </div>
                <!--end::Col-->
                
            </div>
            <!--end::Row-->
            <!--begin::Highlight-->
            <div class="card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13 text-center"
                style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">

                <span class="fs-1 fs-lg-2qx fw-bold text-white mb-4 ">Subscribe for newsletter</span>

                <div class="d-flex flex-row justify-content-center ">
                    <!--begin::Content-->
                    <div class="my-2 me-5">
                        <input type="text" id="subscriber_email" class="form-control form-control-solid w-md-300px " name="email" placeholder="example@gmail.com">
                        <div class="text-white help-block with-errors email-error"></div>
                    </div>
                    <!--end::Content-->
                    <!--begin::Link-->
                    <div>
                        <button type="submit" id="kk_newsletter_subscriber"  class="btn  btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Subscribe</button>
                    </div>
                    <!--end::Link-->
                </div>
            </div>
            <!--end::Highlight-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->
@endsection

@push('script')
<script type="text/javascript">
    //Newsletter Subscriber
    $(document).on('click', '#kk_newsletter_subscriber', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')

        var thisaddbtn = $(this);

        var email = $('input[name=email]').val();
        // console.log(email);

        $.ajax({
            type:"POST",
            url: "{{ url('newsletter-subscriber/store')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                email : email,
            },
        dataType: "json",
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                }else{
                    toastr.success(data.message);
                    $("#subscriber_email").val('');
                }

            }
        });
    })

</script>
@endpush