
@extends('layouts.app')
@section('title', 'Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex  flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Question</h1>
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
                <li class="breadcrumb-item text-dark">Category</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Subject</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Question</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
       
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
            <button class="btn btn-sm btn-success" id="readingMode" >Reading Mode</button>
            <button class="btn btn-sm btn-danger d-none" id="testMode">Self Test Mode</button>
            <!--end::Primary button-->
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
        <div class="row gy-5 g-xl-8" >
            <div class="col-xxl-10 mb-xl-10 col-md-10 col-sm-12 col-xs-12">
                <!--begin::Engage widget 1-->
                <div class="card h-md-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column flex-center">
                        <!--begin::Heading-->
                        <div class="mb-2">
                            <!--begin::Title-->
                          
                            <h1 class="fw-bold text-gray-800 text-center lh-lg">{{$category->name}}
                            <br><span class="fw-boldest">{{$sub_category->name}}</span></h1>
                            <!--end::Title-->
                            <a href="{{ route('jobs.sub-category.subject.all-question', [$category->slug, $sub_category->slug]) }}" class="btn btn-sm btn-light btn-active-color-primary">MCQ</a>
                            <a href="{{ route('jobs.sub-category.subject.all-question', [$category->slug, $sub_category->slug, 'type' => 'written']) }}" class="btn btn-sm btn-light btn-active-color-primary">Written Question</a>
                            <a href="{{ route('jobs.sub-category.subject.all-question', [$category->slug, $sub_category->slug, 'type' => 'passage']) }}" class="btn btn-sm btn-light btn-active-color-primary">Passage Question</a>
                            <a href="{{ route('jobs.sub-category.subject.all-question', [$category->slug, $sub_category->slug, 'type' => 'image']) }}" class="btn btn-sm btn-light btn-active-color-primary">Image Question</a>
                        </div>
                        <!--end::Heading-->
                       
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 1-->
            </div>
        </div>
        <!--end::Row-->
        @if($subjects->count() > 0)
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8 mt-3" >
            <div class="col-xl-10 col-md-10 col-sm-12 col-xs-12">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8 " >
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column ">
                        <!--begin::Row-->
                        <div class="row g-0 d-flex justify-content-center">
                            <!--begin::Col-->
                           
                            <div class="col-12 ">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        @foreach($subjects as $subject)
                                        @php
                                            $subject_total_ques = App\Models\Question::where(['sub_category_id' => $sub_category->id, 'subject_id' => $subject->id])->get();
                                        @endphp
                                        <div class="swiper-slide"> 
                                            <a href="{{ route('jobs.category.sub-category.subject.question', [$category->slug, $sub_category->slug, $subject->slug]) }}" 
                                                class="cursor-pointer page-link btn btn-success {{ strlen($subject->name) > 15 ? 'font-size' : '' }}">
                                                {{$subject->name}}  <span class="badge badge-circle badge-danger ms-2">{{ $subject_total_ques->count() }}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <div class="swiper-button-prev" style="font-size: 25px !important;
                                    font-weight: 800;">
                                    </div>
                                    <div class="swiper-button-next" style="font-size: 25px !important;
                                    font-weight: 800;">
                                    </div>

                                </div>
                                
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
        </div>
        @endif
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
           

            <!--begin::Col-->
            <div class="col-xl-10 col-md-10 col-sm-12 col-xs-12" id="question">
              
                @foreach($questions as $key => $question)
                <!--begin::Feeds Widget 2-->    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                        @if($question->passage_id != '')
                        <h5 class="mt-5">
                            <div class="col-md-12 ">
                                <p class="text-gray-800 fw-normal" style="line-height: 22px">
                                    <span style="color: black; font-weight:600">Read the following passage and answer this Question :</span> <br>
                                    {{ $question->passage->passage }}
                                </p>
                            </div>
                        </h5>
                        @endif
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
                                    <a href="{{ route('question.edit-question', $question->id) }}" class="menu-link px-3">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3" onclick="addNew()" >Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}" class="menu-link px-3">View Comment</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if($question->question_type == 'written')
                        <div class="row"  style="font-size: 16px">
                            @if($question->question_option->written_answer != '' )
                            <div class="col-md-12 test">
                                <p class="text-gray-800 fw-normal mb-5 "> 
                                   <span style="color: #47BE7D; font-weight:600">ANS</span> <i class="fas fa-angle-double-right fa-2xl"></i> {{$question->question_option->written_answer }}
                                </p>
                            </div>
                            @else
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 "> 
                                   <i class="fas fa-eye fa-2xl"></i> NO ANSWER YET
                                </p>
                            </div>
                            @endif  
                        </div>
                        @elseif($question->question_type == 'image')
                        {{ $question->question_option->image_option[10] }}
                        @else
                        <div class="row"  style="font-size: 16px">
                           
                            @if($question->question_option->option_1 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="1"> 
                                   <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_1 }}
                                </p>
                                
                                
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_1 }}</p>
                            </div>
                            
                            @endif
                            @if($question->question_option->option_2 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="2"> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_2 }}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_2 }}</p>
                            </div>
                            @endif
                            @if($question->question_option->option_3 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="3"> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_3}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_3}}</p>
                            </div>
                            @endif
                            @if($question->question_option->option_4 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="4"> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_4}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_4}}</p>
                            </div>
                            @endif
                            @if($question->question_option->option_5 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="5"> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_5}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_5}}</p>
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start mt-2">
                                <button type="button" class="btn btn-sm  btn-light me-3">
                                    <a href="{{ url('jobs',
                                        [$question->sub_category->category->slug, $question->sub_category->slug, $question->subject->slug]
                                    ) }}">{{$question->subject->name}}</a>
                                </button>              
                                <button type="button" class="btn btn-sm  btn-light me-3">
                                    <a href="{{ route('jobs.sub-category.subject.all-question', [$question->sub_category->category->slug, $question->sub_category->slug]) }}">{{$question->sub_category->name}}</a>
                                </button>  
                                <button type="button" class="btn btn-sm  btn-light me-3">
                                    <a href="{{ url('job-solution', [$question->sub_category->category->main_category->slug, $question->sub_category->category->slug]) }}">{{$question->sub_category->category->name}}</a>
                                </button>            
                                <button type="button" class="btn btn-sm  btn-light me-3">
                                    <a href="{{ url('job-solution', $question->sub_category->category->main_category->slug) }}">{{$question->sub_category->category->main_category->name}}</a>
                                </button>            
                                       
                            </div>
                            <div class=""> 
                                <a href="javascript:;" class="btn btn-sm  btn-success me-3 view-answer "  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="View Answer"><i class="fas fa-eye fa-xl" ></i></a>
                            </div> 
                        </div>
                       
                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                        <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                            <a href="javascript:;" class="comment me-2 btn btn-sm btn-light btn-color-muted btn-active-light-info px-4 py-2"  
                            data-text="comment"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Add Comment">
                            <i class="fas fa-comment"></i>
                            </a>
                            <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                            data-id="{{ $question->id }}" data-catid="{{ $question->sub_category->category->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Bookmark">
                            <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Like">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <i class="fas fa-heart"></i>
                            <!--end::Svg Icon-->{{$question->vote}}</a>
                            <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Total view">
                                <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                            </span>
                        </div>
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

                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_new_question_des" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content rounded">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <!--begin:Form-->
                                <form id="kk_modal_new_question_des_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    {{-- csrf token  --}}
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Add New Question Description</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Question Descrption</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                                        <div class="help-block with-errors description-error"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end:Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Product/Service-->

                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_new_comment" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content rounded">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <!--begin:Form-->
                                <form id="kk_modal_new_comment_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    {{-- csrf token  --}}
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Add New Comment</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Comment</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="comment" class="form-control form-control-solid h-100px"></textarea>
                                        <div class="help-block with-errors comment-error"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kk_modal_new_comment_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end:Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Product/Service-->

                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $questions->links() }}
                </div>
            </div>
            <!--end::Col-->
           
        </div>
        
    </div>
    
</div>
<!---end::Post -->
@endsection

@push('script')
    <script type="text/javascript">

        //test
        $(document).ready(function(){
            $('.option').on('click', function(){
                var id = $(this).data('id')
                var option_no = $(this).data('option')
                // console.log(id)
                // console.log(option_no)
                $.ajax({
                type:"GET",
                url: "{{ url('question/answer-check') }}"+'/'+id+'/'+option_no,
                dataType: 'json',
                success:function(data){
                    if(data.success == true){
                        Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Well Done!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        })
                        
                    }
                    if(data.error == true){
                        Swal.fire({
                            text: data.message,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('OPPS, try again!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        })
                       //$(this).closest('.card-body').find('.view-answer').removeClass('d-none');
                    }
                }
            })
            })
        })

        //view-specific answer
        $(document).ready(function(){
            $('.view-answer').on('click', function(){
                $(this).closest('.card-body').find('.reading').toggleClass('d-none');
                $(this).closest('.card-body').find('.test').toggleClass('d-none');
            })
        })

        //add comment
        $(document).ready(function(){
            $('.comment').on('click', function(){
                $('.with-errors').text('')
                $('#kk_modal_new_comment_form')[0].reset();
                $('#kk_modal_new_comment').modal('show')
            })
        })

         //new comment save
        $('#kk_modal_new_comment_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_comment_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('question/comment/store')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success ==  false || data.success ==  "false"){
                        var arr = Object.keys(data.errors);
                        var arr_val = Object.values(data.errors);
                        for(var i= 0;i < arr.length;i++){
                        $('.'+arr[i]+'-error').text(arr_val[i][0])
                        }
                    }else if(data.error || data.error == 'true'){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('#kk_modal_new_comment_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_comment_form')[0].reset();
                        $("#kk_modal_new_comment").modal('hide');

                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_comment_submit').removeAttr('disabled')

                }
          });

        })
        
        // add new
        function addNew(){
            $('input[name="question_des_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_question_des_form')[0].reset();
            $('#kk_modal_new_question_des').modal('show')
        }

            
        //new description save
        $('#kk_modal_new_question_des_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('description/question-description/store')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success ==  false || data.success ==  "false"){
                        var arr = Object.keys(data.errors);
                        var arr_val = Object.values(data.errors);
                        for(var i= 0;i < arr.length;i++){
                        $('.'+arr[i]+'-error').text(arr_val[i][0])
                        }
                    }else if(data.error || data.error == 'true'){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_question_des_form')[0].reset();
                        $("#kk_modal_new_question_des").modal('hide');

                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
          });

        })
            
        //vote
        $('.vote').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/vote')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        showConfirmButton: false
                        
                    })
                    setTimeout(function() {
                        location.reload();  //Refresh page
                    }, 1000);
                }
            })
        });

        //view count
        $('.view').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/view-count')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    
                }
            })
        });

        //bookmarks
        $('.bookmark').on('click', function(){
            var id = $(this).data('id')
            var catid = $(this).data('catid')
           
            $(this).children().addClass('svg-icon-primary');
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/bookmark')}}"+'/'+id+'/'+catid,
                dataType: 'json',
                success:function(data){
                    if(data.success){
                        Swal.fire({
                        text: data.message,
                        icon: "success",
                        
                    })
                    }else{
                        Swal.fire({
                        text: data.message,
                        icon: "error",
                        
                        })
                    }
                   
                    
                }
            })
        });

        //reading mode
        $(document).ready(function(){
            $('#readingMode').on('click', function(e){
                e.preventDefault();
                $('.test').addClass('d-none')
                $('.reading').removeClass('d-none')
                $(this).addClass('d-none')
                $('#testMode').removeClass('d-none')
        
            })
            $('#testMode').on('click', function(e){
                e.preventDefault();
                $('.test').removeClass('d-none')
                $('.reading').addClass('d-none')
                $('#readingMode').removeClass('d-none')
                $(this).addClass('d-none')
               
            })
        })


        const swiper = new Swiper('.swiper', {
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
             breakpoints: {
                // when window width is >= 320px
                320: {

                slidesPerView: 2,

                spaceBetween: 20

                },

                // when window width is >= 480px

                480: {

                slidesPerView: 3,

                spaceBetween: 30

                },

                // when window width is >= 640px

                640: {

                slidesPerView: 4,

                spaceBetween: 40

                }

                

            }

        });

    </script>
@endpush
