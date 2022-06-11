@extends('layouts.app')
@section('title', 'Exam')

@section('toolbar')
<!--start::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Exam </h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Model Test</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Model Test Question</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid col-12" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header py-10 d-flex flex-column justify-content-center align-items-center">
                        <h3 class="card-title">Exam Name : {{$exam->name}}</h3>
                    </div>
                    <div class="card-header fw-bold d-flex justify-content-between py-3 px-5">
                        <div class="left">
                            <p>Total Question: {{ $exam->number_of_question }}</p>
                            <p>Total Mark: {{ $exam->mark }}</p>
                            <p>Cut Mark: {{ $exam->cut_mark }}</p>
                            <p>Negative Mark: {{ $exam->negative_mark }}</p>
                        </div>
                        <div class="right">
                            <p>Duration: {{ $exam->duration }}</p>
                            <p>Time: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('g:i:s A') }}</p>
                            <p>Date: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('d-m-Y ') }}</p>
                            
                        </div>
                    </div>
                   
                    <div class="card-body">
                        @foreach ($exam_results as $key => $exam) 
                        
                            @isset($exam->submitted_data)
                            @foreach ($exam->submitted_data as $ques_id) 
            
                                @php
                                    $questin_ids = (object)$ques_id;
                                   
                                    $questions = App\Models\Question::with('question_option')->where('id', $questin_ids->question_id)->get();
                                
                                    $questions = App\Models\Question::with('question_option')
                                        ->where('id', $questin_ids->question_id)
                                        ->get();
                                @endphp

                                @foreach($questions as $question)
                                    <div class="col-md-6 ">
                                        <div class="card card-bordered mb-5">
                                            <div class="card-header card-success">
                                                <h3 class="card-title text-gray-700 fw-bolder cursor-default mb-0 question" data-id="{{ $question->id }}" data-passage_id="{{ $question->passage_id }}">
                                                        <span > {{ $question->id }}. {{$question->question}} </span>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row"  style="font-size: 16px">
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-option="1"> 
                                                            <span ><i class="{{ $question->question_option->answer == 1 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->question_option->option_1 }}
                                                        </p>
                                                        @if($question->question_type == 'image')
                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                            <span class="symbol-label">
                                                                <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-option="2"> 
                                                            <span> <i class="{{ $question->question_option->answer == 2 ? 'fas' : 'far' }} fa-circle fa-2xl"></i> </span> {{$question->question_option->option_2}}
                                                        </p>
                                                        @if($question->question_type == 'image')
                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                            <span class="symbol-label">
                                                                <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-option="3"> 
                                                            <span ><i class="{{ $question->question_option->answer == 3 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->question_option->option_3 }}
                                                        </p>
                                                        @if($question->question_type == 'image')
                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                            <span class="symbol-label">
                                                                <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-option="4" > 
                                                            <span ><i class="{{ $question->question_option->answer == 4 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->question_option->option_4 }}
                                                        </p>
                                                        @if($question->question_type == 'image')
                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                            <span class="symbol-label">
                                                                <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                                
                            @endforeach
                            @endif
                        @endforeach
                    </div>
                   
                </div>
            </div>
            
        </div>
              
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
    
@endsection

