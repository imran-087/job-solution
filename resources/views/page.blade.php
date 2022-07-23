
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Satt Academy - Home</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets') }}/media/logos/satt-logo.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->

        <!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
            style="background-image: url({{ asset('assets') }}/media/svg/illustrations/landing.svg)">
            <!--begin::Header-->
            <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center justify-content-between">
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center flex-equal">
                            <!--begin::Mobile menu toggle-->
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                id="kt_landing_menu_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Mobile menu toggle-->
                            <!--begin::Logo image-->
                            <a href="" class="d-flex justify-content-center align-content-center">
                                <img alt="Logo" src="{{ asset('assets') }}/media/logos/satt-logo.png"
                                    class="logo-default h-25px h-lg-30px" />
                                <h4> <strong><span style="color: #E87A33">SATT</span> <span style="color: #FBC401">ACADEMY</span></strong> </h4>
                            </a>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Logo-->
                        <!--begin::Menu wrapper-->
                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                <!--begin::Menu-->
                                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                                    id="kt_landing_menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="{{ url('/') }}"
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ '/home' }}"
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Job Solution</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ url('/discussion') }}"
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Forum</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="" 
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Team</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio"
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Portfolio</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing"
                                            data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pricing</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Toolbar-->
                        <div class="flex-equal text-end ms-1">
                            <a href="{{ route('login') }}"
                                class="btn btn-success">Sign In</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
        </div>
    </div>
    <!--end::Header Section-->

    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5 mt-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">{{ Str::ucfirst($page->page_name) }}</h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                
                <!--begin::content-->
                {!! $page->content !!}
                <!--end::content-->
               
            </div>
            <!--end::Row-->
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    
    <!--begin::Footer Section-->
    <div class="mb-0">
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
        <div class="landing-dark-bg pt-20">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row py-10 py-lg-20">
                    <!--begin::Col-->
                    <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                        <!--begin::Block-->
                        <div class="p-9">
                            <!--begin::Logo image-->
                            <a href="" class="d-flex justify-content-start align-content-center">
                                <img alt="Logo"@isset($setting->logo)
                                    src="{{ asset($setting->logo) }}"
                                    @endisset 
                                    class="logo-default h-35px h-lg-80px h-md-85px" />
                               
                            </a>
                            <p class="mt-5 text-white fs-5">উইকিমিডিয়া ফাউন্ডেশন অনুমোদিত স্থানীয় অলাভজনক সংস্থা। এটি বাংলাদেশে বাংলা উইকিপিডিয়া বা এর সহপ্রকল্পসমূহ এবং 
                                উইকিমিডিয়া ফাউন্ডেশনের বিভিন্ন শিক্ষামূলক প্রকল্পের প্রচার ও প্রসারের কাজ করে। </p>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Block-->
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-5">
                            <!--begin::Title-->
                            <h2 class="text-white text-center mb-2">আমাদের মোবাইল অ্যাপ ডাউনলোড করুন</h2>
                            <!--end::Title-->
                            <div class="d-flex justify-content-center align-content-center">
                                <!--begin::Logo image-->
                                <a href=" @isset($setting->playstore_link) {{ url($setting->playstore_link) }} @endisset" class="">
                                    <img alt="Logo" src="{{ asset('assets') }}/media/playstore/google-play-store.png"
                                    class="logo-default h-25px h-lg-50px h-md-35px me-3" />   
                                </a>
                                <!--begin::Logo image-->
                                <a href="@isset($setting->playstore_link) {{ url($setting->playstore_link) }} @endisset" class="">
                                    <img alt="Logo" src="{{ asset('assets') }}/media/playstore/app-store.png"
                                    class="logo-default h-25px h-lg-50px h-md-35px" />
                                </a>  
                            </div> 
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-6 ps-lg-16">
                        <!--begin::Navs-->
                        <div class="d-flex justify-content-center">
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column me-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-gray-400 mb-6">More for Satt academy</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="https://keenthemes.com/faqs"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
                                <!--end::Link-->
                                @foreach($pages as $page)
                                    <!--begin::Link-->
                                    <a href="{{ route('page', $page->slug) }}"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">{{ Str::ucfirst($page->page_name) }}</a>
                                    <!--end::Link-->
                                @endforeach
                                
                            </div>
                            <!--end::Links-->
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column ms-lg-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
                                <!--end::Subtitle-->
                                @if($setting->social_link['facebook'] != '')
                                <!--begin::Link-->
                                <a href=" {{ url($setting->social_link['facebook']) }}" class="mb-6">
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/facebook-4.svg"
                                        class="h-20px me-2" alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                </a>
                                <!--end::Link-->
                                @endif
                                @if($setting->social_link['youtube'] != '')
                                <!--begin::Link-->
                                <a href="{{ url($setting->social_link['youtube']) }}" class="mb-6">
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/youtube-3.svg"
                                        class="h-20px me-2" alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
                                </a>
                                <!--end::Link-->
                                @endif
                                @if($setting->social_link['twitter'] != '')
                                <!--begin::Link-->
                                <a href="{{ url($setting->social_link['twitter']) }}" class="mb-6">
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/twitter.svg"
                                        class="h-20px me-2" alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                </a>
                                <!--end::Link-->
                                @endif
                                @if($setting->social_link['dribble'] != '')
                                <!--begin::Link-->
                                <a href="{{ url($setting->social_link['dribble']) }}" class="mb-6">
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/dribbble-icon-1.svg"
                                        class="h-20px me-2" alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                                </a>
                                <!--end::Link-->
                                @endif
                                @if($setting->social_link['instagram'] != '')
                                <!--begin::Link-->
                                <a href="{{ url($setting->social_link['instagram']) }}" class="mb-6">
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/instagram-2-1.svg"
                                        class="h-20px me-2" alt="" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                </a>
                                <!--end::Link-->
                                @endif
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Navs-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
            <!--begin::Separator-->
            <div class="landing-dark-separator"></div>
            <!--end::Separator-->
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <!--begin::Copyright-->
                    <div class="d-flex align-items-center order-2 order-md-1">
                        
                        <!--begin::Logo-->
                        <a href="/metronic8/demo1/../demo1/landing.html">
                            <img alt="Logo" @isset($setting->logo)
                                src="{{ asset($setting->logo) }}"
                                @endisset 
                                class="h-15px h-md-20px" />
                                
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo image-->
                        <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://sattacademy.com">
                            <span> <strong><span style="color: #E87A33">স্যাট</span> <span style="color: #FBC401">একাডেমী</span></strong> </span> © {{date('Y')}} Sattacademy</span>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a href="{{ route('page', 'about-us') }}" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a href="{{ route('page.contact') }}" class="menu-link px-2">Contact</a>
                        </li>
                       
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
</div>
<!--end::Root-->
<!--end::Main-->

		

		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets') }}/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('assets') }}/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
		<script src="{{ asset('assets') }}/plugins/custom/typedjs/typedjs.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets') }}/js/custom/landing.js"></script>
		<script src="{{ asset('assets') }}/js/custom/pages/pricing/general.js"></script>
		<!--end::Page Custom Javascript-->

		
	</body>
	<!--end::Body-->
</html>