@extends('admin.layout.app')
@section('title', 'Written-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
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
                    <li class="breadcrumb-item text-muted">Written Question</li>
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
            <div class="card" style="margin-top:20px">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.written.parent-instruction.store') }}">
                        <div class="messages"></div> 
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Question Parent  Instruction</h1>
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
                                <select class="form-select form-select-solid @error('main_category') is-invalid @enderror" data-control="select2" data-hide-search="true" data-placeholder="Select main category" name="main_category" id="main_category">
                                    <option value="">Choose ...</option>

                                    @foreach ($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
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
                                <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select category" name="category" id="category">


                                </select>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                <select class="form-select form-select-solid @error('sub_category') is-invalid @enderror" data-control="select2" data-hide-search="true" data-placeholder="Select sub category" name="sub_category" id="sub_category">


                                </select>
                                @error('sub_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                           
                        </div>
                        <!--end::Input group-->
                        
                        <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
                            <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                                <!--begin::Input group-->
                                <div class="row g-9 pb-4"> 
                                    <div> 
                                        <div class="row">
                                            <div class="col-md-1">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <div class="required">IN. </div>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="INo." name="instruction_no" /> 
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <div class="required">Parent Question Instruction </div>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="instruction" /> 
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <div class="required">Mark</div>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="Total Mark" name="mark" /> 
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                    
                                    </div> 
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center d-flex justify-content-end py-4 px-4" >
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

