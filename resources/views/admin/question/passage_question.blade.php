@extends('admin.layout.app')
@section('title', 'Samprotik-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
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
                    <li class="breadcrumb-item text-muted">Samprotik Question</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
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

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
           <!--begin::Card-->
            <div class="card mb-5">
                
            </div>
            <!--end::Card--> 
            <!--begin::apassage question-->    
            <div class="row" id="all_question">
                @foreach($passages as $key => $passage)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-bordered mb-5">
                            <div class="card-header p-4">
                                <h4>Read the passage and answer the following question:</h4>
                                <h3 class="card-title text-gray-700  cursor-pointer mb-0 view"  style="max-width: 1100px !important; line-height:24px">
                                        <span > {!! $passage->passage !!} </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                @foreach($passage->questions as $question)
                                
                                <div class="col-md-6">
                                    <div class="card card-bordered mb-5">
                                        <div class="card-header">
                                            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                    <span > {{ $question->id }}. {{$question->question}} </span>
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
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection






