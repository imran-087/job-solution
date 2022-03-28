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
                    <li class="breadcrumb-item text-muted">Question Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create Question</li>
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
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                
                <!--begin::Card body-->
                <div class="card-body pt-4  " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_passage_form" class="form" method="POST" action="{{ route('admin.question.question-input') }}" enctype="multipart/form-data">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                       
                        <!--begin::Input group-->
                        <div class="row g-9 ">
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                <!--begin::Label-->
                                {{-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Number of Question</span>
                                </label> --}}
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Number of Question"
                                    name="question" />
                                @error('question')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                <!--begin::Label-->
                                {{-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Number of Option</span>
                                </label> --}}
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Number of Option [1 - 5]"
                                    name="option" />
                                @error('option')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 fv-row">
                                {{-- <label class="required fs-6 fw-bold mb-2">Question Type</label> --}}
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select question type" name="type">
                                    
                                    <option value="mcq" selected>MCQ Question</option>
                                    <option value="written">Written Question</option>
                                    <option value="image">Image Question</option>
                                    <option value="samprotik">Samprotik Question</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-6 fv-row">
                                <!--begin::Actions-->
                                <label class="fs-6 fw-bold mb-2"></label>
                                <button type="submit"  class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                </button>
                                <!--end::Actions-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            
                        </div>
                        <!--end::Input group-->
                       <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                       
                        </div>
                        <!--end::Input group-->

                        
                    </form>
                    <!--end:Form-->
                    
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
             <!--begin::Card-->
            <div class="card mt-7">
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
                        action="{{ route('admin.question.preview-store') }}" enctype="multipart/form-data">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf

                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Create Question</h1>
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
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select main category" name="main_category"
                                    id="main_category">
                                    <option value="">Choose ...</option>
                                    @foreach ($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                    @endforeach

                                </select>
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Category</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select category" name="category"
                                    id="category">


                                </select>
                                <div class="help-block with-errors category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
                                    id="sub_category">


                                </select>
                                <div class="help-block with-errors sub_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select subject" name="subject"
                                    id="subject">


                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Year</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select year" name="year"
                                    id="year">
                                    <option value="">Choose ...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach

                                </select>
                                <div class="help-block with-errors year-error"></div>
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Input group-->

                        <!--begin::Include-->
                        @if($type == 'written')
                            @include('admin.question.written_layout')
                        @else
                            @include('admin.question.mcq_layout')
                        @endif
                        <!--end::Include-->
                       
                        <!--begin::Actions-->
                        <div class="text-center d-flex justify-content-end" >
                            <button type="submit" class="btn btn-primary" style="padding: 10px 70px">
                                <span class="indicator-label">Submit</span>
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

