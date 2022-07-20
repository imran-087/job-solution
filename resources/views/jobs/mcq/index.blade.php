
@extends('layouts.app')
@section('title', 'Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex  flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">MCQ Question</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('/home') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Dashboard</li>
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
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
       <div class="card card-bordered mb-5 py-5 px-5">
            @isset($sub_category)
            <div class="card card-bordered mb-5 py-5 px-5">
                <div class=" d-flex flex-column align-items-center justify-content-center ">
                    <h3 class="">{{$sub_category->name}}</h3>
                    <h5 class="">সাল ঃ {{ $sub_category->year->year }}</h5>
                </div>
            </div>
            @endisset

            @php $serial_number = 1; @endphp
            @if($questions->count() > 0)
            @foreach($questions as $key => $question)
                <div class="card card-bordered mb-5 py-3 px-2">
                    <div class="d-flex flex-column align-items-center justify-content-center ">
                        <h3 class="">বিষয় ঃ {{$question->subject->name}}</h3>
                    </div>
                    <div class="card-body">
                        @php
                        $subject_questions = App\Models\Question::with('question_option', 'descriptions')
                            ->where([
                                'subject_id' => $question->subject_id,
                                'passage_id' => 0,
                                'sub_category_id' => $sub_category->id
                                ])->get();
                        @endphp
                        <div class="row">
                        @foreach($subject_questions as $key => $question)
                            <div class="col-md-6">
                                <div class="card card-bordered mb-5">
                                    <div class="card-header">
                                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                <span > {{ $serial_number }}. {{$question->question}} </span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <a href="{{route('admin.question.edit', ['id' => $question->id, 'ques' => $question->slug])}}" target="_blank" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit me-1" ><i class="fas fa-edit"></i></a>
                                            <!--end::Menu-->

                                            <!--begin::Menu-->
                                            <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold delete"><i class="fas fa-trash"></i></a>
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{-- question image start--}}
                                        <div class="text-center mb-3">
                                            @if($question->question_type == 'image')
                                            @isset($question->question_option->image_question)
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_question) }}" class="h-150 align-self-center" alt="">
                                                    </span>
                                                </div>
                                            @endisset
                                            @endif
                                        </div>
                                        {{-- question image end  --}}

                                        <div class="row"  style="font-size: 16px">
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 1)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_1 }}</p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 2)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_2}}</p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold">
                                                <span >
                                                    @if($question->question_option->answer == 3)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_3 }}</p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                            </div>
                                            @isset($question->question_option->option_4)
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 4)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{ $question->question_option->option_4 }}</p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                            </div>
                                            @endisset
                                            @isset($question->question_option->option_5)
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 5)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{ $question->question_option->option_5 }}</p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                            </div>
                                            @endisset
                                        </div>

                                        {{--  Question Tag --}}
                                        @foreach($question->subjects as $tag)
                                            <span class="badge badge-success fs-7 mb-3 tag">{{ $tag->name }}<span class="ms-2 cursor-pointer d-none text-danger fs-5 X" data-id={{ $tag->id }}>X</span></span>
                                        @endforeach
                                        {{-- </div> --}}
                                        <!-- Start: description add -->
                                        <span class="description">
                                            <div class="row mb-2">

                                                <span class="d-flex justify-content-between">
                                                
                                                    <span class="view-description cursor-pointer"><i class="fas fa-eye fa-2xl"></i> <span class="fw-bolder fs-5">Description</span> </span>
                                                    <span class="add-description cursor-pointer" data-question_id="{{ $question->id }}"><i class="fas fa-eye fa-2xl"></i> <span class="fw-bolder fs-5">Comment</span> </span>                     
                                                                
                                                </span>
                                            
                                            </div>
                                            <div class="row">
                                                @if($question->descriptions->count() > 0)
                                                <!--begin::Accordion-->
                                                <div class="accordion d-none" id="kt_accordion_1">
                                                
                                                    @foreach($question->descriptions as $description)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="kt_accordion_1_header_{{$key}}">
                                                            <button class="accordion-button fs-6 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_{{$key}}" aria-expanded="true" aria-controls="kt_accordion_1_body_{{$key}}">
                                                            Description Item #{{$key+1}}
                                                            </button>
                                                        </h2>
                                                        <div id="kt_accordion_1_body_{{$key}}" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_{{$key}}" data-bs-parent="#kt_accordion_1">
                                                            <div class="accordion-body">
                                                                {{ $description->description }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                
                                                </div>
                                                @endif
                                            </div>
                                        </span>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            @php $serial_number++ ; @endphp
                        @endforeach
                        </div>
                    </div>
                </div>

            @endforeach
            @else
            <div class="card card-bordered mb-5">
                    <div class="card-header d-flex align-items-center justify-content-center ">
                        <h3 class="text-danger">No Question found !!!</h3>
                    </div>
            </div>
            @endif

            @if($passages->count() > 0)
            <div class="col-md-12">
                <!--begin::apassage question-->
                <div class="row" >
                    @foreach($passages as $key => $passage)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bordered mb-5">
                                <div class="card-header p-10">

                                    <h3 class="card-title text-gray-700  mb-0 view">
                                        <span ><span class="fs-3 fw-bold" style="color: black">Read the passage and answer the following question :</span><br> {!! $passage->passage !!} </span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    @foreach($passage->questions as $question)

                                    <div class="col-md-6">
                                        <div class="card card-bordered mb-5">
                                            <div class="card-header">
                                                <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                        <span > {{ $serial_number }}. {{$question->question}} </span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <!--begin::Menu-->
                                                    <a href="{{route('admin.question.edit', ['id' => $question->id, 'ques' => $question->slug])}}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit" ><i class="fas fa-edit"></i></a>
                                                    <!--end::Menu-->
                                                </div>

                                            </div>
                                            <div class="card-body">
                                                <div class="row"  style="font-size: 16px">
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold " >
                                                        <span >
                                                            @if($question->question_option->answer == 1)
                                                            <i class="fas fa-check-circle fa-2xl"></i>
                                                            @else
                                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                                            @endif
                                                        </span> {{$question->question_option->option_1 }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold " >
                                                        <span >
                                                            @if($question->question_option->answer == 2)
                                                            <i class="fas fa-check-circle fa-2xl"></i>
                                                            @else
                                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                                            @endif
                                                        </span> {{$question->question_option->option_2}}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold " >
                                                        <span >
                                                            @if($question->question_option->answer == 3)
                                                            <i class="fas fa-check-circle fa-2xl"></i>
                                                            @else
                                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                                            @endif
                                                            </span> {{$question->question_option->option_3 }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold " >
                                                        <span >
                                                            @if($question->question_option->answer == 4)
                                                            <i class="fas fa-check-circle fa-2xl"></i>
                                                            @else
                                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                                            @endif
                                                            </span> {{$question->question_option->option_4 }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $serial_number++ ; @endphp
                                    @endforeach
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <!--end::passage question-->
            </div>
            @endif

        </div>
    </div>
</div>
<!---end::Post -->

@include('question.include.add_bookmark_modal')

@endsection

@push('script')
   
    @include('common.page_script')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.view-description').on('click', function(){
                console.log('click')
                $(this).parents('span.description').closest('div').find('.accordion').toggleClass('d-none');
            })
        })
    </script>
@endpush
