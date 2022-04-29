@extends('admin.layout.app')
@section('title', 'Edit-Question')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question </h1>
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
                    <li class="breadcrumb-item text-muted">Question Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Update Question</li>
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
                        action="{{ route('admin.question.update') }}" enctype="multipart/form-data">
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
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                                <select class="form-select form-select-solid @error('main_category') is-invalid @enderror" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select main category" name="main_category"
                                    id="main_category">
                                    <option value="">Choose ...</option>
                                    
                                    @foreach ($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}"
                                        @if($question->main_category_id == $main_category->id) selected @endif>
                                        {{ $main_category->name }}</option>
                                    @endforeach

                                </select>
                                @error('main_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Category</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select category" name="category"
                                    id="category">


                                </select>
                                
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                <select class="form-select form-select-solid @error('sub_category') is-invalid @enderror" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
                                    id="sub_category">

                                    @if(isset($sub_category))
                                    <option  value="{{ $sub_category->id }}" >
                                        {{ $sub_category->name }}
                                    </option>
                                     @endif

                                </select>
                                @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="" name="subject"
                                    id="Subject">
                                    @foreach($subjects as $subject)
                                    <option  value="{{ $subject->id }}"
                                        @if(isset($question))
                                            @if($subject->id == $question->subject_id) selected
                                            @endif
                                        @endif
                                        >
                                        {{ $subject->name }}
                                    </option>
                                    @endforeach

                                </select>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                       
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                           
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Year</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="" name="year"
                                    id="year">
                                    @foreach($years as $year)
                                    <option  value="{{ $year->id }}"
                                        @if(isset($question))
                                            @if($year->id == $question->year_id) selected
                                            @endif
                                        @endif
                                        >
                                        {{ $year->year }}
                                    </option>
                                    @endforeach

                                </select>
                                <div class="help-block with-errors category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                           
                        </div>
                        <!--end::Input group-->

                        

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
                        
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Option 1</label>
                                <div class="form-check form-check-inline">                
                                    <input class="form-check-input" type="radio" name="answer"  value="1" @isset($question->question_option->answer)
                                        @if($question->question_option->answer == '1') checked @endif @endisset>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                        name="option_1" value="{{ $question_option->option_1 }}" />
                                       
                                </div>
                                @if($question->question_type == 'image')
                                <div class="form-check form-check-inline d-flex">
                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                        <span class="symbol-label">
                                            <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <input type="file" name="image[]" class="mt-2" value="{{$question->question_option->image_option[0]}}">
                                    <input type="hidden" name="old_image[]" class="mt-2" value="{{$question->question_option->image_option['0']}}">
                                    
                                </div>
                                @endif
                               
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Option 2</label>
                                <div class="form-check form-check-inline">                
                                    <input class="form-check-input" type="radio" name="answer"  value="2" @isset($question->question_option->answer)
                                        @if($question->question_option->answer == '2') checked @endif @endisset>
                                   <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                    name="option_2" value="{{ $question_option->option_2 }}" />
                                   
                                </div>
                                @if($question->question_type == 'image')
                                <div class="form-check form-check-inline d-flex">
                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                        <span class="symbol-label">
                                            <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <input type="file" name="image[]" class="mt-2" value="{{$question->question_option->image_option[1]}}">
                                    <input type="hidden" name="old_image[]" class="mt-2" value="{{$question->question_option->image_option['1']}}">
                                    
                                </div>
                                @endif
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Option 3</label>
                                <div class="form-check form-check-inline">                
                                    <input class="form-check-input" type="radio" name="answer"  value="3" @isset($question->question_option->answer)
                                        @if($question->question_option->answer == '3') checked @endif @endisset>
                                   <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                    name="option_3" value="{{ $question_option->option_3 }}" />
                               
                                </div>
                                @if($question->question_type == 'image')
                                <div class="form-check form-check-inline d-flex">
                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                        <span class="symbol-label">
                                            <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <input type="file" name="image[]" class="mt-2" value="{{$question->question_option->image_option[2]}}">
                                    <input type="hidden" name="old_image[]" class="mt-2" value="{{$question->question_option->image_option['2']}}">
                                </div>
                                @endif
                                
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Option 4</label>
                                <div class="form-check form-check-inline">                
                                    <input class="form-check-input" type="radio" name="answer"  value="4" @isset($question->question_option->answer)
                                        @if($question->question_option->answer == '4') checked @endif @endisset>
                                   <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                    name="option_4" value="{{ $question_option->option_4 }}" />
                                     
                                </div>
                                @if($question->question_type == 'image')
                                <div class="form-check form-check-inline d-flex">
                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                        <span class="symbol-label">
                                            <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <input type="file" name="image[]" class="mt-2" value="{{$question->question_option->image_option['3']}}">
                                    <input type="hidden" name="old_image[]" class="mt-2" value="{{$question->question_option->image_option['3']}}">
                                    
                                </div>
                                @endif
                               
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Input group-->
                       
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            {{-- <div class="col-md-2 fv-row">
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
                            </div> --}}
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-10 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Description</label>
                                <textarea name="description" id="kt_docs_ckeditor_classic" class="form-control form-control-solid h-100px" placeholder="You can add description here..."></textarea>
                                <div class="help-block with-errors description-error"></div>
                            </div>
                        </div>
                        <!--end::Input group-->

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
</div>

@endsection

