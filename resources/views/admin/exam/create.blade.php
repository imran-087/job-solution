@extends('admin.layout.app')
@section('title', 'Exam - Create exam')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Exam</h1>
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
                    <li class="breadcrumb-item text-muted">Create Exam</li>
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
            <div class="card" >
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_mcq_form" class="form"  method="POST" action="{{ route('admin.exam.store') }}" enctype="multipart/form-data">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Create Exam</h1>
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
                                <label class="required fs-6 fw-bold mb-2">Select Category</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select category" name="category"
                                    id="category" required>
                                    <option value="">Choose ...</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors category-error"></div>
                            </div>
                            <!--end::Col-->
                            
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
                                    id="sub_category" required>


                                </select>
                                <div class="help-block with-errors sub_category-error"></div>
                            </div>
                            <!--end::Col-->
                        
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Exam Name</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter exam name" name="name" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row">
                                <label class="required fs-6 fw-bold mb-2">Examinee Type</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select ..." name="examinee_type"
                                    id="examinee_type" required>
                                    <option value=""></option>
                                    <option value="user">User (free)</option>
                                    <option value="subscriber">Subscriber (paid)</option>
                                </select>
                                <div class="help-block with-errors examinee_type-error"></div>
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row">
                                <label class="required fs-6 fw-bold mb-2">Exam Mode</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select ..." name="exam_mode"
                                    id="exam_mode" required>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                                <div class="help-block with-errors exam_mode-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Number of Ques.</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid @error('number_of_question') is-invalid @enderror" placeholder="Number of Question" name="number_of_question" value="{{ old('number_of_question') }}"/>
                                @error('number_of_question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Mark</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('mark') is-invalid @enderror" placeholder="Enter Mark" name="mark" value="{{ old('mark') }}"/>
                                @error('mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Cut Mark</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('cut_mark') is-invalid @enderror" placeholder="Cut Mark" name="cut_mark" value="{{ old('cut_mark') }}"/>
                                @error('cut_mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Price</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price') }}"/>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Discount Price</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('discount_price') is-invalid @enderror" placeholder="Discount Price" name="discount_price" value="{{ old('discount_price') }}"/>
                                @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Negative Mark</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('negative_mark') is-invalid @enderror" placeholder="Negative Mark" name="negative_mark" value="{{ old('negative_mark') }}"/>
                                @error('negative_mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Required Point</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid 
                                @error('required_point') is-invalid @enderror" placeholder="Required Point" name="required_point" value="{{ old('required_point') }}"/>
                                @error('required_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->

                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Exam Duration</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="input-group mb-5">
                                    <input type="text" class="form-control  
                                    @error('duration') is-invalid @enderror" placeholder="" name="duration" value="{{ old('duration') }}"/>
                                    <span class="input-group-text">min</span>
                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Exam Start Time</span>
                                </label>
                                <!--end::Label-->
                                <input type="datetime-local" class="form-control form-control-solid 
                                @error('exam_staring_time') is-invalid @enderror" placeholder="Exam Start Time" name="exam_staring_time" value="{{ old('exam_staring_time') }}"/>
                                @error('exam_staring_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row">
                                <label class="required fs-6 fw-bold mb-2">Exam Status</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select ..." name="exam_status"
                                    id="exam_status" required>
                                    <option value="published">Published</option>
                                    <option value="unpublished">Unpublished</option>
                                    <option value="closed">Closed</option>
                                </select>
                                <div class="help-block with-errors exam_status-error"></div>
                            </div>
                            <!--end::Col-->
                           
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center d-flex justify-content-end py-4 px-4" >
                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary" style="padding: 10px 70px">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
