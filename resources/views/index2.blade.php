@extends('landing_layout.l_app')

@section('landing_hero')
<div class="d-flex flex-column flex-center w-100  px-9">
    <!--begin::Heading-->
    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-10">
        <!--begin::Title-->
        <h1 class="text-white pt-10 fw-bolder fs-2x fs-lg-3x">{{ $setting->title ?? 'Hero Text' }}
            <br />
            <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                <span id="kt_landing_hero_text " class="fs-1">{{ $setting->motto ?? 'Company Motto' }}</span>
            </span></h1>
        <!--end::Title-->
        
    </div>
    <!--end::Heading-->
    
</div>
<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="tns tns-default">
            <!--begin::Slider-->
            <div
                data-tns="true"
                data-tns-loop="true"
                data-tns-swipe-angle="false"
                data-tns-speed="2000"
                data-tns-autoplay="true"
                data-tns-autoplay-timeout="3000"
                data-tns-controls="true"
                data-tns-nav="false"
                data-tns-nav-position="bottom"
                data-tns-items="3"
                data-tns-center="false"
                data-tns-dots="false"
                data-tns-prev-button="#kt_team_slider_prev2"
                data-tns-next-button="#kt_team_slider_next2"
            >

                
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-2.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-3.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                   <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-4.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center px-5 py-5">
                    <a href="#explore"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                        <img src="assets/media/stock/600x400/img-5.jpg" class="card-rounded mw-100" alt=""/>
                    </a>
                </div>
                <!--end::Item-->
                
            </div>
            <!--end::Slider-->

            <!--begin::Slider button-->
            <button class="btn btn-icon btn-color-light d-none d-md-block" id="kt_team_slider_prev2">
                <span class="svg-icon svg-icon-3x">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                    </svg>
                </span>
            </button>
            <!--end::Slider button-->

            <!--begin::Slider button-->
            <button class="btn btn-icon btn-color-light d-none d-md-block" id="kt_team_slider_next2">
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
<div class="pb-md-15 pt-md-15 pt-10 pb-10 landing-dark-bg">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Statistics-->
        <div class="d-flex flex-center">
            <!--begin::Items-->
            <div class="d-flex flex-wrap flex-center justify-content-md-between justify-content-center mx-auto w-xl-900px">
                <!--begin::Item-->
                <div class="d-flex flex-center"
                    {{-- style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')" --}}
                    >
                    <!--begin::Symbol-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-white me-3">
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
                        <span class="text-white fw-bolder fs-md-4 fs-9  lh-0">প্রশ্ন</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="d-flex  flex-center"
                    {{-- style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')" --}}
                    >
                    <!--begin::Symbol-->
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-white me-3">
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
                        <span class="text-white fw-bolder fs-md-4 fs-9 lh-0">শিক্ষার্থী</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="d-flex flex-center"
                    {{-- style="background-image: url('{{ asset('assets') }}/media/svg/misc/octagon.svg')" --}}
                    >
                    <!--begin::Symbol-->
                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-white me-3">
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
                        <span class="text-white fw-bolder fs-md-4 fs-9 lh-0">সাবস্ক্রাইবার</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Item-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Statistics-->
    </div>
    <!--end::Container-->
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
    <!--begin::best feature-->
    <div class="mb-n10 mb-lg-n20 z-index-2" id="section2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-success mb-5" id="how-it-works">জনপ্রিয় ফিচার সমূহ</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-4 text-dark fw-bold">যেকোনো বিষয়ের যেকোনো টপিকে পড়ালেখা করতে চলে যাও তোমার পছন্দের সেকশনে</div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-10 mb-md-20">
                @for($i=0; $i<12; $i++)
                <!--begin::Col-->
                <div class="col-md-4" >
                    <!--begin::card-->
                    <div class="card card-rounded p-3 bg-light" >
                        <a href="" class="">
                            <div class="d-flex align-items-center rounded">
                                <div class="symbol symbol-70px me-5">
                                    <img src="assets/media/stock/600x400/img-18.jpg" class="" alt="">
                                </div>
                                <div class="d-flex flex-column py-3">
                                    <a href="" class="fw-bolder  text-hover-primary text-success mb-1 fs-4">চাকুরী প্রস্তুতি</a>
                                    <span class="fs-7 text-muted fw-bold">চাকুরি পরীক্ষার প্রশ্নপত্র ও সমাধান</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end::card-->
                </div>
                
                <!--end::col-->
                @endfor
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::best feature-->
    
    <!--begin::Top category-->
    <div class="mt-20 z-index-2" id="section2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h3 class="fs-2hx text-success" id="how-it-works">টপ ক্যাটাগরি</h3>
                <!--end::Title-->
                <!--begin::Text-->
                {{-- <div class="fs-4 text-dark fw-bold">যেকোনো বিষয়ের যেকোনো টপিকে পড়ালেখা করতে চলে যাও তোমার পছন্দের সেকশনে</div> --}}
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-10 mb-md-20 mx-auto">
                <!--begin::Tabs wrapper-->
                <div class="d-flex flex-center mb-5 ">
                    <!--begin::Tabs-->
                    <div class="mb-5 hover-scroll-x">
                        <div class="d-flex">
                            @for($i=0; $i<5; $i++)
                            <div class="col-8 col-md-3 px-3">
                                <!--begin::Card widget 14-->
                                <a href="#" class="text-dark">
                                    <div class="card card-xxl-stretch mb-5 mb-xl-8 theme-dark-bg-body" style="background-color: #CBF0F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <span class="fs-3 fw-bolder py-8">Job Solution</span>  
                                        </div>
                                    </div>
                                </a>
                                <!--end::Card widget 14-->
                            </div>
                            @endfor
                        </div>
                    </div>
                    <!--end::Tabs-->
                </div>
                <!--end::Tabs wrapper-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Top category-->
    
    <!--begin::Prepared Section-->
    <div class="mb-md-10  position-relative z-index-2">
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
                            data-kt-scroll-offset="{default: 100, lg: 150}">Prepared Section</h3>
                         <div class="fs-4 text-dark fw-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque, maxime.</div>
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
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_job">চাকরি প্রস্তুতি</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_admission">ভর্তি পরীক্ষা</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_programming">স্কিল ডেভেলপমেন্ট</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_academy">একাডেমী</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">ইসলামিক কর্নার</a>
                                    </li>
                                    {{-- @foreach($main_categories as $main_category)
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                            data-bs-toggle="tab" data-bs-target="#kt_landing_projects_{{$main_category->id}}">{{$main_category->name}}</a>
                                    </li>
                                    @endforeach --}}
                                    
                                </ul>
                            </div>
                        </div>
                        
                        <!--end::Tabs-->
                    </div>
                    <!--end::Tabs wrapper-->
                    <!--begin::Tabs content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane show active" id="kt_landing_projects_job">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                {{-- @foreach($categories as $category) --}}
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">বিসিএস</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                {{-- @endforeach --}}
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">ব্যাংক জব</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">পিএসসি</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_admission">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">পাবলিক বিশ্ববিদ্যালয়</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">প্রকৌশল ও প্রযুক্তি বিশ্ববিদ্যালয়</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">মেডিকেল/ডেন্টাল কলেজ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">কৃষি বিশ্ববিদ্যালয়</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">জাতীয় বিশ্ববিদ্যালয়</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                               
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_programming">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                {{-- @foreach($categories as $category) --}}
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">HTML</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                {{-- @endforeach --}}
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">CSS</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">JavaScript</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">Bootstrap</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">PHP</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">MySQL</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_academy">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">প্রথম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">প্রথম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">প্রথম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">দ্বিতীয় শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">তৃতীয় শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">চতুর্থ শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">পঞ্চম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">ষষ্ঠ শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">সপ্তম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">অষ্টম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">নভম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">দশম শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">একাদশ শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">দ্বাদশ শ্রেণী</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                               
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_landing_projects_islamic">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-center">
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">আল কোরআন</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 pt-5 m-3 pb-0" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center px-3 rounded  mb-7">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-10.jpg" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="fw-bolder text-hover-primary mb-1 fs-4">বাংলা হাদিস</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                
                            </div>
                            <!--end::Row-->
                        </div>
                       
                    </div>
                    <!--end::Tabs content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Prepared Section-->

    <!--begin::Book section-->
    <div class="mb-n10 mb-lg-n20 z-index-2" id="section2">
        <!--begin::Container-->
        <div class="container">
            
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-10 mb-md-20">
               <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Heading-->
                        <div class="text-center py-13">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-dark mb-5" id="how-it-works">Best Book list</h3>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fs-4 text-dark fw-bold">যেকোনো বিষয়ের যেকোনো টপিকে পড়ালেখা করতে চলে যাও তোমার পছন্দের সেকশনে</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Heading-->
                       
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <!--begin::Tabs wrapper-->
                            <div class="d-flex flex-center mb-5 ">
                                <!--begin::Tabs-->
                                <div class="mb-5 hover-scroll-x">
                                    <div class="d-flex">
                                        {{-- <ul class="nav nav-tabs flex-center flex-nowrap text-nowrap mb-2 fw-bolder fs-5"> --}}
                                            
                                            @for($i=0; $i<10; $i++)
                                            <div class="col-11 col-md-3 px-3">
                                                <!--begin::Card widget 14-->
                                                <div class="card card-flush bg-light h-xl-100">
                                                    <!--begin::Body-->
                                                    <div class="card-body text-center pb-5">
                                                        <!--begin::Overlay-->
                                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/metronic8/demo1/assets/media/stock/600x600/img-39.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url({{ asset('assets')}}/media/stock/600x600/img-27.jpg)"></div>
                                                            <!--end::Image-->
                                                            <!--begin::Action-->
                                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                        <!--end::Overlay-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-end flex-stack mb-1">
                                                            <!--begin::Title-->
                                                            <div class="text-start">
                                                                <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">Wavy Curved Art</span>
                                                                {{-- <span class="text-gray-400 mt-1 fw-bold fs-6">Last Bid: 1.07 ETH</span> --}}
                                                            </div>
                                                            <!--end::Title-->
                                                            <!--begin::Total-->
                                                            <span class="text-gray-600 text-end fw-bold fs-6">$2,630</span>
                                                            <!--end::Total-->
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Body-->
                                                    <!--begin::Footer-->
                                                    <div class="card-footer d-flex pt-0">
                                                        <!--begin::Link-->
                                                        {{-- <a class="btn btn-sm btn-primary flex-shrink-0 me-2" data-bs-target="#kt_modal_bidding" data-bs-toggle="modal">Place a Bid</a> --}}
                                                        <!--end::Link-->
                                                        <!--begin::Link-->
                                                        <a class="btn btn-sm btn-success flex-shrink-0" href="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html">View Item</a>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Footer-->
                                                </div>
                                                <!--end::Card widget 14-->
										    </div>
                                            @endfor
                                        {{-- </ul> --}}
                                    </div>
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Tabs wrapper-->
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                        <div class="card-footer d-flex justify-content-center">
                             <a href="#"><span class="fs-6 fw-bolder">Sell all</span></a>
                        </div>
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Book section-->
   
    
    <!--begin::Testimonials Section-->
    <div class="mt-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-6">
                <div class="rating d-flex justify-content-center align-items-center">
                    <div class="rating-label me-2 checked">
                        <i class="bi bi-star-fill fs-5"></i>
                    </div>
                    <div class="rating-label me-2 checked">
                        <i class="bi bi-star-fill fs-5"></i>
                    </div>
                    <div class="rating-label me-2 checked">
                        <i class="bi bi-star-fill fs-5"></i>
                    </div>
                    <div class="rating-label me-2 checked">
                        <i class="bi bi-star-fill fs-5"></i>
                    </div>
                    <div class="rating-label me-2 checked">
                        <i class="bi bi-star-fill fs-5"></i>
                    </div>
                </div>
                <span class="text-muted fw-bold"> 4.7 Star Rating</span>
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">1.9 Million learner</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <span class="d-flex m-2 justify-content-center align-items-center">
                   <!--begin::Avatar-->
                    <div class="symbol symbol-circle symbol-50px me-5">
                        <img src="{{ asset('assets') }}/media/avatars/300-3.jpg" class="" alt="" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Avatar-->
                    <div class="symbol symbol-circle symbol-50px me-5">
                        <img src="{{ asset('assets') }}/media/avatars/300-2.jpg" class="" alt="" />
                    </div>
                    <!--end::Avatar-->
                    
                    <!--begin::Avatar-->
                    <div class="symbol symbol-circle symbol-50px me-5">
                        <img src="{{ asset('assets') }}/media/avatars/300-5.jpg" class="" alt="" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Avatar-->
                    <div class="symbol symbol-circle symbol-50px me-5">
                        <img src="{{ asset('assets') }}/media/avatars/300-6.jpg" class="" alt="" />
                    </div>
                    <!--end::Avatar-->
                </span>
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row g-lg-10 mb-10 mb-lg-20">
                <!--begin::Col-->
                <div class="col-md-12 ">
                    <!--begin::Testimonial-->
                    <div class="tns">
                        <div data-tns="true" data-tns-nav-position="bottom" data-tns-items="1"
                                    data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}" data-tns-controls="false">
                            @for($i=1; $i<6; $i++)
                            <!--begin::Item-->
                            <div class="text-start px-5 pt-5 ">
                                <!--begin::Item-->
                                <div class="card bg-light px-2 px-md-7 py-md-15 py-7 m-5">
                                    <!--begin::Testimonial-->
                                    <div class="d-flex flex-column align-content-center h-lg-100 px-lg-0 pe-lg-10 mb-md-15 mb-lg-0 ">
                                        <!--begin::Wrapper-->
                                        <div class="mb-7">
                                            <!--begin::Title-->
                                            <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template</div>
                                            <!--end::Title-->
                                            <!--begin::Feedback-->
                                            <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have ever
                                                used. The codes are up to tandard. The css styles are very clean. In fact the cleanest
                                                and the most up to standard I have ever seen.</div>
                                            <!--end::Feedback-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Author-->
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-circle symbol-50px me-5">
                                                <img src="{{ asset('assets') }}/media/avatars/300-2.jpg" class="" alt="" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <div class="">
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
                            </div>
                            <!--end::Item-->
                            @endfor
                            ...
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->

    <!--begin::founder speech-->
    <div class="mb-md-10  position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row g-lg-10 mb-10">
                <!--begin::Col-->
                <div class="col-lg-10 mx-auto">
                    <!--begin::Testimonial-->
                    <div class="">
                        <!--begin::Item-->
                        <div class="text-start px-5 pt-5 px-lg-10">
                            <!--begin::Item-->
                            <div class="card px-4 px-md-8 py-7 m-5" style="background: #CBF0F4">
                                <!--begin::Testimonial-->
                                <div class="d-flex flex-md-row flex-column justify-content-center align-items-center h-lg-100 px-10 px-lg-0 mb-md-15 mb-lg-0 ">
                                    <!--begin::Wrapper-->
                                    <div class="mb-7 w-md-600px">
                                        <!--begin::Title-->
                                        <h3 class="fs-2hx text-dark" id="explore" >Founder Speech</h3>
                                        <div class="fs-4 fw-bolder text-dark mb-3">This is by far the cleanest template</div>
                                        <!--end::Title-->
                                        <!--begin::Feedback-->
                                        <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have ever
                                            used. The codes are up to tandard. The css styles are very clean. In fact the cleanest
                                            and the most up to standard I have ever seen.</div>
                                        <!--end::Feedback-->
                                        <!--begin::Name-->
                                        <div class="mt-5">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Janya Clebert</a>
                                            <span class="text-muted d-block fw-bold">Development Lead</span>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Wrapper-->
                                    
                                    <!--begin::Avatar-->
                                    <div class="octagon mx-auto mb-5 d-flex w-150px w-md-200px h-md-200px h-150px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url({{ asset('assets')}}/media/avatars/300-7.jpg)"></div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::Testimonial-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Item--> 
                    </div>
                </div>
                <!--end::Col-->  
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::founder speech-->

    

    <!--begin::newsletter-->
    <div class="mb-n20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container rounded" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
            
            <!--begin::Highlight-->
            <div class="card-rounded  p-8 p-lg-12 mb-n5 mb-lg-n13 text-center"
                >

                <span class="fs-1 fs-lg-2qx fw-bold text-white mb-4 ">Subscribe for newsletter</span>

                <div class="d-flex flex-md-row justify-content-center">
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
    <!--end::newsletter-->

    
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