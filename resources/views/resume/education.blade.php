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
                                Academic Summary
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_academic_summary_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3 fs-3">Academy</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Level of Education</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select level" name="level_of_education" id="level_of_education">
                                                <option value=""></option>
                                                <option value="psc">PSC/5 Pass</option>
                                                <option value="jsc">JSC/JDC/8</option>
                                                <option value="ssc">Secondary</option>
                                                <option value="hsc">Higher Secondary</option>
                                                <option value="diploma">Diploma</option>
                                                <option value="bsc">Bachelor/Honours</option>
                                                <option value="msc">Masters</option>
                                                <option value="phd">PhD (Doctor of Philosophy)</option>
                                            </select>
                                            <div class="help-block with-errors level_of_education-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Exam/Degree title</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select exam degree" name="degree" id="degree">
                                                
                                            </select>
                                            <div class="help-block with-errors degree-error"></div>    
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5" >
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row" id="major">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Concentration/Major/Group </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your group/major"
                                                    name="major" />
                                                <div class="help-block with-errors major-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row" id="board">
                                            <label class="required fs-6 fw-bold mb-2">Board</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="board">
                                                <option value="">Select board</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="chattagram">Chattagram</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                <option value="khulna">Khulna</option>
                                                <option value="barishal">Barishal</option>
                                                <option value="jessore">Jessore</option>
                                                <option value="cumilla">Cumilla</option>
                                                <option value="dinajpur">Dinajpur</option>
                                                <option value="mymensingh">Mymensingh</option>
                                                <option value="sylhet">Sylhet</option>
                                                <option value="madrasha">Madrasha</option>
                                                <option value="technical">Technical</option>
                                                <option value="bou">BOU</option>
                                            </select>
                                            <div class="help-block with-errors board-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Institute Name</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter institute name"
                                                name="institute_name" />
                                            <div class="help-block with-errors institute_name-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                       <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Result</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select result" name="result" id="result">
                                                <option value=""></option>
                                                <option value="first">First Division/Class</option>
                                                <option value="second">Second Division/Class</option>
                                                <option value="third">Third Division/Class</option>
                                                <option value="grade">Grade</option>
                                                <option value="appeared">Appeared</option>
                                                <option value="enrolled">Enrolled</option>
                                                <option value="awarded">Awarded</option>
                                                <option value="pass">pass</option>
                                                <option value="donotmention">Don not mention</option>
                                            </select>
                                            <div class="help-block with-errors result-error"></div>    
                                        </div>
                                        
                                    {{-- </div>
                                    <!--end::Input group--> --}}
                                  
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row d-none" id="marks">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required mark_text" >Marks(%)</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder=""
                                                    name="mark" />
                                                <div class="help-block with-errors mark-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row d-none" id="scale">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Scale</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter scale"
                                                    name="scale" />
                                                <div class="help-block with-errors scale-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row" >
                                            <label class="required fs-6 fw-bold mb-2">Year of passing</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select year" name="passing_year">
                                                <option value=""></option>
                                                <option value="1999">1999</option>
                                                <option value="2020" >2020</option>
                                                
                                            </select>
                                            <div class="help-block with-errors passing_year-error"></div>    
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
                                                    <span class="">Duration (Years)</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="4 / 5"
                                                    name="course_duration" />
                                                <div class="help-block with-errors course_duration-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Achievement</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your achievement"
                                                    name="achievement" />
                                                <div class="help-block with-errors achievement-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_academic_summary_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_academic_summary_submit" class="btn btn-primary">
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
                                Training Summary
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_5" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_training_summary_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5 required">Training</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Training Title </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter training title"
                                                    name="title" />
                                                <div class="help-block with-errors title-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Country</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter country"
                                                    name="country" />
                                                <div class="help-block with-errors country-error"></div>
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
                                                    <span class="">Topics Covered</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Topic covered"
                                                    name="topic_covered" />
                                                <div class="help-block with-errors topic_covered-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Training year</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                name="training_year">
                                                <option value="">Select year</option>
                                                <option value="1999">1999</option>
                                                <option value="2020" >2020</option>
                                                
                                            </select>
                                            <div class="help-block with-errors training_year-error"></div>    
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
                                                    <span class="required">Institute</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter institute name"
                                                    name="institute" />
                                                <div class="help-block with-errors institute-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Duration</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter training duration"
                                                    name="duration" />
                                                <div class="help-block with-errors duration-error"></div>
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
                                                    <span class="">Location/Address </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter address"
                                                    name="address" />
                                                <div class="help-block with-errors address-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                           
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_training_summary_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_training_summary_submit" class="btn btn-primary">
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
                        <h2 class="accordion-header" id="kt_accordion_1_header_3">
                            <button class="accordion-button fs-4 fw-bold collapsed show" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                Professional Certification Summary
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_professional_certificate_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-4 mb-5 ">Professional Certification</div>
                                    </div>
                                    <!--end::Heading-->
                                   
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Certification </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter certificate name"
                                                    name="certification" />
                                                    
                                                <div class="help-block with-errors certification-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Institute</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter institute name"
                                                    name="institute" />
                                                   
                                                <div class="help-block with-errors institute-error"></div>
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
                                                    <span class="">Location/Address</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter location/address"
                                                    name="address" />
                                                   
                                                <div class="help-block with-errors address-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                         <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Duration</span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Start date" name="start_date" value=""/>
                                                        <span class="required">Start Date</span>
                                                        <div class="help-block with-errors start_date-error"></div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Start date" name="end_date" value=""/>
                                                        <span>End Date</span>
                                                        <div class="help-block with-errors end_date-error"></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                          
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_professional_summary_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_professional_summary_submit" class="btn btn-primary">
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

    //save academic summary information
    $('#kk_academic_summary_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
       
        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_02/academic-summary/store')}}",
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

    //save training summary information
    $('#kk_training_summary_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
      
        var formData = new FormData(this);
      
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_02/training-summary/store')}}",
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


    //save professional certificate information
    $('#kk_professional_certificate_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
       
        var formData = new FormData(this);
       
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_02/professional-summary/store')}}",
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


    //hide and show major and board field
    $('#level_of_education').on('change', function () {
        let val = $(this).val();
        if(val == 'psc' || val == 'jsc'){
            $("#major").addClass('d-none');
             $("#board").removeClass('d-none');
        }
        else if(val == 'ssc' || val == 'hsc'){
            $("#board").removeClass('d-none');
            $("#major").removeClass('d-none');
        }else{
            $("#major").removeClass('d-none');
            $("#board").addClass('d-none');
        }
    })

    //hide and show result field
    $('#result').on('change', function () {
        let val = $(this).val();
        if(val == 'first' || val == 'second' || val == 'third'){
            $('#marks').removeClass('d-none');
            $(".mark_text").text('Marks(%)');
            $("#scale").addClass('d-none');
        }else if( val == 'grade'){
            $("#scale").removeClass('d-none');
            $('#marks').removeClass('d-none');
            $(".mark_text").text('CGPA');
        }else{
            $("#scale").addClass('d-none');
            $('#marks').addClass('d-none');
        }
    })

    //get education degree based on education level
    $('#level_of_education').on('change', function () {
        var education_level = $(this).val();
        if (education_level) {
            $.ajax({
                url: '/resume/step_02/get-education-degree/',
                type: "GET",
                data: {
                    education_level : education_level
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#degree').empty();
                        $('#degree').append('<option value="">Choose...</option>');
                        $.each(data, function (key, degree) {
                            $('select[name="degree"]').append(
                                '<option value="' + degree
                                .name + '">' + degree
                                .name + '</option>');
                        });
                    } else {
                        $('#degree').empty();
                    }
                }
            });
        } else {
            $('#degree').empty();
        }
    });
    </script>
@endpush
