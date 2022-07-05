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
                            <div class="accordion-body personal_detail">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 personal_detail_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-light " id="edit_personal_detail"><i class="fas fa-edit"></i>Edit</span>
                                        </div>
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1" class="fs-6 ps-10 collapse show" style="">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">First Name</td>
                                                                        <td class="text-gray-800">{{ $user_detail->first_name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Last Name</td>
                                                                        <td class="text-gray-800">{{ $user_detail->last_name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Father Name</td>
                                                                        <td class="text-gray-800">{{ $user_detail->father_name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Mother Name</td>
                                                                        <td class="text-gray-800">{{ $user_detail->mother_name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Date of Birth</td>
                                                                        <td class="text-gray-800">{{ $user_detail->date_of_birth }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Gender</td>
                                                                        <td class="text-gray-800">{{ $user_detail->gender }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Religion</td>
                                                                        <td class="text-gray-800">{{ $user_detail->religion }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Marital Status</td>
                                                                        <td class="text-gray-800">{{ $user_detail->marital_status }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Nationality</td>
                                                                        <td class="text-gray-800">{{ $user_detail->nationality ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">National ID</td>
                                                                        <td class="text-gray-800">{{ $user_detail->national_id ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Passport Number</td>
                                                                        <td class="text-gray-800">{{ $user_detail->passport_number ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Passport Issue Date</td>
                                                                        <td class="text-gray-800">{{ $user_detail->passport_issue_date ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Contact -1</td>
                                                                        <td class="text-gray-800">{{ $user_detail->primary_mobile ?? ''  }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Contact -2</td>
                                                                        <td class="text-gray-800">{{ $user_detail->secondary_mobile ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Email</td>
                                                                        <td class="text-gray-800">{{ $user_detail->email ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Blood Group</td>
                                                                        <td class="text-gray-800">{{ $user_detail->glood_group ?? '' }} </td>
                                                                    </tr>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                    <!--end::Details-->
                                                    
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <!--begin:Form-->
                                <form id="kk_personal_details_form" class="form d-none py-5 px-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end mb-4">
                                        <span class="btn btn-active-color-danger btn-light " id="cancel_edit_personal_detail"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
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
                                                    name="first_name" value="{{  $user_detail->first_name ?? ''}}"/>
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
                                                    name="last_name" value="{{ $user_detail->last_name ?? '' }}"/>
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
                                                    name="father_name" value="{{ $user_detail->father_name ?? ''}}"/>
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
                                                    name="mother_name" value="{{  $user_detail->mother_name ?? '' }}" />
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
                                                    name="date_of_birth" value="{{  \Carbon\Carbon::parse($user_detail->date_of_birth ?? '')->format('d-M-Y') }}"/>
                                                <div class="help-block with-errors date_of_birth-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Gender</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="gender">
                                                <option value="">Select gender</option>
                                                
                                                <option value="male" @isset($user_detail->gender) {{  $user_detail->gender == 'male' ? 'selected' : '' }}  @endisset>Male</option>
                                                <option value="female" @isset($user_detail->gender) {{ $user_detail->gender == 'female' ? 'selected' : '' }} @endisset>Female</option>
                                                <option value="other" @isset($user_detail->gender) {{ $user_detail->gender == 'other' ? 'selected' : '' }} @endisset>Other</option>
                                                
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
                                               name="religion">
                                               <option value="">Select </option>
                                               
                                                <option value="islam" @isset($user_detail->religion ){{ $user_detail->religion == 'islam' ? 'selected' : '' }} @endisset>Islam</option>
                                                <option value="hinduism" @isset($user_detail->religion ){{ $user_detail->religion == 'hinduism' ? 'selected' : '' }} @endisset>Hinduism </option>
                                                <option value="christianity" @isset($user_detail->religion ){{ $user_detail->religion == 'christianity' ? 'selected' : '' }} @endisset>Christianity</option>
                                                <option value="buddhism" @isset($user_detail->religion ){{ $user_detail->religion == 'buddhism' ? 'selected' : '' }} @endisset>Buddhism </option>
                                                <option value="judaism" @isset($user_detail->religion ){{ $user_detail->religion == 'judaism' ? 'selected' : '' }} @endisset>Judaism</option>
                                                <option value="other" @isset($user_detail->religion ){{ $user_detail->religion == 'other' ? 'selected' : '' }}  @endisset>Other</option>
                                               
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
                                                
                                                <option value="unmarried" @isset($user_detail->marital_status ) {{ $user_detail->marital_status == 'unmarried' ? 'selected' : '' }} @endisset >Unmarried</option>
                                                <option value="married" @isset($user_detail->marital_status ) {{ $user_detail->marital_status == 'married' ? 'selected' : '' }} @endisset >Married </option>
                                                
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
                                                    name="nationality" value="{{ $user_detail->nationality ?? '' }}"/>
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
                                                    name="national_id" value="{{ $user_detail->national_id ?? '' }}" />
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
                                                    name="passport_no" value="{{ $user_detail->passport_no ?? '' }}"/>
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
                                                    name="passport_issue_date" value="{{ \Carbon\Carbon::parse($user_detail->passport_issue_date ?? '')->format('d-M-Y')}}"/>
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
                                                    name="primary_mobile" value="{{ $user_detail->primary_mobile ?? '' }}"/>
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
                                                    name="secondary_mobile" value="{{ $user_detail->secondary_mobile ?? '' }}"/>
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
                                                    name="email" value="{{ $user_detail->email ?? '' }}" />
                                                <div class="help-block with-errors email-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Blood Group</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="blood_group">
                                                <option value="">Select blood group</option>
                                               
                                                <option value="a+"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'a+' ? 'selected' : '' }} @endisset>A(+ve)</option>
                                                <option value="a-"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'a-' ? 'selected' : '' }} @endisset >A(-ve)</option>
                                                <option value="b+"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'b+' ? 'selected' : '' }} @endisset>B(+ve)</option>
                                                <option value="b-"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'b-' ? 'selected' : '' }} @endisset>B(-ve)</option>
                                                <option value="o+"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'o+' ? 'selected' : '' }} @endisset>O(+ve)</option>
                                                <option value="o-"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'o-' ? 'selected' : '' }} @endisset>O(-ve)</option>
                                                <option value="ab+"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'ab+' ? 'selected' : '' }} @endisset>AB(+ve)</option>
                                                <option value="ab-"  @isset($user_detail->blood_group) {{$user_detail->blood_group == 'ab-' ? 'selected' : '' }} @endisset>AB(-ve)</option>
                                               
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
                                <!--end:Form-->
                            </div>
                        </div>
                    </div>

                    <!--start: Address Details -->
                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                Address Details
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body address_detail">
                                
                                <div class="card card-flush pt-3 mb-5 mb-lg-10 address_detail_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-light " id="edit_address_detail"><i class="fas fa-edit"></i>Edit</span>
                                        </div>
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1" class="fs-6 ps-10 collapse show" style="">
                                                    <!--begin::Details-->
                                                    <div class="py-5">
                                                        <!--begin::Col-->
                                                        <div class="mb-8">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <span class="fs-4 mb-3">Present Address</span>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Country</td>
                                                                        <td class="text-gray-800">{{ $user_detail->present_address['country'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">State</td>
                                                                        <td class="text-gray-800">{{ $user_detail->present_address['state'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">City</td>
                                                                        <td class="text-gray-800">{{ $user_detail->present_address['city'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Address</td>
                                                                        <td class="text-gray-800">{{ $user_detail->present_address['address'] ?? '' }}</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        @isset($user_detail->permanent_address)
                                                        <!--begin::Col-->
                                                        <div class="">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <span class="fs-4 mb-3">Permanent Address</span>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Country</td>
                                                                        <td class="text-gray-800">{{ $user_detail->permanent_address['country'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">State</td>
                                                                        <td class="text-gray-800">{{ $user_detail->permanent_address['state'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">City</td>
                                                                        <td class="text-gray-800">{{ $user_detail->permanent_address['city'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Address</td>
                                                                        <td class="text-gray-800">{{ $user_detail->permanent_address['address'] ?? '' }}</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        @endisset
                                                    </div>
                                                    <!--end::Details-->
                                                    
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <!--begin:Form-->
                                <form id="kk_address_details_form" class="form d-none py-5 px-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end mb-4">
                                        <span class="btn btn-active-color-danger btn-light " id="cancel_edit_address_detail"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    <div class="messages"></div>
                                
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5">Present Address</div>
                                        <!--end::Description-->
                                        {{-- <div class="fs-6 fw-bold">
                                            <input class="form-check-input" type="radio" name="p_radiobtn"  value="bangladesh"> <span class="me-3">Inside Bangladesh</span>
                                            <input class="form-check-input" type="radio" name="p_radiobtn"  value="other"> Outside Bangladesh
                                        </div> --}}
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Country</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="p_country">
                                                <option value="">Select country</option>
                                                <option value="bangladesh">Bangladesh</option>
                                                
                                            </select>
                                            <div class="help-block with-errors p_country-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">State</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="p_state">
                                                <option value="">Select state</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                
                                            </select>
                                            <div class="help-block with-errors p_state-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">City</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="p_city">
                                                <option value="">Select city</option>
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
                                                <input class="form-check-input" type="checkbox" value="same" name="present_permanent" id="permanent_address" 
                                                @isset($user_detail->permanent_address)  {{ $user_detail->permanent_address == 'sameaspresent' ? 'checked' : '' }} @endisset >
                                                <label class="form-check-label ms-3"  for="permanent_address">Same as Present</label>
                                            </div>
                                            
                                        </div>
                                        <!--end::Description-->
                                       
                                    </div>
                                    <!--end::Heading-->
                                   
                                    <span id="permanent_address_field">
                                        <div class="col-md-6 fv-row mb-5">
                                            {{-- <div class="fs-6 fw-bold">
                                                <input class="form-check-input" type="radio" name="radiobtn"  value="bangladesh"> <span class="me-3">Inside Bangladesh</span>
                                                <input class="form-check-input" type="radio" name="radiobtn"  value="other"> Outside Bangladesh
                                            </div> --}}
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-4">
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">Country</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    name="country">
                                                    <option value="">Select country</option>
                                                    <option value="bangladesh">Bangladesh</option>
                                                    
                                                </select>
                                                <div class="help-block with-errors country-error"></div>    
                                            </div>
                                            <!--begin::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">State</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    name="state">
                                                    <option value="">Select state</option>
                                                    <option value="rajshahi">Rajshahi</option>
                                                    
                                                </select>
                                                <div class="help-block with-errors state-error"></div>    
                                            </div>
                                            <!--begin::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">City</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                    name="city">
                                                    <option value="">Select city</option>
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
                                        
                                    </span>
                                   
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
                                </form>
                                <!--end:Form-->
                            </div>
                        </div>
                    </div>
                    <!--end: Address Details -->

                    <!--start:  Career and Application Information -->
                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_3">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                Career and Application Information
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body career_application">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 career_application_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-light " id="edit_career_application"><i class="fas fa-edit"></i>Edit</span>
                                        </div>
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1" class="fs-6 ps-10 collapse show" style="">
                                                    <!--begin::Details-->
                                                    <div class="py-5">
                                                        <!--begin::Col-->
                                                        <div class="mb-8">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <span class="fs-4 mb-3">Career Application Information</span>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Objective</td>
                                                                        <td class="text-gray-800">{{  $career_info->objective ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Present Salary</td>
                                                                        <td class="text-gray-800">{{ $career_info->present_salary ?? ''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Job Level</td>
                                                                        <td class="text-gray-800">{{ $career_info->job_level ?? ''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Job Nature</td>
                                                                        <td class="text-gray-800">{{ $career_info->job_nature ?? '' }}</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                       
                                                    </div>
                                                    <!--end::Details-->
                                                    
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <!--begin:Form-->
                                <form id="kk_career_application_info_form" class="form d-none py-5 px-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end mb-4">
                                        <span class="btn btn-active-color-danger btn-light " id="cancel_edit_career_application"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    <div class="messages"></div>
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Objective</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Career objective" name="career_objective">{{  $career_info->objective ?? '' }}</textarea>
                                        <div class="help-block with-errors career_objective-error"></div>   
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
                                                    <span class="">Current Salary</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Your current salary"
                                                    name="present_salary" value="{{ $career_info->present_salary ?? ''}}"/>
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
                                                    name="expected_salary" value="{{ $career_info->expected_salary ?? '' }}" />
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
                                                   
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="entry"  @isset($career_info->job_level) {{ $career_info->job_level == 'entry' ? 'checked' : '' }} @endisset> <span class="me-3"> Entry Level</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="mid" @isset($career_info->job_level){{ $career_info->job_level == 'mid' ? 'checked' : '' }} @endisset> <span class="me-3"> Mid Level</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_level"  value="top" @isset($career_info->job_level) {{ $career_info->job_level == 'top' ? 'checked' : '' }} @endisset> <span class=""> Top Level</span>
                                                   
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
                                                   
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="full_time"  @isset($career_info->job_nature) {{ $career_info->job_nature == 'full_time' ? 'checked' : '' }} @endisset> <span class="me-3"> Full Time</span>
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="part_time"  @isset($career_info->job_nature) {{ $career_info->job_nature == 'part_time' ? 'checked' : '' }} @endisset> <span class="me-3"> Part Time</span>
                                                    <input class="form-check-input mb-3 me-1" type="radio" name="job_nature"  value="contract"  @isset($career_info->job_nature) {{ $career_info->job_nature == 'contract' ? 'checked' : '' }} @endisset> <span class="me-3 "> Contract</span> <br>
                                                    <input class="form-check-input me-1" type="radio" name="job_nature"  value="internship"  @isset($career_info->job_nature) {{ $career_info->job_nature == 'internship' ? 'checked' : '' }} @endisset> <span class="me-3"> Internship</span>
                                                    <input class="form-check-input me-1" type="radio" name="job_nature"  value="freelance"  @isset($career_info->job_nature) {{ $career_info->job_nature == 'freelance' ? 'checked' : '' }} @endisset> <span class=""> Freelance</span>
                                                    
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
                    <!--end:  Career and Application Information -->

                    <!--start:  Preffered Areas -->
                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_6">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_6" aria-expanded="false" aria-controls="kt_accordion_1_body_6">
                                Preffered Areas
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_6" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_6" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_preffered_job_category_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>

                                    <!--begin::Heading-->
                                    <div class="mb-8">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold mb-5 "><span class="fs-5 required">Preferred Job Categoriesrequired</span>  <br>
                                        <p> Preferred job categories represents your desired sector(s) to work (at least 1 category any of section) </p></div>
                                        <!--end::Description-->
                                     
                                    </div>
                                    <!--end::Heading-->
                               
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row" >
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row" >
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Functional (max 3)</span>
                                                    
                                                </label>
                                                <!--end::Label-->
                                                <span class="border py-4 px-4" style="min-height: 150px; max-height: 150px">
                                                 @foreach($functional_job_categories as $key => $job_category)
                                                    <div class="form-check form-check-custom form-check-solid text-black mb-2">
                                                        <input class="form-check-input functional" type="checkbox" value="{{$job_category->name}}" @isset( $career_info->job_categories[$key]) {{ $career_info->job_categories[$key] == $job_category->name ? 'checked' : '' }} @endisset name="functional[]" >
                                                        <label class="form-check-label ms-3"  for="functional">{{$job_category->name}}</label>
                                                    </div>
                                                    @endforeach  
                                                      
                                                    <div class="help-block with-errors present_salary-error"></div>
                                                </span>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Special Skill (max 3)</span>
                                                    {{-- {{ $career_info->special_skill[0] }} --}}
                                                </label>
                                                <!--end::Label-->
                                                <span class="border py-4 px-4" style="min-height: 150px; max-height: 150px">
                                                 @foreach($special_skills as $key => $skill)
                                                    <div class="form-check form-check-custom form-check-solid text-black mb-2">
                                                        
                                                        <input class="form-check-input skill" type="checkbox" value="{{ $skill->name }}" @isset( $career_info->special_skill[$key]) {{ $career_info->special_skill[$key] == $skill->name ? 'checked' : '' }} @endisset name="skill[]" >
                                                        <label class="form-check-label ms-3"  for="skill">{{$skill->name}}</label>
                                                    </div>
                                                    @endforeach  
                                                      
                                                    <div class="help-block with-errors skill-error"></div>
                                                </span>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Preferred Job Location</span>
                                                </label>
                                                 <p class="text-muted"> Preferred Job Location defines the geographical place where you prefer to work. i.e. 1st: Dhaka, 2nd: Sylhet, 3rd: Khulna. </p>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" name="area" id="area">
                                                <div class="help-block with-errors area-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    {{-- <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-3">
                                                    <span class="required">Add your preferred organization type (max 12)</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" name="organization_type" id="organization">
                                                <div class="help-block with-errors organization_type-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div> --}}
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_preffered_area_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_preffered_area_submit" class="btn btn-primary">
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
                    <!--end:  Preffered Areas -->

                    <!--strat:  Other Relevent Information -->
                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_4">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_4" aria-expanded="false" aria-controls="kt_accordion_1_body_4">
                                Other Relevent Information
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_4" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_4" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body other_relevent_info">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 other_relevent_info_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-light " id="edit_other_relevent_info"><i class="fas fa-edit"></i>Edit</span>
                                        </div>
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1" class="fs-6 ps-10 collapse show" style="">
                                                    <!--begin::Details-->
                                                    <div class="py-5">
                                                        <!--begin::Col-->
                                                        <div class="mb-8">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <span class="fs-4 mb-3">Other Relevent Info</span>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Career Summary</td>
                                                                        <td class="text-gray-800">{{  $career_info->career_summary ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Special Qualification</td>
                                                                        <td class="text-gray-800">{{ $career_info->special_qualification ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Keyword</td>
                                                                        <td class="text-gray-800">{{ $career_info->keyword ?? '' }}</td>
                                                                    </tr>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                       
                                                    </div>
                                                    <!--end::Details-->
                                                    
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <!--begin:Form-->
                                <form id="kk_other_relavent_info_form" class="form d-none py-5 px-4" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="d-flex justify-content-end mb-4">
                                        <span class="btn btn-active-color-danger btn-light " id="cancel_edit_other_relevent_info"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    
                                    <div class="messages"></div>
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Career Summary</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter carrer summary" name="career_summary">{{  $career_info->career_summary ?? '' }}</textarea>
                                        <div class="help-block with-errors career_summary-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Special Qualification</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter Special Qualification" name="special_qualification">{{ $career_info->special_qualification ?? '' }}</textarea>
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
                                        <input type="text" class="form-control form-control-solid " placeholder="Enter keyword" name="keyword" value="{{ $career_info->keyword ?? '' }}">
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
                    <!--end:  Other Relevent Information -->

                    <!--start:  Disability Information (if any) -->
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
                        
                                        <input class="form-check-input disability" type="radio" name="radiobtn"  value="yes" > <span class="me-3">Yes</span>
                                        <input class="form-check-input disability" type="radio" name="radiobtn"  value="no" checked> No
                                      
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

                                    {{-- hidden input  --}}
                                    <input type="hidden" name="disability" id="disability">
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
                                                    name="disability_id" value="{{ $user_detail->disability_id ?? '' }}"/>
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
                                                    @isset( $user_detail->show_on_resume )
                                                    <input class="form-check-input" type="radio" name="show_on"  value="yes" {{ $user_detail->show_on_resume == 'yes' ? 'checked' : '' }}> <span class="me-3">Yes</span>
                                                    <input class="form-check-input" type="radio" name="show_on"  value="no" {{ $user_detail->show_on_resume == 'no' ? 'checked' : '' }}> No
                                                    @endisset
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
                                                name="see">
                                                <option value="">Select</option>
                                                
                                                <option value="some" @isset( $user_detail->disability_see )  {{ $user_detail->disability_see == 'some' ? 'selected' : '' }} @endisset >Some Difficulty</option>
                                                <option value="lot" @isset( $user_detail->disability_see ) {{ $user_detail->disability_see == 'lot' ? 'selected' : '' }} @endisset >A lot of Difficulty</option>
                                                <option value="cannot" @isset( $user_detail->disability_see ) {{ $user_detail->disability_see == 'canot' ? 'selected' : '' }}@endisset >Can not do at all</option>
                                                
                                            </select>
                                            <div class="help-block with-errors see-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Hear</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="hear">
                                                <option value="">Select</option>
                                                
                                                <option value="some" @isset( $user_detail->disability_hear ) {{ $user_detail->disability_hear == 'some' ? 'selected' : '' }} @endisset >Some Difficulty</option>
                                                <option value="lot" @isset( $user_detail->disability_hear ) {{ $user_detail->disability_hear == 'lot' ? 'selected' : '' }} @endisset >A lot of Difficulty</option>
                                                <option value="cannot" @isset( $user_detail->disability_hear ) {{ $user_detail->disability_hear == 'canot' ? 'selected' : '' }} @endisset >Can not do at all</option>
                                               
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
                                                name="remember">
                                                <option value="">Select</option>
                                               
                                                <option value="some" @isset( $user_detail->disability_remember ) {{ $user_detail->disability_remember == 'some' ? 'selected' : '' }}@endisset >Some Difficulty</option>
                                                <option value="lot" @isset( $user_detail->disability_remember ) {{ $user_detail->disability_remember == 'lot' ? 'selected' : '' }}@endisset >A lot of Difficulty</option>
                                                <option value="cannot" @isset( $user_detail->disability_remember ) {{ $user_detail->disability_remember == 'canot' ? 'selected' : '' }}@endisset >Can not do at all</option>
                                                
                                            </select>
                                            <div class="help-block with-errors remember-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty to Sit, Stand, Walk or Climb Stairs </label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="physical">
                                                <option value="">Select</option>
                                              
                                                <option value="some" @isset( $user_detail->disability_physical ) {{ $user_detail->disability_physical == 'some' ? 'selected' : '' }} @endisset>Some Difficulty</option>
                                                <option value="lot" @isset( $user_detail->disability_physical ) {{ $user_detail->disability_physical == 'lot' ? 'selected' : '' }} @endisset>A lot of Difficulty</option>
                                                <option value="cannot" @isset( $user_detail->disability_physical ) {{ $user_detail->disability_physical == 'canot' ? 'selected' : '' }} @endisset>Can not do at all</option>
                                                
                                            </select>
                                            <div class="help-block with-errors physical-error"></div>    
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
                                               
                                                <option value="some"  @isset( $user_detail->disability_communicate ) {{ $user_detail->disability_communicate == 'some' ? 'selected' : '' }} @endisset >Some Difficulty</option>
                                                <option value="lot"  @isset( $user_detail->disability_communicate ) {{ $user_detail->disability_communicate == 'lot' ? 'selected' : '' }}  @endisset>A lot of Difficulty</option>
                                                <option value="cannot"  @isset( $user_detail->disability_communicate ) {{ $user_detail->disability_communicate == 'canot' ? 'selected' : '' }}  @endisset>Can not do at all</option>
                                               
                                            </select>
                                            <div class="help-block with-errors communicate-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Difficulty of Taking Care (example: shower, wearing clothes)</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="take_care">
                                               
                                                <option value="some" @isset( $user_detail->disability_care ) {{ $user_detail->disability_care == 'some' ? 'selected' : '' }}  @endisset >Some Difficulty</option>
                                                <option value="lot" @isset( $user_detail->disability_care ) {{ $user_detail->disability_care == 'lot' ? 'selected' : '' }} @endisset>A lot of Difficulty</option>
                                                <option value="cannot" @isset( $user_detail->disability_care ) {{ $user_detail->disability_care == 'canot' ? 'selected' : '' }} @endisset>Can not do at all</option>
                                                
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
        
        var formData = new FormData(this);
    
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
                }else if(data.error == true || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    //empty the form
                    toastr.success(data.message);
                    location.reload();
                }

                $('.indicator-label').show();
                $('.indicator-progress').hide();
                $('#kk_modal_new_service_submit').removeAttr('disabled');

            }
        });

    })

    //disable enable permanent adress field on page load
    if ($('#permanent_address').is(':checked') == true) {
        $("#permanent_address_field").addClass('d-none');
    }

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
        
        var formData = new FormData(this);
       
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
                    // refresh
                    toastr.success(data.message);
                    location.reload()
                  
                }

                $('.indicator-label').show();
                $('.indicator-progress').hide();
                $('#kk_address_detail_submit').removeAttr('disabled');
            }
        });

    })


    //save preffered job category
    $('#kk_preffered_job_category_form').on('submit',function(e){
        e.preventDefault();
       
        var formData = new FormData(this);
      
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_01/preffered-job-cat/store')}}",
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
                    // refresh
                    toastr.success(data.message);
                    location.reload();
                   
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
       
        var formData = new FormData(this);
      
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
                    // refresh
                    toastr.success(data.message);
                    location.reload();
                   
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
       
        var formData = new FormData(this);
    
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
                     // refresh
                    toastr.success(data.message);
                    location.reload();
                }

                $('.indicator-label').show();
                $('.indicator-progress').hide();
                $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })

    
    //disability form show hide
    $(".disability").on('click', function(){
        let val = $(this).val();
        //console.log(val);
        if(val == 'yes'){
            $("#disability").val(val);
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
                     // refresh
                    toastr.success(data.message);
                    location.reload();
                }

                $('.indicator-label').show();
                $('.indicator-progress').hide();
                $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })

    /// Personal Detail show hide
    $(document).ready( function() {
        // Personal detail Section :: start 
        //edit button
        $("#edit_personal_detail").on('click', function(){
            $(this).parents(".personal_detail").find('div.personal_detail_data').addClass('d-none');
            $(this).parents(".personal_detail").find('form#kk_personal_details_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_personal_detail").on('click', function(){
            $(this).parents(".personal_detail").find('form#kk_personal_details_form').addClass('d-none');
            $(this).parents(".personal_detail").find('div.personal_detail_data').removeClass('d-none');
        })

        // Personal detail Section :: end

        // Address detail Section :: start 
        //edit button
        $("#edit_address_detail").on('click', function(){
            $(this).parents(".address_detail").find('div.address_detail_data').addClass('d-none');
            $(this).parents(".address_detail").find('form#kk_address_details_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_address_detail").on('click', function(){
            $(this).parents(".address_detail").find('form#kk_address_details_form').addClass('d-none');
            $(this).parents(".address_detail").find('div.address_detail_data').removeClass('d-none');
        })

        // Address detail Section :: end


        // Career And Application info Section :: start 
        //edit button
        $("#edit_career_application").on('click', function(){
            $(this).parents(".career_application").find('div.career_application_data').addClass('d-none');
            $(this).parents(".career_application").find('form#kk_career_application_info_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_career_application").on('click', function(){
            $(this).parents(".career_application").find('form#kk_career_application_info_form').addClass('d-none');
            $(this).parents(".career_application").find('div.career_application_data').removeClass('d-none');
        })

        // Career And Application info Section :: end


        // Other Relavent  info Section :: start 
        //edit button
        $("#edit_other_relevent_info").on('click', function(){
            $(this).parents(".other_relevent_info").find('div.other_relevent_info_data').addClass('d-none');
            $(this).parents(".other_relevent_info").find('form#kk_other_relavent_info_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_other_relevent_info").on('click', function(){
            $(this).parents(".other_relevent_info").find('form#kk_other_relavent_info_form').addClass('d-none');
            $(this).parents(".other_relevent_info").find('div.other_relevent_info_data').removeClass('d-none');
        })

        // Other Relavent  info Section :: end
    })

</script>


@endpush