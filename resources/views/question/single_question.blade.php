@extends('layouts.app')
@section('title', 'Single Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
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
                <li class="breadcrumb-item text-dark">Single Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Question Description</li>
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
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
        
            <!--begin::Col-->
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12" id="question">
              
                <!--begin::Feeds Widget 2-->
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                       
                        <h3 class=" view card-title text-gray-700 fw-bolder cursor-pointer mb-0"  data-id="{{ $question->id }}" style="max-width: 650px !important;">
                            <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}"> {{$question->question}}  </a>
                        </h3>
                       
                        <div class="card-toolbar">
                           <!--begin::Menu-->
                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Question</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 editQuestion" data-id="{{ $question->id }}">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $question->id }}">Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <h3 class="card-title text-black-700 fw-bolder cursor-pointer mb-5">{{$question->question}}</h3> --}}
                        <!--end::Text-->
                        @if($question->question_type == 'mcq')
                        <div class="row" style="font-size: 16px">
                            @if($question->question_option->option_1 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                    <i class="fas fa-{{ ($question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_1 }}
                                </p>

                            </div>
                            @endif
                            @if($question->question_option->option_2 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '2') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_2 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_3 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_3 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_4 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_4 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_5 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_4 }}
                                </p>
                            </div>
                            @endif
                        </div>
                        @elseif($question->question_type == 'samprotik')
                        <div class="row"  style="font-size: 16px">
                            <div class="col-md-12">
                                <p class="text-gray-800 fw-bold mb-5 " > 
                                  <span style="color:green; font-weight:bold">answer:</span> {{$question->question_option->answer }}</p>
                            </div>
                        </div>
                        @elseif($question->question_type == 'written')
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
                        <div class="d-flex justify-content-start mt-2">
                            @include('question.include.tag')     
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
                            <div class="d-flex align-items-center collapsible py-3 toggle mb-0 active" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$question->id}}" aria-expanded="false">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                   
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h5 class="text-gray-700 fw-bolder cursor-pointer mb-0">Description</h5>
                                <p class="badge badge-light-success fw-bolder">{{ $question->descriptions->count() }}</p>
                                <!--end::Title-->
                                
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_4_1_{{$question->id}}" class="fs-6 ms-1 collapse show" style="">
                                @if($question->descriptions->count() > 0)
                                    @include('question.best_description')
                                @endif
                                @foreach($question->descriptions as $description)
                                    @include('question.description')
                                @endforeach
                            </div>
                            <!--end::Content-->
                          
                        </div>
                        <!--end::Section-->
                         <!--end::Accordion-->
                            
                    </div>
                </div>

                <!--end::Feeds Widget 2-->
                <div class="card mb-5 mb-xl-8">
                   <!--begin::Accordion-->
                    <div class="accordion" id="kt_accordion_1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_1" style="background: inherit !important">
                               <button class="accordion-button fs-4 fw-bold text-gray-800 mb-5 collapsed" style="font-size: 20px" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1">
                                    <b>Comments <sup class="badge badge-success">{{$question->comments->count()}}</sup></b>
                                </button>
                               
                            </h2>
                            <div id="kt_accordion_1_body_1" class="accordion-collapse collapse hide" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                 <a type="button" class=" comment btn btn-sm btn-primary " style="float: right; margin-right: 15px;" >
                                        Add Comment
                                    </a>
                                <div class="accordion-body">
                                   
                                    @foreach($question->comments as $comment)
                                    <!--begin::Reply-->
                                    <div class="d-flex mb-5 mt-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-17.jpg" alt="">
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center flex-wrap mb-1">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{$comment->user->name}}</a>
                                                <span class="text-gray-400 fw-bold fs-7">{{$comment->created_at->diffForHumans()}}</span>
                                                
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Post-->
                                            <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->content }}</span>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Reply-->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Accordion-->
                </div>
                @php
                    $related_questions = App\Models\Question::where([
                        'subject_id' => $question->subject_id,
                        'sub_category_id' => $question->sub_category_id
                        
                    ])->where('id', '!=', $question->id)
                    ->limit(5)->get();
                    
                @endphp

                <!--begin::Engage widget 1-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column flex-center">
                        <!--begin::Heading-->
                        <div class="mb-2">
                            <!--begin::Title-->
                            <h1 class="fw-bold text-gray-800 text-center lh-lg">Related <span class="fw-boldest">Question</span>
                            </h1>
                            <!--end::Title-->
                            
                        </div>
                        <!--end::Heading-->
                    </div>
                </div>

                <div class="row gy-5 g-xl-8">
                    <div class="col-12 mb-xl-10">
                        
                        @foreach($related_questions as $key => $r_question)
                        <!--begin::Feeds Widget 2-->
                        <div class="card card-bordered mb-5">
                            <div class="card-header">
                            
                                <h3 class=" view card-title text-gray-700 fw-bolder cursor-pointer mb-0"  data-id="{{ $r_question->id }}" style="max-width: 650px !important;">
                                    <a href="{{ route('question.single-question', ['ques_id' => $r_question->id]) }}"> {{ $key+1 }}. {{$r_question->question}}  </a>
                                </h3>
                            
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Question Action</div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:;" class="menu-link px-3 editQuestion" data-id="{{ $r_question->id }}">Edit Question</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $r_question->id }}">Add Description</a>
                                        </div>
                                        <!--end::Menu item-->
                                        
                                        <!--begin::Menu item-->
                                        {{-- <div class="menu-item px-3 my-1">
                                            <a href="#" class="menu-link px-3">Settings</a>
                                        </div> --}}
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                    <!--end::Menu--> 
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <h3 class="card-title text-black-700 fw-bolder cursor-pointer mb-5">{{$question->question}}</h3> --}}
                                <!--end::Text-->
                                @if($r_question->question_type == 'mcq')
                                <div class="row" style="font-size: 16px">
                                    @if($r_question->question_option->option_1 != '')
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_1 }}
                                        </p>

                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_2 != '')
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '2') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_2 }}
                                        </p>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_3 != '')
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_3 }}
                                        </p>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_4 != '')
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_4 }}
                                        </p>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_5 != '')
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_5 }}
                                        </p>
                                    </div>
                                    @endif
                                </div>
                                @elseif($r_question->question_type == 'samprotik')
                                <div class="row"  style="font-size: 16px">
                                    <div class="col-md-12">
                                        <p class="text-gray-800 fw-bold mb-5 " > 
                                        <span style="color:green; font-weight:bold">answer:</span> {{$question->question_option->answer }}</p>
                                    </div>
                                </div>
                                @elseif($r_question->question_type == 'written')
                                <div class="row"  style="font-size: 16px">
                                    @if($r_question->question_option->written_answer != '' )
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
                                @else
                                <div class="row"  style="font-size: 16px">
                                    @if($r_question->question_option->option_1 != '' )
                                    <div class="col-md-6 test">
                                        <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $r_question->id }}" data-option="1"> 
                                        <i class="fas fa-eye fa-2xl"></i> {{$r_question->question_option->option_1 }}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 reading d-none">
                                        <p class="text-gray-800 fw-normal mb-5 {{ ($r_question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                        <i class="fas fa-{{ ($r_question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_1 }}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    
                                    @endif
                                    @if($r_question->question_option->option_2 != '')
                                    <div class="col-md-6 test">
                                        <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $r_question->id }}" data-option="2"> 
                                            <i class="fas fa-eye fa-2xl"></i> {{$r_question->question_option->option_2 }}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 reading d-none">
                                        <p class="text-gray-800 fw-normal mb-5  {{ ($r_question->question_option->answer == '2') ? 'right-answer' : ''}} "> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_2 }}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_3 != '')
                                    <div class="col-md-6 test">
                                        <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $r_question->id }}" data-option="3"> 
                                            <i class="fas fa-eye fa-2xl"></i> {{$r_question->question_option->option_3}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 reading d-none">
                                        <p class="text-gray-800 fw-normal mb-5  {{ ($r_question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$r_question->question_option->option_3}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_4 != '' )
                                    <div class="col-md-6 test">
                                        <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $r_question->id }}" data-option="4"> 
                                            <i class="fas fa-eye fa-2xl" ></i> {{$r_question->question_option->option_4}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 reading d-none">
                                        <p class="text-gray-800 fw-normal mb-5  {{ ($r_question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$r_question->question_option->option_4}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    @if($r_question->question_option->option_5 != '')
                                    <div class="col-md-6 test">
                                        <p class="text-gray-800 fw-normal mb-5 cursor-pointer option" data-id="{{ $r_question->id }}" data-option="5"> 
                                            <i class="fas fa-eye fa-2xl" ></i> {{$r_question->question_option->option_5}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 reading d-none">
                                        <p class="text-gray-800 fw-normal mb-5  {{ ($r_question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                            <i class="fas fa-{{ ($r_question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$r_question->question_option->option_5}}
                                        </p>
                                        <div class="symbol symbol-45px me-2 mb-5">
                                            <span class="symbol-label">
                                                <img src="{{ asset($r_question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
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
                                
                            </div>
                            <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                                <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                                        <a href="javascript:;" class="comment me-2 btn btn-sm btn-light btn-color-muted btn-active-light-info px-4 py-2"  
                                        data-text="comment"  data-id="{{ $r_question->id }}"  title="Comment">
                                        <i class="fas fa-comment"></i>{{$r_question->comments->count()}}
                                        </a>
                                        <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                                            data-id="{{ $r_question->id }}" data-catid="{{ $r_question->sub_category->category->id }}" title="bookmark">
                                            <i class="fas fa-bookmark"></i>
                                        </a>
                                        <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                            <i class="fas fa-eye fa-xl"></i> {{$r_question->view_count}} 
                                        </span>

                                        <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $r_question->id }}" title="like">
                                            <i class="fas fa-heart"></i>
                                            {{$r_question->vote}}
                                        </a>
                                </div>
                                <!--begin::Accordion-->
                                <!--begin::Section-->
                                <div class="m-0">
                                
                                    <!--begin::Heading-->
                                    <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_1_{{$r_question->id}}" aria-expanded="false">
                                        <!--begin::Icon-->
                                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                             
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                            <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                    <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                            <span class="svg-icon toggle-off svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                           
                                        
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <h5 class="text-gray-700 fw-bolder cursor-pointer mb-0">Description</h5>
                                        <p class="badge badge-light-success fw-bolder">{{ $r_question->descriptions->count() }}</p>
                                        <!--end::Title-->
                                        
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Body-->
                                    <div id="kt_job_4_1_1_{{$r_question->id}}" class="fs-6 ms-1 collapse" style="">
                                        @if($r_question->descriptions->count() > 0)
                                            @include('question.best_description')
                                        @endif
                                        @foreach($r_question->descriptions as $description)
                                            @include('question.description')
                                        @endforeach
                                    </div>
                                    <!--end::Content-->
                                
                                </div>
                                <!--end::Section-->
                                <!--end::Accordion-->
                                    
                            </div>
                        </div>
                        <!--end::Feeds Widget 2-->
                        @endforeach
                        
                    </div>
                </div>

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

            </div>
            <!--end::Col-->
           
        </div>
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

        //add comment
        // $(document).ready(function(){
        //     $('.comment').on('click', function(){
        //         var id = $(this).data(id)
        //         //console.log(id.id)
        //         $('input[name="question_id"]').val(id.id)
        //         $('.with-errors').text('')
        //         $('#kk_modal_new_comment_form')[0].reset();
        //         $('#kk_modal_new_comment').modal('show')
        //     })
        // })

        //new comment save
        // $('#kk_modal_new_comment_form').on('submit',function(e){
        //     e.preventDefault()
        //     $('.with-errors').text('')
        //     $('.indicator-label').hide()
        //     $('.indicator-progress').show()
        //     $('#kk_modal_new_comment_submit').attr('disabled','true')

        //     var formData = new FormData(this);
        //     $.ajax({
        //         type:"POST",
        //         url: "{{ url('question/comment/store')}}",
        //         data:formData,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         success:function(data){
        //             if(data.success ==  false || data.success ==  "false"){
        //                 var arr = Object.keys(data.errors);
        //                 var arr_val = Object.values(data.errors);
        //                 for(var i= 0;i < arr.length;i++){
        //                 $('.'+arr[i]+'-error').text(arr_val[i][0])
        //                 }
        //             }else if(data.error || data.error == 'true'){
        //                 var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
        //                 $('#kk_modal_new_comment_form').find('.messages').html(alertBox).show();
        //             }else{
        //                 // empty the form
        //                 $('#kk_modal_new_comment_form')[0].reset();
        //                 $("#kk_modal_new_comment").modal('hide');

        //                 Swal.fire({
        //                         text: data.message,
        //                         icon: "success",
        //                         buttonsStyling: !1,
        //                         confirmButtonText: "{{__('Ok, got it!')}}",
        //                         customClass: {
        //                             confirmButton: "btn fw-bold btn-primary"
        //                         }
        //                     }).then((function () {
        //                         //refresh datatable
        //                         $('#dataTable').DataTable().ajax.reload();
        //                     }))
        //             }

        //             $('.indicator-label').show()
        //             $('.indicator-progress').hide()
        //             $('#kk_modal_new_comment_submit').removeAttr('disabled')

        //         }
        //   });

        // })

        //cancel button
        // $('#kk_modal_new_service_cancel').on('click', function(){
        //     $('#kk_modal_new_question_des_form')[0].reset();
        //     $("#kk_modal_new_question_des").modal('hide');
        //     $('.indicator-label').show()
        //     $('.indicator-progress').hide()
        //     $('#kk_modal_new_service_submit').removeAttr('disabled')
        // })

        //edit Question
        // $('.editQuestion').on('click', function() {
        //     var id = $(this).data(id)
        //     //console.log(id)
        //     $.ajax({
        //         type:"GET",
        //         url: "{{ url('/question/edit-question')}}"+'/'+id.id,
        //         dataType: 'json',
        //         success:function(data){
        //             $("#edited_question_view_modal").html(data.html);
        //             $("#kk_modal_show_question").modal('show');
        //         }
        //     });
        // });

        //cancel button
        // $(document).on('click', '#kk_modal_new_service_cancel', function(){
            
        //     $("#kk_modal_show_question").modal('hide');
        // })

        //update
        // $(document).on('submit', '#kk_modal_new_question_form', function(e){
        //     e.preventDefault()
        //     //console.log('here')
        //     $('.with-errors').text('')
        //     $('.indicator-label').hide()
        //     $('.indicator-progress').show()
        //     $('#kk_modal_new_service_submit').attr('disabled','true')

        //     var formData = new FormData(this);
        //     $.ajax({
        //         type:"POST",
        //         url: "{{ url('/question/edit-question/update')}}",
        //         data:formData,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         success:function(data){
        //             if(data.success ==  false || data.success ==  "false"){
        //                 var arr = Object.keys(data.errors);
        //                 var arr_val = Object.values(data.errors);
        //                 for(var i= 0;i < arr.length;i++){
        //                 $('.'+arr[i]+'-error').text(arr_val[i][0])
        //                 }
        //             }else if(data.error || data.error == 'true'){
        //                 var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
        //                 $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
        //             }else{
        //                 // empty the form
        //                 $('#kk_modal_new_question_form')[0].reset();
        //                 $("#kk_modal_show_question").modal('hide');

        //                 Swal.fire({
        //                     text: data.message,
        //                     icon: "success",
        //                     buttonsStyling: !1,
        //                     confirmButtonText: "{{__('Ok, got it!')}}",
        //                     customClass: {
        //                         confirmButton: "btn fw-bold btn-primary"
        //                     }
        //                 })
        //             }

        //             $('.indicator-label').show()
        //             $('.indicator-progress').hide()
        //             $('#kk_modal_new_service_submit').removeAttr('disabled')

        //         }
        //     });
        // })
       

        //description modal show
        // $('.addDescription').on('click', function() {
        //     var id = $(this).data(id)
        //     //console.log(id.id)
        //     $('input[name="question_id"]').val(id.id)
        //     $('.with-errors').text('')
        //     $('#kk_modal_new_question_des_form')[0].reset();
        //     $('#kk_modal_new_question_des').modal('show')
        // });
        
        
        //new description save
        // $('#kk_modal_new_question_des_form').on('submit',function(e){
        //     e.preventDefault()
        //     $('.with-errors').text('')
        //     $('.indicator-label').hide()
        //     $('.indicator-progress').show()
        //     $('#kk_modal_new_service_submit').attr('disabled','true')

        //     var formData = new FormData(this);
        //     $.ajax({
        //         type:"POST",
        //         url: "{{ url('description/question-description/store')}}",
        //         data:formData,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         success:function(data){
        //             if(data.success ==  false || data.success ==  "false"){
        //                 var arr = Object.keys(data.errors);
        //                 var arr_val = Object.values(data.errors);
        //                 for(var i= 0;i < arr.length;i++){
        //                 $('.'+arr[i]+'-error').text(arr_val[i][0])
        //                 }
        //             }else if(data.error || data.error == 'true'){
        //                 var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
        //                 $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
        //             }else{
        //                 // empty the form
        //                 $('#kk_modal_new_question_des_form')[0].reset();
        //                 $("#kk_modal_new_question_des").modal('hide');

        //                 Swal.fire({
        //                         text: data.message,
        //                         icon: "success",
        //                         buttonsStyling: !1,
        //                         confirmButtonText: "{{__('Ok, got it!')}}",
        //                         customClass: {
        //                             confirmButton: "btn fw-bold btn-primary"
        //                         }
        //                     }).then((function () {
        //                         //refresh datatable
        //                         $('#dataTable').DataTable().ajax.reload();
        //                     }))
        //             }

        //         $('.indicator-label').show()
        //         $('.indicator-progress').hide()
        //         $('#kk_modal_new_service_submit').removeAttr('disabled')

        //         }
        //   });

        // })

        //view count
        // $('.view').on('click', function(){
        //     var id = $(this).data('id')
        //     //alert(id)
        //     $.ajax({
        //         type:"GET",
        //         url: "{{ url('question/view-count')}}"+'/'+id,
        //         dataType: 'json',
        //         success:function(data){
                    
        //         }
        //     })
        // });

            
        //vote
        // $('.vote').on('click', function(){
        //     var id = $(this).data('id')
        //     var val = $(this).text()
        //     $(this).html(`<i class="fas fa-heart"></i>`+(parseInt(val)+1))
        //     //alert(id)
        //     $.ajax({
        //         type:"GET",
        //         url: "{{ url('question/vote')}}"+'/'+id,
        //         dataType: 'json',
        //         success:function(data){
        //             toastr.success(data.message);
        //         }
        //     })
        // });

        //like description
        // $('.like').on('click', function(){
        //     var id = $(this).data('id')
        //     var val = $(this).text()
        //     //console.log(val)
        //     $(this).html(`<i class="fas fa-thumbs-up"></i>`+(parseInt(val)+1))
        //     $.ajax({
        //         type:"GET",
        //         url: "{{ url('description/vote')}}"+'/'+id,
        //         dataType: 'json',
        //         success:function(data){
        //             if(data.success){
        //                 toastr.success(data.message)
        //             }else{
        //                 toastr.error(data.message)
        //             }
        //         }
        //     })
        // });

        

        //bookmarks
        // $('.bookmark').on('click', function(){
        //     var id = $(this).data('id')
        //     var catid = $(this).data('catid')
        //     $(this).children().addClass('svg-icon-primary');
        //     //alert(id)
        //     $.ajax({
        //         type:"GET",
        //         url: "{{ url('question/bookmark')}}"+'/'+id+'/'+catid,
        //         dataType: 'json',
        //         success:function(data){
        //             if(data.success){
        //                 Swal.fire({
        //                 text: data.message,
        //                 icon: "success",
                        
        //             })
        //             }else{
        //                 Swal.fire({
        //                 text: data.message,
        //                 icon: "error",
                        
        //                 })
        //             }
                           
        //         }
        //     })
        // });

    </script> --}}
@endpush
