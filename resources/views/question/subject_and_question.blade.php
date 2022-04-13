
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
            <button class="btn btn-sm btn-success" id="wright" >0</button>
            <button class="btn btn-sm btn-danger" id="wrong">0</button>
            <!--end::Primary button-->
        </div>

       
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
                                    <a href="javascript:;" class="menu-link px-3 editQuestion" data-id="{{ $question->id }}">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $question->id }}" >Add Description</a>
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
                        @elseif($question->question_type == 'mcq')
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
                        @else
                        <div class="row"  style="font-size: 16px">
                            @if($question->question_option->option_1 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="1"> 
                                   <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_1 }}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                                
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_1 }}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            
                            @endif
                            @if($question->question_option->option_2 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="2"> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_2 }}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_2 }}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            @endif
                            @if($question->question_option->option_3 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="3"> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_3}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_3}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            @endif
                            @if($question->question_option->option_4 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="4"> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_4}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_4}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            @endif
                            @if($question->question_option->option_5 != '')
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $question->id }}" data-option="5"> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_5}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_5}}
                                </p>
                                <div class="symbol symbol-45px me-2 mb-5">
                                    <span class="symbol-label">
                                        <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <!--begin:tag-->
                            @include('question.include.tag')
                            <!--end:tag-->
                            
                            <div class=""> 
                                <a href="javascript:;" class="btn btn-sm  btn-success me-3 view-answer "  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="View Answer"><i class="fas fa-eye fa-xl" ></i></a>
                            </div> 
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
                                @if($question->descriptions->count() > 0)
                                    @include('question.best_description')
                                @endif
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
        
    </div>
    
</div>
<!---end::Post -->

@include('question.include.add_bookmark_modal')

@endsection

@push('script')
    @include('common.page_script')
@endpush
