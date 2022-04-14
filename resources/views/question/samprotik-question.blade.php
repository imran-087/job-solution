
@extends('layouts.app')
@section('title', 'Current Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex  flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Current Question</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Recent Question</li>
                <!--end::Item-->
                <!--begin::Item-->
               
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!-- start: year filter-->
             <span class="pe-0 text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter Year 
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                    @foreach($years as $year)
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['year' => $year->id]) }}" class="menu-link px-3">{{ $year->year }}</a>
                    </div>
                    <!--end::Menu item-->
                    @endforeach
                </div>
                <!--end::Menu-->
            </span>
            <!-- end: search filter-->

            <!-- start: date filter-->
            <span class="pe-0 text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter Options 
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['today']) }}" class="menu-link px-3">Today</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['yesterday']) }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Yesterday</a>
                    </div>
                    <!--end::Menu item-->
                    
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['last_7_days']) }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Last 7 Days</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['last_30_days']) }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Last 30 Days</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['this_month']) }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">This Month</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('question.recent-question', ['last_month']) }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Last Month</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </span>
             <!--end::date filter-->
            <a href="{{route('question.recent-question')}}" class="btn btn-sm btn-primary" >Reset</a>
        </div>
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
         
        
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-10 col-md-10 col-sm-12 col-xs-12" id="question">
              
                @foreach($questions as $key => $question)
                <!--begin::Feeds Widget 2-->    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                       
                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}"> {{ $key+1 }}. {{$question->question}} </a>
                        </h3>
                       
                        <div class="card-toolbar">
                           <!--begin::Menu-->
                           <button type="button" class="btn btn-sm btn-light btn-active-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                            
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Options</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 editQuestion" data-id="{{ $question->id }}">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $question->id }}" >Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item px-3 my-1">
                                    <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}" class="menu-link px-3">View Comment</a>
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"  style="font-size: 16px">
                            <div class="col-md-12">
                                <p class="text-gray-800 fw-bold " > 
                                  <span style="color:green; font-weight:bold">answer:</span> {{$question->question_option->answer }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2 text-gray-700 fw-bold ">
                            {{$question->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                        <!--begin::Question Activity-->
                        @include('question.include.activity')
                        <!--end::Question Activity-->

                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        <div class="m-0">
                           
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center  collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$question->id}}" aria-expanded="false" >
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <i class="fas fa-caret-up fa-2xl"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <i class="fas fa-caret-down fa-2xl"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                   
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h5 class="text-gray-700 fw-bolder cursor-pointer mb-0" style="font-size: 16px !important;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="View Description">Description</h5>
                                <p class="badge badge-success fw-bolder">{{ $question->descriptions->count() }}</p>
                                <!--end::Title-->
                                
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_4_1_{{$question->id}}" class="fs-6 ms-1 collapse" style="">
                               <!--begin::Text-->
                                @foreach($question->descriptions as $description)
                                    @include('question.description')
                                @endforeach
                                <!--end::Text-->
                            </div>
                            <!--end::Content-->
                            
                        </div>
                        <!--end::Section-->
                        <!--end::Accordion-->
                            
                    </div>
                </div>
                <!--end::Feeds Widget 2-->

                 <!--begin::Modal - New Description-->
                @include('question.include.add_description_modal')
                <!--end::Modal - New Description-->

                <!--begin::Modal - New Comment-->
                @include('question.include.add_comment_modal')
                <!--end::Modal - New Comment-->

                <!--begin::Modal - Edit Question-->
                <div class="modal fade" id="kk_modal_show_question" tabindex="-1" aria-hidden="true">
                    <div id="edited_question_view_modal"></div>
                </div>
                <!--end::Modal - Edit Question-->

                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $questions->links() }}
                </div>
            </div>
            <!--end::Col-->
           
        </div>
        <!--end::Row-->
    </div>
</div>
<!---end::Post -->

<!---start::Bookmark modal -->
@include('question.include.add_bookmark_modal')
<!---end::Bookmark modal -->

@endsection

@push('script')

    @include('common.page_script')

    

    {{-- <script type="text/javascript">

        // const swiper = new Swiper('.swiper', {
        //     pagination: {
        //         el: '.swiper-pagination',
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     scrollbar: {
        //         el: '.swiper-scrollbar',
        //     },
        //      breakpoints: {
        //         // when window width is >= 320px
        //         320: {

        //         slidesPerView: 2,

        //         spaceBetween: 20

        //         },

        //         // when window width is >= 480px

        //         480: {

        //         slidesPerView: 3,

        //         spaceBetween: 30

        //         },

        //         // when window width is >= 640px

        //         640: {

        //         slidesPerView: 4,

        //         spaceBetween: 40

        //         }

                

        //     }

        // });

    </script> --}}
@endpush
