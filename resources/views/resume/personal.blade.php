@extends('layouts.app')

@section('title', 'Resume')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User</h1>
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
                <li class="breadcrumb-item text-dark">Resume</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Resume Management</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
         <div class="d-flex align-items-center gap-2 gap-lg-3">
            @guest
            <!--begin::Primary button-->
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary" id="readingMode" >Login</a>
            <!--end::Primary button-->
            @endguest
        </div>
    
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
         
        @include('resume.menubar')

        <div class="card mb-9">
            <div class="card-body">
                <!--begin::Accordion-->
                <div class="accordion" id="kt_accordion_1">

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                Personal Details
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_personal_details_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">First Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter First Name"
                                                    name="first_name" />
                                                <div class="help-block with-errors first_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Last Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Last Name"
                                                    name="last_name" />
                                                <div class="help-block with-errors last_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Father Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Father Name"
                                                    name="father_name" />
                                                <div class="help-block with-errors father_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Mother Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Mother Name"
                                                    name="mother_name" />
                                                <div class="help-block with-errors mother_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Date of Birth</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="Date of birth"
                                                    name="date_of_birth" />
                                                <div class="help-block with-errors date_of_birth-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Gender</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select Gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female" >Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="help-block with-errors gender-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Religion</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select Religion" name="religion">
                                                <option value="islam">Islam</option>
                                                <option value="hinduism" >Hinduism </option>
                                                <option value="christianity">Christianity</option>
                                                <option value="buddhism">Buddhism </option>
                                                <option value="judaism">Judaism</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="help-block with-errors religion-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-6 fw-bold mb-2">Maritial Status</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="marital_status">
                                                <option value="">Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married" >Married </option>
                                            </select>
                                            <div class="help-block with-errors marital_status-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Nationality</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your nationality"
                                                    name="nationality" />
                                                <div class="help-block with-errors nationality-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">National ID</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter NID No."
                                                    name="national_id" />
                                                <div class="help-block with-errors national_id-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Passport Number</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter passport no"
                                                    name="passport_no" />
                                                <div class="help-block with-errors passport_no-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Passport Issue Date</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="Enter passport issue date."
                                                    name="passport_issue_date" />
                                                <div class="help-block with-errors passport_issue_date-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Primary Mobile</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your primary mobile no. "
                                                    name="primary_mobile" />
                                                <div class="help-block with-errors primary_mobile-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Secondary Mobile</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your secondary mobile no."
                                                    name="secondary_mobile" />
                                                <div class="help-block with-errors secondary_mobile-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Email Address</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter email address"
                                                    name="email" />
                                                <div class="help-block with-errors email-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Blood Group</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select blood group" name="blood_group">
                                                <option value="a+">A(+ve)</option>
                                                <option value="a-" >A(-ve)</option>
                                                <option value="b+">B(+ve)</option>
                                                <option value="b-">B(-ve)</option>
                                                <option value="o+">O(+ve)</option>
                                                <option value="o-">O(-ve)</option>
                                                <option value="ab+">AB(+ve)</option>
                                                <option value="ab-">AB(-ve)</option>
                                            </select>
                                            <div class="help-block with-errors blood_group-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_modal_new_sub_category_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                            Address Details
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_address_details_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5 required">Present Address</div>
                                        <!--end::Description-->
                                        <div class="fs-6 fw-bold">
                                            <input class="form-check-input" type="radio" name="p_radiobtn"  value="bangladesh"> <span class="me-3">Inside Bangladesh</span>
                                            <input class="form-check-input" type="radio" name="p_radiobtn"  value="other"> Outside Bangladesh
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Country</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select country" name="p_country">
                                                <option value="bangladesh">Bangladesh</option>
                                                
                                            </select>
                                            <div class="help-block with-errors p_country-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">State</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select state" name="p_state">
                                                <option value="rajshahi">Rajshahi</option>
                                                
                                            </select>
                                            <div class="help-block with-errors p_state-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">City</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select city" name="p_city">
                                                <option value="rajshahi">Rajshahi</option>
                                                
                                            </select>
                                            <div class="help-block with-errors p_city-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-12">
                                        <input type="text" class="form-control form-control-solid" placeholder="Type your house no/road no/village" name="p_address" />
                                    </div>
                                    <!-- end: col-->

                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5 d-flex justify-content-between">
                                            <span>Permanent Address</span> 
        
                                            <div class="form-check form-check-custom form-check-solid text-black">
                                                <input class="form-check-input" type="checkbox" value="same" id="permanent_address">
                                                <label class="form-check-label ms-3" for="permanent_address">Same as Present Address</label>
                                            </div>
                                            
                                        </div>
                                        <!--end::Description-->
                                       
                                    </div>
                                    <!--end::Heading-->
                                    <span id="permanent_address_field">
                                        <div class="col-md-6 fv-row mb-5">
                                            <div class="fs-6 fw-bold">
                                                <input class="form-check-input" type="radio" name="radiobtn"  value="bangladesh"> <span class="me-3">Inside Bangladesh</span>
                                                <input class="form-check-input" type="radio" name="radiobtn"  value="other"> Outside Bangladesh
                                            </div>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-4">
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">Country</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select country" name="country">
                                                    <option value="bangladesh">Bangladesh</option>
                                                    
                                                </select>
                                                <div class="help-block with-errors country-error"></div>    
                                            </div>
                                            <!--begin::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">State</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select state" name="state">
                                                    <option value="rajshahi">Rajshahi</option>
                                                    
                                                </select>
                                                <div class="help-block with-errors state-error"></div>    
                                            </div>
                                            <!--begin::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">City</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select city" name="city">
                                                    <option value="rajshahi">Rajshahi</option>
                                                    
                                                </select>
                                                <div class="help-block with-errors city-error"></div>    
                                            </div>
                                            <!--begin::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row mb-9">
                                            <input type="text" class="form-control form-control-solid" placeholder="Type your house no/road no/village" name="address" />
                                        </div>
                                        <!-- end: col-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-between">
                                            <button type="reset" id="kk_address_detail_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                            <button type="submit" id="kk_address_detail_submit" class="btn btn-primary">
                                                <span class="indicator-label py-3 px-7">Save</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_3">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                Career and Application Information
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_career_application_info_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Objective</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Career objective" name="carrer_objective"></textarea>
                                        <div class="help-block with-errors carrer_objective-error"></div>   
                                    </div>
                                    <!-- end: col-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Current Salary</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Your current salary"
                                                    name="present_salary" />
                                                    <span class="fs-7">Tk/Month</span>
                                                <div class="help-block with-errors present_salary-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Expected Salary</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Your expected salary"
                                                    name="expected_salary" />
                                                    <span class="fs-7">Tk/Month</span>
                                                <div class="help-block with-errors expected_salary-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Looking For (Job Level)</span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="fs-6 fw-bold">
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="entry"> <span class="me-3"> Entry Level</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="mid"> <span class="me-3"> Mid Level</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="top"> <span class=""> Top Level</span>
                                                </div>
                                                <div class="help-block with-errors job_level-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Available For (Job Nature)</span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="fs-6 fw-bold">
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="full_time"> <span class="me-3"> Full Time</span>
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="part_time"> <span class="me-3"> Part Time</span>
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="contact"> <span class="me-3 "> Contract</span> <br>
                                                    <input class="form-check-input me-1" type="radio" name="job_nature"  value="internship"> <span class="me-3"> Internship</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_nature"  value="freelenace"> <span class=""> Freelance</span>
                                                </div>
                                                <div class="help-block with-errors job_nature-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_career_application_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_career_application_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_4">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_4" aria-expanded="false" aria-controls="kt_accordion_1_body_4">
                                Other Relevent Information
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_4" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_4" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_other_relavent_info_form" class="form" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="messages"></div>
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Career Summary</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter carrer summary" name="carrer_summery"></textarea>
                                        <div class="help-block with-errors carrer_summery-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Special Qualification</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter Special Qualification" name="special_qualification"></textarea>
                                        <div class="help-block with-errors special_qualification-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Keyword</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid " placeholder="Enter keyword" name="keyword">
                                        <div class="help-block with-errors keyword-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_other_relevent_info_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_other_relevent_info_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_5">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5" aria-expanded="false" aria-controls="kt_accordion_1_body_5">
                                Disability Information (if any)
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_5" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_5" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                               
                                <!--begin::Heading-->
                                <div class="mb-8">
                                    <!--begin::Description-->
                                    <div class="text-muted fw-bold fs-5 mb-5 required">Do you have National Disability ID Number?</div>
                                    <!--end::Description-->
                                    <div class="fs-6 fw-bold">
                                        <input class="form-check-input disability_id" type="radio" name="radiobtn"  value="yes"> <span class="me-3">Yes</span>
                                        <input class="form-check-input disability_id" type="radio" name="radiobtn"  value="no" checked> No
                                    </div>
                                </div>
                                <!--end::Heading-->
                                
                                <div class="border rounded mt-2 mb-8 no_disability">
                                    <p class="py-3 px-3 fs-6">If you are a person with disability and have no Disability ID Number, please contact i2i support +88 01730369802 by Call/ SMS/ WhatsApp</p>
                                </div>
                                <!--begin:Form-->
                                <form id="kk_disability_info_form" class="form d-none" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8 mt-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">National Disability ID</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter First Name"
                                                    name="disability_id" />
                                                <div class="help-block with-errors disability_id-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Show On Resume</span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="fs-6 fw-bold">
                                                    <input class="form-check-input" type="radio" name="show_on"  value="yes"> <span class="me-3">Yes</span>
                                                    <input class="form-check-input" type="radio" name="show_on"  value="no"> No
                                                </div>
                                                <div class="help-block with-errors show_on-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to see</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="see">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors see-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Hear</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="hear">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors hear-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Concentrate or remember  </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="remember">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors remember-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Sit, Stand, Walk or Climb Stairs </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="walk">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors other-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Communicate </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="communicate">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors communicate-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty of Taking Care (example: shower, wearing clothes)</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="take_care">
                                                <option value="some">Some Difficulty</option>
                                                <option value="lot" >A lot of Difficulty</option>
                                                <option value="cannot">Can not do at all</option>
                                            </select>
                                            <div class="help-block with-errors take_care-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_modal_new_sub_category_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Accordion-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

@push('script')
<script type="text/javascript">
    //save personal details
    $('#kk_personal_details_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_modal_new_service_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('resume/step_01/personal_detail/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_modal_new_service_submit').removeAttr('disabled');

            }
        });

    })

    //disable enable permanent adress field
    $("#permanent_address").on('change', function(){
        let val = $(this).val();
        if(val == 'same'){
            $("#permanent_address_field").toggleClass('d-none');
        }
    })

    //save address details
    $('#kk_address_details_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_address_detail_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('resume/step_01/address_detail/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })


    //save career and application information
    $('#kk_career_application_info_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_address_detail_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_01/career_application/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })


    //save other relevent information
    $('#kk_other_relavent_info_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_address_detail_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_01/other_relevent_info/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })

    
    //disability form show hide
    $(".disability_id").on('click', function(){
        let val = $(this).val();
        console.log(val);
        if(val == 'yes'){
            $("#kk_disability_info_form").removeClass('d-none');
            $(".no_disability").addClass('d-none');
        }else{
            $("#kk_disability_info_form").addClass('d-none');
            $(".no_disability").removeClass('d-none');
        }
        
    })
    
    //save disability information
    $('#kk_disability_info_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_address_detail_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_01/disability_info/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })

</script>
@endpush