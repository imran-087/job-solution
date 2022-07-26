@extends('layouts.app')

@section('title', 'Home')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Home</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Site Summary</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Question ask and overview-->
        <div class="ask-question">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-8 mb-5 ">
                    <div class="card border-transparent h-md-100 " data-theme="light" style="background-color: #1C325E;">
                        <!--begin::Body-->
                        <div class="card-body d-flex ps-xl-15 ">
                            <!--begin::Wrapper-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                    <span class="me-2">Ask any question ??</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Action-->
                                <div class="mb-3">
                                    <a href="#" class="btn btn-success btn-sm fw-semibold me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_question_ask_modal">Ask Here</a>
                                
                                </div>
                                <!--begin::Action-->
                            </div>
                            <!--begin::Wrapper-->
                            <!--begin::Illustration-->
                            <img src="{{asset('assets')}}/media/illustrations/sigma-1/17-dark.png" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
                            <!--end::Illustration-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <!--begin::Slider Widget 2-->
                    <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-md-100 " data-bs-ride="carousel" data-bs-interval="5500">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h4 class="card-title d-flex align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Collection</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-7">More than 1m+ question collection</span>
                            </h4>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Carousel Indicators-->
                                <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" class="ms-1 active" aria-current="true"></li>
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" class="ms-1"></li>
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class="ms-1"></li>
                                </ol>
                                <!--end::Carousel Indicators-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Carousel-->
                            <div class="carousel-inner">
                                <!--begin::Item-->
                                <div class="carousel-item show active">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center ">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-70px symbol-circle me-5">
                                            <span class="symbol-label bg-light-success">
                                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
                                                <span class="svg-icon svg-icon-3x svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z" fill="currentColor"></path>
                                                        <path opacity="0.3" d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Subtitle-->
                                            <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                            <!--end::Subtitle-->
                                            <!--begin::Items-->
                                            <div class="d-flex d-grid gap-5">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0 me-4">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->5 Topics</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->1 Speakers</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->60 Min</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->137 students</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                    
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center ">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-70px symbol-circle me-5">
                                            <span class="symbol-label bg-light-danger">
                                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs026.svg-->
                                                <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z" fill="currentColor"></path>
                                                        <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Subtitle-->
                                            <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                            <!--end::Subtitle-->
                                            <!--begin::Items-->
                                            <div class="d-flex d-grid gap-5">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0 me-4">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->12 Topics</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->1 Speakers</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->50 Min</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->72 students</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                    
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-70px symbol-circle me-5">
                                            <span class="symbol-label bg-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs038.svg-->
                                                <span class="svg-icon svg-icon-3x svg-icon-primary">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0444 17.9444V12.1444L17.0444 15.0444C18.6444 15.9444 19.1445 18.0444 18.2445 19.6444C17.3445 21.2444 15.2445 21.7444 13.6445 20.8444C12.6445 20.2444 12.0444 19.1444 12.0444 17.9444ZM7.04445 15.0444L12.0444 12.1444L7.04445 9.24445C5.44445 8.34445 3.44444 8.84445 2.44444 10.4444C1.54444 12.0444 2.04445 14.0444 3.64445 15.0444C4.74445 15.6444 6.04445 15.6444 7.04445 15.0444ZM12.0444 6.34444V12.1444L17.0444 9.24445C18.6444 8.34445 19.1445 6.24444 18.2445 4.64444C17.3445 3.04444 15.2445 2.54445 13.6445 3.44445C12.6445 4.04445 12.0444 5.14444 12.0444 6.34444Z" fill="currentColor"></path>
                                                        <path opacity="0.3" d="M7.04443 9.24445C6.04443 8.64445 5.34442 7.54444 5.34442 6.34444C5.34442 4.54444 6.84444 3.04443 8.64444 3.04443C10.4444 3.04443 11.9444 4.54444 11.9444 6.34444V12.1444L7.04443 9.24445ZM17.0444 15.0444C18.0444 15.6444 19.3444 15.6444 20.3444 15.0444C21.9444 14.1444 22.4444 12.0444 21.5444 10.4444C20.6444 8.84444 18.5444 8.34445 16.9444 9.24445L11.9444 12.1444L17.0444 15.0444ZM7.04443 15.0444C6.04443 15.6444 5.34442 16.7444 5.34442 17.9444C5.34442 19.7444 6.84444 21.2444 8.64444 21.2444C10.4444 21.2444 11.9444 19.7444 11.9444 17.9444V12.1444L7.04443 15.0444Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Subtitle-->
                                            <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                            <!--end::Subtitle-->
                                            <!--begin::Items-->
                                            <div class="d-flex d-grid gap-5">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0 me-4">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->3 Topics</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->1 Speakers</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-column flex-shrink-0">
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->50 Min</span>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->72 students</span>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Slider Widget 2-->
                </div>
            </div>
            <!--end::Row-->  
        </div>
        <!--end::Question ask and overview-->  

        <!--begin::Top category Section-->
        <div class="top-categories mb-9">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-9">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Top Category</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-around px-5 px-md-0">
                                @for($i=0; $i<15; $i++)
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 p-2 m-3" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center rounded">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-circle symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-18.jpg" class="" alt="">
                                                </div>
                                                <div class="text-center">
                                                    <a href="" class="fw-bolder  text-hover-success mb-1 fs-4">Admission </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                @endfor
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->  
        </div>
        <!--end::Top category section--> 

        <!--begin::Promotional carousel-->
        <div class="promotional-carousel ">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-9 d-flex align-items-center justify-content-between">
                            <!--begin::Title-->
                            <h3 class="card-title ">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Promotional (carousel)</span>
                                
                            </h3>
                            <span class="card-label fw-bolder text-gray-800 fs-2">See all</span>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-lg-10 mb-10 mb-lg-20">
                                <!--begin::Col-->
                                <div class="col-lg-10 mx-auto">
                                    <!--begin::Testimonial-->
                                    <div class="tns tns-default">
                                        <!--begin::Slider-->
                                        <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false">

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
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::col-->
            </div>
            <!--end::row-->
        </div>
        <!--end::Promotional carousel-->

        <!--begin::MySatt-->
        <div class="my-satt">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-flush" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                        <!--begin::Card body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Heading-->
                            <div class="text-center mb-5 mb-lg-10">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5" id="explore"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">My Satt</h3>
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
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_job">BookMark</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_admission">Study Plan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_programming">Favourite</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_academy">Book</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">Video</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">Exam</a>
                                            </li>
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
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_admission">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_programming">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                    
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_academy">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_islamic">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                            
                            </div>
                            <!--end::Tabs content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::col-->
            </div>
            <!--end::row-->
        </div>
        <!--end::Mysatt-->


        <!--begin::Online test-->
        <div class="online-test">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-9">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Online Test</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-around px-5 px-md-0">
                                @for($i=0; $i<9; $i++)
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 py-5 px-2 m-3" >
                                    <a href="" class="">  
                                        <div class="text-center">
                                            <a href="" class="fw-bolder  text-hover-success mb-1 fs-4">Exam name with category</a>
                                        </div>    
                                    </a>
                                </div>
                                <!--end::Col-->
                                @endfor
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row--> 
        </div>
        <!--end::Online test-->

        <!--begin::video-->
        <div class="video">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-md-9">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Video</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-around">
                                {{-- <div class="col-md-8 mx-auto"> --}}
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
                                    <button class="btn btn-icon btn-color-light d-none " id="kt_team_slider_prev2">
                                        <span class="svg-icon svg-icon-3x">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Slider button-->

                                    <!--begin::Slider button-->
                                    <button class="btn btn-icon btn-color-light d-none " id="kt_team_slider_next2">
                                        <span class="svg-icon svg-icon-3x">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Slider button-->
                                </div>
                                {{-- </div> --}}
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row--> 
        </div>
        <!--end::video-->

        <!--begin::suggestions-->
        <div class="suggestions">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-md-9 d-flex justify-content-between align-content-center">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Suggestions</span>
                               
                            </h3>
                            <a href="#"><span class="fs-6 fw-bolder">Sell all</span></a>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-around px-5 px-md-0">
                                @for($i=0; $i<9; $i++)
                                <!--begin::Col-->
                                <div class="card bg-light card-rounded col-md-3 p-2 m-3" >
                                    <a href="" class="">
                                        <div class="d-flex align-items-center rounded">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="symbol symbol-circle symbol-50px me-3">
                                                    <img src="assets/media/stock/600x400/img-18.jpg" class="" alt="">
                                                </div>
                                                <div class="text-center">
                                                    <a href="" class="fw-bolder  text-hover-success mb-1 fs-4">Package</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Col-->
                                @endfor
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row--> 
        </div>
        <!--end::suggestions-->

        <!--begin::offer-->
        <div class="offer">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-md-9 d-flex justify-content-between align-content-center">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Offer</span>
                               
                            </h3>
                            <a href="#"><span class="fs-6 fw-bolder">Sell all</span></a>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <!--begin::Tabs wrapper-->
                            <div class="d-flex flex-center mb-5 mb-lg-15">
                                <!--begin::Tabs-->
                                <div class="mb-5 hover-scroll-x">
                                    <div class="d-grid">
                                        <ul class="nav nav-tabs flex-center flex-nowrap text-nowrap mb-2 fw-bolder fs-5">
                                            
                                            @for($i=0; $i<10; $i++)
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    ><img src="assets/media/stock/600x400/img-2.jpg" class="card-rounded h-100px" alt=""/></a>
                                            </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Tabs wrapper-->
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row--> 
        </div>
        <!--end::offer-->

        <!--begin::latest-update-->
        <div class="latest-update">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-flush" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                        <!--begin::Card body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Heading-->
                            <div class="text-center mb-5 mb-lg-10">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5" id="explore"
                                    data-kt-scroll-offset="{default: 100, lg: 150}">Latest Update</h3>
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
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_job">Academy</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_admission">Admission</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_programming">Job</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_academy">Skill</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">Video</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">Book</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 " href="#"
                                                    data-bs-toggle="tab" data-bs-target="#kt_landing_projects_islamic">Forum+Recent</a>
                                            </li>
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
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_admission">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_programming">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                    
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_academy">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_landing_projects_islamic">
                                    <!--begin::Row-->
                                    <div class="row g-10 d-flex justify-content-center">
                                        
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab pane-->
                            
                            </div>
                            <!--end::Tabs content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::col-->
            </div>
            <!--end::row-->
        </div>
        <!--end::latest-update-->

         <!--begin::book-->
        <div class="book">
            <!--begin::Row-->  
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 ">							
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Tables widget 13-->
                    <div class="card card-flush h-xl-100">
                         <!--begin::Header-->
                        <div class="card-header pt-7 mb-md-9 d-flex justify-content-between align-content-center">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800 fs-2">Book</span>
                               
                            </h3>
                            <a href="#"><span class="fs-6 fw-bolder">Sell all</span></a>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-4">
                            <!--begin::Row-->
                            <div class="row g-10 d-flex justify-content-around">
                                {{-- <div class="col-md-8 mx-auto"> --}}
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
                                    <button class="btn btn-icon btn-color-light d-none " id="kt_team_slider_prev2">
                                        <span class="svg-icon svg-icon-3x">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Slider button-->

                                    <!--begin::Slider button-->
                                    <button class="btn btn-icon btn-color-light d-none " id="kt_team_slider_next2">
                                        <span class="svg-icon svg-icon-3x">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Slider button-->
                                </div>
                                {{-- </div> --}}
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Tables widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row--> 
        </div>
        <!--end::book-->


    </div>
    <!--end::Container-->
</div>
<!--end:Post -->

<!--start::modal-->
<!--begin::Modal - Ask Question-->
<div class="modal fade" id="kt_modal_question_ask_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header justify-content-end border-0 pb-0">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <h1 class="mb-3">Ask Here</h1>
                </div>
                <!--end::Heading-->

                <span>Form goes here</span>

                <!--begin::Actions-->
                <div class="d-flex flex-center flex-row-fluid pt-12">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Ask Question-->
<!--end::modal-->

@endsection
