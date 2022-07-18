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
                                Employment History
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body employment_history">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 employment_history_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        @foreach($employment_history as $experience)
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2 edit_employment_history" data-id="{{ $experience->id }}" ><i class="fas fa-edit"></i>Edit</span>
                                            <span class="btn btn-active-color-danger btn-sm btn-light delete_experience" data-id="{{ $experience->id }}" ><i class="fas fa-trash"></i>Delete</span>
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
                                                                        <td class="text-muted min-w-125px w-130px">Company Name</td>
                                                                        <td class="text-gray-800">{{ $experience->company_name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Company Business</td>
                                                                        <td class="text-gray-800">{{ $experience->company_business ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Designation</td>
                                                                        <td class="text-gray-800">{{ $experience->designation ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Department</td>
                                                                        <td class="text-gray-800">{{ $experience->department ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Strat Date</td>
                                                                        <td class="text-gray-800">{{ $experience->from_date ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">End Date</td>
                                                                        <td class="text-gray-800">{{ $experience->end_date ?? '' }}</td>
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
                                                                        <td class="text-muted min-w-125px w-130px">Responsibilites</td>
                                                                        <td class="text-gray-800">{{ $experience->responsibilities ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Area of Expertise</td>
                                                                        <td class="text-gray-800">{{ $experience->area_of_expertise['expertise'] ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Duration</td>
                                                                        <td class="text-gray-800">{{ $experience->area_of_expertise['duration'] ?? ''}} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Address</td>
                                                                        <td class="text-gray-800">{{ $experience->address ?? '' }} </td>
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
                                           
                                            <div class="separator separator-dashed mb-2"></div>
                                           
                                        </div>
                                        <!--end::Options-->
                                        @endforeach
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <div class="d-flex justify-content-start">
                                    <span class="btn btn-sm btn-primary " id="add_employment_history"><i class="fas fa-plus"></i>Add New</span>
                                </div>

                                <!--begin:Form-->
                                <form id="kk_employment_history_form" class="form d-none px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <span class="btn btn-sm btn-active-color-danger btn-light " id="cancel_edit_employment_history"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3 text-muted fs-4">Add Experience</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->

                                    {{-- hidden  --}}
                                    <input type="hidden" name="employment_id">

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Company Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter company name"
                                                    name="company_name" />
                                                <div class="help-block with-errors company_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Company Business</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Company business"
                                                    name="company_business" />
                                                <div class="help-block with-errors company_business-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Designation</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your designation"
                                                    name="designation" />
                                                <div class="help-block with-errors designation-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Department</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your department"
                                                    name="department" />
                                                <div class="help-block with-errors department-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row mb-2">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Employment Period</span>
                                                </label>
                                                <!--end::Label-->
                                              <div class="row">
                                                    <div class="col-md-6 ">
                                                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Start date" name="start_date" value=""/>
                                                        <span class="required">Start Date</span>
                                                        <div class="help-block with-errors start_date-error"></div>
                                                    </div>
                                                    
                                                    <div class="col-md-6" id="end_date">
                                                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Start date" name="end_date" value=""/>
                                                        <span>End Date</span>
                                                        <div class="help-block with-errors end_date-error"></div>
                                                    </div>
                                                    
                                                </div>
                                               
                                            </div>
                                            <!--end::Input group-->
                                            <!--end::Input group-->
                                            <input class="form-check-input me-2" type="checkbox" value="yes" name="currently_working" id="currently_working" >Currently Working
                                        </div>
                                       
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Responsibilities </span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter your job responsibity" name="responsibilities"></textarea>
                                        <div class="help-block with-errors responsibilities-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Area of Expertise</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Your expertise"
                                                    name="expertise" />
                                                <div class="help-block with-errors expertise-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required"></span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input group-->
                                                <div class="input-group mb-5">
                                                    <input type="text" class="form-control" placeholder="10/12" name="duration" value=""/>
                                                    <span class="input-group-text">Months</span>
                                                    <div class="help-block with-errors month-error"></div>
                                                </div>
                                               
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->

                                    {{-- <!-- append dynamic input-->
                                    <div  class="newRow"></div>
                                    <!-- append dynamic input-->

                                    <div class="col-md-5 mb-5">
                                        <button class="btn btn-info btn-sm addRow" type="button" style="padding: 7px 10px !important"><i class="fas fa-plus"></i>Add </button>
                                    </div> --}}

                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Location\Address</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  class="form-control form-control-solid" placeholder="Enter company address" name="address">
                                        <div class="help-block with-errors address-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_employment_history_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_employment_history_submit" class="btn btn-primary">
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
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5" aria-expanded="false" aria-controls="kt_accordion_1_body_5">
                                Employment History (For Retired Army Person)
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_5" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body retired_army_person">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 retired_army_person_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-sm btn-light " id="edit_retired_army_person_data">
                                                @if($user_detail)
                                                    @if($user_detail->ba_no)<i class="fas fa-edit"></i> Edit @endif
                                                @else <i class="fas fa-plus"></i> Add @endif
                                            </span>
                                        </div>
                                        @isset($user_detail)
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
                                                                        <td class="text-muted min-w-125px w-130px">BA No.</td>
                                                                        <td class="text-gray-800">{{ $user_detail->ba_no ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">BA Number</td>
                                                                        <td class="text-gray-800">{{ $user_detail->number ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Ranks</td>
                                                                        <td class="text-gray-800">{{ $user_detail->ranks ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Type</td>
                                                                        <td class="text-gray-800">{{ $user_detail->type ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Arms</td>
                                                                        <td class="text-gray-800">{{ $user_detail->arms }}</td>
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
                                                                        <td class="text-muted min-w-125px w-130px">Trade</td>
                                                                        <td class="text-gray-800">{{ $user_detail->trade ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Course</td>
                                                                        <td class="text-gray-800">{{ $user_detail->course ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Date of commission</td>
                                                                        <td class="text-gray-800">{{ $user_detail->date_of_commission ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Date of Retirement</td>
                                                                        <td class="text-gray-800">{{ $user_detail->date_of_retirement ?? '' }} </td>
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
                                        @endisset
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <!--begin:Form-->
                                <form id="kk_modal_new_retired_army_person_form" class="form d-none" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end mb-4">
                                        <span class="btn btn-active-color-danger btn-sm btn-light " id="cancel_edit_retired_army_person_data"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5 required">Retired Army Person</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                             <label class="required fs-6 fw-bold mb-2">BA No.</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                        data-placeholder="Select ba_no" name="ba_no">
                                                        <option value=""></option>
                                                        <option value="ba">BA</option>
                                                        <option value="bss">BSS</option>
                                                        <option value="jss">JSS</option>
                                                    
                                                    </select>
                                                    <div class="help-block with-errors ba_no-error"></div>    
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter number"
                                                            name="number" />
                                                        <div class="help-block with-errors number-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Ranks</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select ranks" name="ranks">
                                                 <option value=""></option>
                                                <option value="2lt">2lt</option>
                                                <option value="capt" >Captain</option>
                                                <option value="maj" >Major</option>
                                                <option value="engr" >engr</option>
                                                
                                            </select>
                                            <div class="help-block with-errors ranks-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Type</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select arms" name="type">
                                                <option value=""></option>
                                                <option value="officer">Officer</option>
                                                <option value="jco" >JCO</option>
                                                <option value="nco" >NCO</option>
                                              
                 
                                            </select>
                                            <div class="help-block with-errors type-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Arms</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select arms" name="arms">
                                                 <option value=""></option>
                                                <option value="ac">AC</option>
                                                <option value="eb" >EB</option>
                                                <option value="bir" >BIR</option>
                                                <option value="engr" >engr</option>
                                                
                                            </select>
                                            <div class="help-block with-errors arms-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Trade</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Institute"
                                                    name="trade" />
                                                <div class="help-block with-errors trade-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Course</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Achievement"
                                                    name="course" />
                                                <div class="help-block with-errors course-error"></div>
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
                                                    <span class="">Date of Commission</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="Enter passport issue date."
                                                    name="comission_date" value="{{ \Carbon\Carbon::parse($user_detail->comission_date ?? '')->format('d-M-Y')}}"/>
                                                <div class="help-block with-errors comission_date-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Date of Retirement</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="Enter passport issue date."
                                                    name="retirement_date" value="{{ \Carbon\Carbon::parse($user_detail->retirement_date ?? '')->format('d-M-Y')}}"/>
                                                <div class="help-block with-errors retirement_date-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_modal_army_retired_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_modal_army_retired_submit" class="btn btn-primary">
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

    //save employment history
    $('#kk_employment_history_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        
        var formData = new FormData(this);
        
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_03/employment-history/store')}}",
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

    //save employment history for retired army person
    $('#kk_modal_new_retired_army_person_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
      

        var formData = new FormData(this);
       
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_03/retired-army/store')}}",
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

   
    //End date show hide
    $("#currently_working").on('change', function(){
        let val = $(this).val();
        if(val == 'yes'){
            $("#end_date").toggleClass('d-none');
        }
    })

    /*########### Edit ##############*/
    //Academic Summary
    $('.edit_employment_history').on('click', function(){
        var id = $(this).data('id');
        var thisbtn = $(this);
        $.ajax({
            url:"{{ route('resume.get_employment_info') }}",
            type:"GET",
            data:{
                'id': id
            },
            success:function (data) {
    
                $('input[name="employment_id"]').val(data.id);
                $('input[name="company_name"]').val(data.company_name);
                $('input[name="company_business"]').val(data.company_business);
                $('input[name="designation"]').val(data.designation);
                $('input[name="department"]').val(data.department);
                $('input[name="responsibilities"]').val(data.responsibilities);
                $('input[name="from_date"]').val(data.from_date);
                $('input[name="to_date"]').val(data.to_date);
                $('input[name="expertise"]').val(data.area_of_expertise.expertise);
                $('input[name="duration"]').val(data.area_of_expertise.duration);
                $('input[name="currently_working"]').val(data.currently_working);
                $('input[name="address"]').val(data.address);

                thisbtn.parents(".employment_history").find('div.employment_history_data').addClass('d-none');
                $("#add_employment_history").hide();
                $('#kk_employment_history_form').removeClass('d-none');
            }
        })
        // end of ajax call
          
    })

    

    $(document).ready( function() {
        // Work Experiences Section :: start 
         //add button
        $("#add_employment_history").on('click', function(){
            $(this).hide();
            $('input[name="employment_id"]').val('');
            // $(this).parents(".employment_history").find('div.employment_history_data').addClass('d-none');
            $(this).parents(".employment_history").find('form#kk_employment_history_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_employment_history").on('click', function(){

            $(this).parents(".employment_history").find('form#kk_employment_history_form').addClass('d-none');
            $(this).parents(".employment_history").find('div.employment_history_data').removeClass('d-none');
            $('#add_employment_history').show();
        })
        $("#kk_employment_history_cancel").on('click', function(){
            $(this).parents(".employment_history").find('form#kk_employment_history_form').addClass('d-none');
            $(this).parents(".employment_history").find('div.employment_history_data').removeClass('d-none');
            $('#add_employment_history').show();
        })

        // Work Experiences Section :: end

        // Retired army person Section :: start 
        //edit button
        $("#edit_retired_army_person_data").on('click', function(){
            $(this).parents(".retired_army_person").find('div.retired_army_person_data').addClass('d-none');
            $(this).parents(".retired_army_person").find('form#kk_modal_new_retired_army_person_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_retired_army_person_data").on('click', function(){
            $(this).parents(".retired_army_person").find('form#kk_modal_new_retired_army_person_form').addClass('d-none');
            $(this).parents(".retired_army_person").find('div.retired_army_person_data').removeClass('d-none');
        })
        $("#kk_modal_army_retired_cancel").on('click', function(){
            $(this).parents(".retired_army_person").find('form#kk_modal_new_retired_army_person_form').addClass('d-none');
            $(this).parents(".retired_army_person").find('div.retired_army_person_data').removeClass('d-none');
        })

        // Retired army person Section :: end

        

        //DElete Start
        //delete_experience 
        $('.delete_experience').on('click', function(){
            var id = $(this).data('id');
            console.log(id);

            Swal.fire({
                text: "Are you sure you want delete this?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Confirm",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (o) {
                if(o.value){ //if agree
                    $.ajax({
                        type: "GET",
                        url: "{{ url('resume/step_3/delete-experience') }}"+'/'+id,
                        data: {},
                        success: function (data)
                        {
                            if(data.success){
                            toastr.success(data.message);
                            location.reload();
                            }else{
                                toastr.error(data.message)
                            }
                        }
                    });

                }else{ //if cancel
                    Swal.fire({
                        text: "Item has not been deleted",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

            }))
        })


    
    })

    </script>
@endpush