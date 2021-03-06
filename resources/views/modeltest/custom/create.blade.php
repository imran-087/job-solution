@extends('layouts.app')
@section('title', 'Model test')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Exam</h1>
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
                <li class="breadcrumb-item text-dark">Model Test</li>
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
        <div class="card" style="margin-top:20px">
            <!--begin::Card body-->
            <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                <!--begin:Form-->
                <form id="kk_custom_model_test_generator_form" class="form"  method="GET" action="{{ route('custom.test.data') }}" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    {{-- @csrf --}}
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3 mt-3">Create Your Custom Model Test</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <div class="col-md-6 offset-3 text-center mb-10">
                        @if(Session::has('cut_mark'))
                            <p class="alert alert-danger fw-bold text-uppercase">{{ Session::get('cut_mark') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6 offset-3 text-center mb-10">
                        @if(Session::has('insufficent_data'))
                            <p class="alert alert-danger fw-bold text-uppercase">{{ Session::get('insufficent_data') }}</p>
                        @endif
                    </div>

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select main category" name="main_category"
                                id="main_category" required>
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
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select category" name="category"
                                id="category" required>


                            </select>
                            <div class="help-block with-errors catgory-error"></div>
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
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-hide-search="true" data-placeholder="Select subject" name="subject"
                                id="subject" required>


                            </select>
                            <div class="help-block with-errors subject-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="row g-9 mb-8">
                        <div class="col-md-2 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required" >Number of Question </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid  @error('number_of_question') is-invalid @enderror" placeholder="Number of Ques." name="number_of_question" value="{{ old('number_of_question') }}" />
                             @error('number_of_question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-2 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Total Mark</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid 
                            @error('total_mark') is-invalid @enderror" placeholder="Enter Mark" name="total_mark" value="{{ old('total_mark') }}"/>
                            @error('total_mark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <!-- end: col-->
                        <div class="col-md-2 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="" >Cut Mark </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid " placeholder="Cut mark" name="cut_mark"  value="{{ old('cut_mark') }}" />
                            
                        </div>
                        <!-- end: col-->
                        <div class="col-md-2 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="" >Negative Mark</span>
                            </label>
                            <!--end::Label-->
                           
                            <select class="form-select form-select-solid @error('negative_mark') is-invalid @enderror"" data-control="select2"
                                data-hide-search="true" name="negative_mark"
                                id="negative_mark" required>
                                <option value="0" {{ old("negative_mark") == '0' ? "selected":"" }}>0.00</option>
                                <option value="0.25" {{ old("negative_mark") == '0.25' ? "selected":"" }}>0.25</option>
                                <option value="0.50" {{ old("negative_mark") == '0.50' ? "selected":"" }}>0.50</option>
                                <option value="1" {{ old("negative_mark") == '1' ? "selected":"" }}>1.00</option>
                            </select>
                        
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
                                <span class="required">Exam Duration</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input group-->
                            <div class="input-group mb-5">
                                <input type="text" class="form-control  
                                @error('duration') is-invalid @enderror" placeholder="15" name="duration" value="{{ old('duration') }}"/>
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
                    </div>

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



@endsection

@push('script')
   <script type="text/javascript">
    // Get Category 
    $('#main_category').on('change', function () {
        var mainCategoryID = $(this).val();
        if (mainCategoryID) {
            $.ajax({
                url: '/get-category/' + mainCategoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#parent').empty();
                        $('#category').empty();
                        $('#category').append('<option value="">Choose...</option>');
                        $.each(data, function (key, category) {
                            $('select[name="category"]').append(
                                '<option value="' + category
                                .id + '">' + category
                                .name + '</option>');
                        });
                    } else {
                        $('#category').empty();
                    }
                }
            });
        } else {
            $('#category').empty();
        }
    });

    // Get Sub Category
    $('#category').on('change', function () {
        var categoryID = $(this).val();
        if (categoryID) {
            $.ajax({
                url: '/get-sub-category/' + categoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Choose...</option>');
                        $.each(data, function (key, sub_category) {
                            $('select[name="sub_category"]').append(
                                '<option value="' + sub_category.id + '">' + sub_category.name + '</option>');
                        });
                    }
                        else {
                        $('#sub_category').empty(); 
                    }
                }
            });
        } else {
            $('#sub_category').empty();
        }
    });

   // Get Subject
    $('#sub_category').on('change', function () {
        var subCategoryID = $(this).val();
        if (subCategoryID) {
            $.ajax({
                url: '/get-subject/' + subCategoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Choose...</option>');
                        $.each(data, function (key, subject) {
                            if(subject.sub_category){
                                $('select[name="subject"]').append(
                                '<option value="' + subject.id + '">' + subject.name   + ' - ' + subject.sub_category.name +'</option>');
                            }else{
                                $('select[name="subject"]').append(
                                '<option value="' + subject.id + '">' + subject.name   +' - '+ subject.main_category.name + '</option>');
                            }
                            
                        });
                    }
                        else {
                        $('#subject').empty(); 
                    }
                }
            });
        } else {
            $('#subject').empty();
        }
    });
   </script>
@endpush