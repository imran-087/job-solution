@extends('layouts.app')
@section('title', 'Question')

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
                <li class="breadcrumb-item text-dark">Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Edit Question</li>
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
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">

                </div>
                <!--begin::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin:Form-->
                <form id="kk_modal_new_passage_form" class="form" method="POST"
                    action="{{ route('question.update-question') }}" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Update Question</h1>
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
                            <span class="required">Question </span>
                        </label>
                        <!--end::Label-->
                        <input type="hidden" name="id" value="{{ $question->id }}" />
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                            name="question" value="{{ $question->question }}" />
                        <div class="help-block with-errors title-error"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Include-->
                    @if(isset($question))
                    @if($question->question_type == 'written')
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Answer</span>
                        </label>
                        <!--end::Label-->
                        <textarea name="written_answer" class="form-control form-control-solid h-100px">{{ $question_option->written_answer }}</textarea>
                        <div class="help-block with-errors description-error"></div>
                    </div>
                    <!--end::Input group-->
                    @elseif($question->question_type == 'samprotik')
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Answer</span>
                        </label>
                        <!--end::Label-->
                        <input name="answer" class="form-control form-control-solid " value="{{ $question_option->answer }}">
                        <div class="help-block with-errors description-error"></div>
                    </div>
                    <!--end::Input group-->
                    @else
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Option 1</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                            name="option_1" value="{{ $question_option->option_1 }}" />
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Option 2</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                            name="option_2" value="{{ $question_option->option_2 }}" />
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Option 3</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                            name="option_3" value="{{ $question_option->option_3 }}" />
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Option 4</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                            name="option_4" value="{{ $question_option->option_4 }}" />
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        
                    </div>
                    <!--end::Input group-->
                    
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Answer</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-hide-search="true" data-placeholder="" name="answer"
                                id="answer">
                                <option value="1"
                                @if(isset($question_options))
                                    @if($question_options->mcq_answer == 1) selected 
                                    @endif
                                @endif
                                > Option 1 </option>
                                <option value="2"
                                @if(isset($question_options))
                                    @if($question_options->mcq_answer == 2) selected 
                                    @endif
                                @endif
                                > Option 2 </option>
                                <option value="3"
                                @if(isset($question_options))
                                    @if($question_options->mcq_answer == 3) selected 
                                    @endif
                                @endif
                                > Option 3 </option>
                                <option value="4"
                                @if(isset($question_options))
                                    @if($question_options->mcq_answer == 4) selected 
                                    @endif
                                @endif
                                > Option 4 </option>
                                <option value="5"
                                @if(isset($question_options))
                                    @if($question_options->mcq_answer == 5) selected 
                                    @endif
                                @endif
                                > Option 5 </option>

                            </select>
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    @endif
                    @endif
                    
                    
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end">
                            <span class="indicator-label">Update</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
