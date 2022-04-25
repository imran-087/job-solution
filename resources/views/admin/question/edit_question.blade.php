@extends('admin.layout.app')
@section('title', 'Question')

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
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Sub Ctargory</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="" name="sub_category"
                                    id="sub_category">
                                    @if(isset($sub_category))
                                    <option  value="{{ $sub_category->id }}" >
                                        {{ $sub_category->name }}
                                    </option>
                                     @endif

                                </select>
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Subject</label>
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
                                <div class="help-block with-errors category-error"></div>
                            </div>
                            <!--end::Col-->
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
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Passage</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select passage" name="passage"
                                    id="passage">
                                    @if($question->passage_id != '')
                                    @foreach($passages as $passage)
                                    <option  value="{{ $passage->id }}"
                                        @if(isset($question))
                                            @if($passage->id == $question->passage_id) selected
                                            @endif
                                        @endif
                                        >
                                        {{ $passage->title }}
                                    </option>
                                    @endforeach
                                    @else
                                    <option value=""></option>
                                    @foreach($passages as $passage)
                                    <option  value="{{ $passage->id }}"
                                        @if(isset($question))
                                            @if($passage->id == $question->passage_id) selected
                                            @endif
                                        @endif
                                        >
                                        {{ $passage->title }}
                                    </option>
                                    @endforeach
                                    @endif

                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Question Type</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="question_type"
                                    id="type">
                                     <option value="mcq"
                                    @if(isset($question))
                                        @if($question->question_type == 'mcq') selected 
                                        @endif
                                    @endif
                                    > MCQ </option>
                                    <option value="written"
                                    @if(isset($question))
                                        @if($question->question_type == 'written') selected 
                                        @endif
                                    @endif 
                                    >Written </option>
                                    <option value="image"
                                    @if(isset($question))
                                        @if($question->question_type == 'image') selected 
                                        @endif
                                    @endif 
                                    >Image </option>

                                </select>
                                <div class="help-block with-errors sub_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                               <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Mark </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter mark"
                                    name="mark" value="{{ $question->mark }}" />
                                <div class="help-block with-errors title-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Hard Level</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="hard_level"
                                    id="lard_level">
                                    <option value="easy"
                                    @if(isset($question))
                                        @if($question->hard_level == 'easy') selected 
                                        @endif
                                    @endif
                                    > Easy </option>
                                    <option value="medium"
                                    @if(isset($question))
                                        @if($question->hard_level == 'medium') selected 
                                        @endif
                                    @endif
                                    > Medium </option>
                                    <option value="hard"
                                    @if(isset($question))
                                        @if($question->hard_level == 'hard') selected 
                                        @endif
                                    @endif
                                    > Hard </option>

                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Editable</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="future_editable"
                                    id="future_editable">
                                    <option value="editable"
                                    @if(isset($question))
                                        @if($question->future_editable == 'editable') selected 
                                        @endif
                                    @endif    
                                    > Editable </option>
                                    <option value="noteditable"
                                    @if(isset($question))
                                        @if($question->future_editable == 'noteditable') selected 
                                        @endif
                                    @endif
                                    > Not Editable </option>

                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">lock</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="lock_status"
                                    id="lock">
                                    <option value="lock"
                                    @if(isset($question))
                                        @if($question->lock_status == 'lock') selected 
                                        @endif   
                                    @endif
                                    >Lock </option>
                                    <option value="unlock"
                                    @if(isset($question))
                                        @if($question->lock_status == 'unlock') selected 
                                        @endif
                                    @endif
                                    >Unlock </option>

                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                            
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Status</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="" name="status"
                                    id="status">
                                    <option value="active"
                                    @if(isset($question))
                                        @if($question->status == 'active') selected 
                                        @endif
                                    @endif
                                    > Active </option>
                                    <option value="deactive"
                                    @if(isset($question))
                                        @if($question->status == 'deactive') selected 
                                        @endif
                                     @endif
                                    > Deactive </option>
                                    <option value="pending"
                                    @if(isset($question))
                                        @if($question->status == 'pending') selected 
                                        @endif
                                     @endif
                                    > Pending </option>
                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
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
                            <div class="col-md-2 fv-row">
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
                            <!--begin::Col-->
                            <div class="col-md-10 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Description</label>
                                <textarea name="description" id="kt_docs_ckeditor_classic" class="form-control form-control-solid h-100px" placeholder="You can add description here..."></textarea>
                                <div class="help-block with-errors description-error"></div>
                            </div>
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
</div>

@endsection

