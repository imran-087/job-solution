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
                                Specialization
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body specialization">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 skill_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 skill_data_body">
                                        @foreach($user_skills as $key => $skill)
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2 edit_skill" data-id="{{ $skill->id }}"><i class="fas fa-edit"></i>Edit</span>
                                            <span class="btn btn-active-color-danger btn-sm btn-light delete_skill" data-id="{{ $skill->id }}" ><i class="fas fa-trash"></i>Delete</span>
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
                                                            <Span class="fw-bolder fs-4">Skill {{ $key+1 }}</Span>
                                                            <table class="table table-flush fw-bold gy-1">
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fw-bold fs-6">{{  $skill->skill ?? '' }}</td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Learning Method : <span class="fw-bolder fs-5">
                                                                            &nbsp;{{  $skill->learning_media['self'] ?? '' }} &nbsp;
                                                                            {{  $skill->learning_media['job'] ?? '' }} &nbsp;
                                                                            {{  $skill->learning_media['education'] ?? '' }} &nbsp;
                                                                            {{  $skill->learning_media['training'] ?? '' }} &nbsp;
                                                                        </span></td>
                                                                        
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
                                            <div class="separator separator-dashed mb-2"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                        @endforeach

                                        
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin:Form-->
                                    <form id="kk_specialization_skill_update_form" class="form d-none" enctype="multipart/form-data">
                                        @csrf

                                        <div class="messages"></div>
                                        <!--begin::Heading-->
                                        <div class="mb-9">
                                            <!--begin::Title-->
                                            <h1 class="mb-3 fs-4 text-muted">Skill</h1>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->

                                        {{-- hidden input  --}}
                                        <input type="hidden" name="skill_id">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row mb-5">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Skill</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Name of the skill"
                                                    name="skill_name" />
                                                <div class="help-block with-errors skill_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">How did you learn the skill?</span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="">
                                                    <input class="form-check-input me-1" name="self" type="checkbox" value="self"> Self &nbsp;&nbsp;
                                                    <input class="form-check-input me-1" name="job" type="checkbox" value="job">Job &nbsp;&nbsp;
                                                    <input class="form-check-input me-1" name="education" type="checkbox" value="education">Educational &nbsp;&nbsp;
                                                    <input class="form-check-input me-1" name="training" type="checkbox" value="training">Professional Training
                                                </div>
                                                <div class="help-block with-errors learning_method-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-start mb-9 mt-3">
                                            <button type="submit" id="kk_skill_submit" class="btn btn-primary me-3">
                                                <span class="indicator-label py-3 px-7">Save</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button type="reset" id="kk_skill_update_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                            
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                </div>
                                 
                                <div class="d-flex justify-content-start mb-8">
                                    <span class="btn btn-sm btn-primary " id="add_skill"><i class="fas fa-plus"></i>Add Skill</span>
                                </div>

                                <!--begin:Form-->
                                <form id="kk_specialization_skill_form" class="form d-none px-5" enctype="multipart/form-data">
                                    @csrf

                                    <div class="d-flex justify-content-end">
                                        <span class="btn btn-active-color-danger btn-sm btn-light " id="cancel_edit_skill"><i class="fas fa-times"></i>Cancel</span>
                                    </div>

                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-9">
                                        <!--begin::Title-->
                                        <h1 class="mb-3 fs-4 text-muted">Skill</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Skill</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Name of the skill"
                                                name="skill_name" />
                                            <div class="help-block with-errors skill_name-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">How did you learn the skill?</span>
                                            </label>
                                            <!--end::Label-->
                                            <div class="">
                                                <input class="form-check-input me-1" name="self" type="checkbox" value="self"> Self &nbsp;&nbsp;
                                                <input class="form-check-input me-1" name="job" type="checkbox" value="job">Job &nbsp;&nbsp;
                                                <input class="form-check-input me-1" name="education" type="checkbox" value="education">Educational &nbsp;&nbsp;
                                                <input class="form-check-input me-1" name="training" type="checkbox" value="training">Professional Training
                                            </div>
                                            <div class="help-block with-errors learning_method-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-start mb-9 mt-3">
                                        <button type="submit" id="kk_skill_submit" class="btn btn-primary me-3">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="reset" id="kk_skill_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        
                                    </div>
                                    <!--end::Actions-->
                                </form>

                                <div class="separator separator-dashed mb-13"></div>

                                <!--- start::description --->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10 description_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                      
                                        <div class="d-flex justify-content-between">
                                             <span class="fw-bolder fs-4">Skill Description</span>
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2" id="edit_description">
                                                @if($user_detail)
                                                    @if($user_detail->skill_description != null)  <i class="fas fa-edit"></i> Edit 
                                                    @else <i class="fas fa-plus"></i> Add @endif
                                                @else <i class="fas fa-plus"></i> Add @endif 
                                            </span>
                                               
                                            {{-- <span class="btn btn-active-color-danger btn-sm btn-light delete_description" data-id="{{ $user_detail->id }}" ><i class="fas fa-trash"></i>Delete</span> --}}
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
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-gray-800">{{  $user_detail->skill_description ?? '' }}</td>
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

                                <form id="kk_specialization_description_form" class="form mb-8 d-none" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Skill Description</span>
                                            </label>
                                            <!--end::Label-->
                                            <textarea  class="form-control form-control-solid h-100px"  name="description" placeholder="Skill description ......."> {{ $user_detail->skill_description ?? '' }}</textarea>
                                              
                                            <div class="help-block with-errors description-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" id="kk_description_submit" class="btn btn-sm btn-primary me-3">
                                            <span class="indicator-label">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="reset" id="kk_description_cancel" class="btn btn-sm btn-light btn-active-color-danger me-3">Close</button>
                                        
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--- end::description --->

                                <!--- start::extracaricular --->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10 extracurricular_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                      
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-bolder fs-4">Extracurricular Activites</span>
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2" id="edit_extracurricular">
                                                 @if($user_detail)
                                                    @if($user_detail->extracurricular != null)  <i class="fas fa-edit"></i> Edit 
                                                    @else <i class="fas fa-plus"></i> Add @endif
                                                @else <i class="fas fa-plus"></i> Add @endif 
                                               
                                            {{-- <span class="btn btn-active-color-danger btn-sm btn-light delete_extracurricular" data-id="{{ $user_detail->id }}" ><i class="fas fa-trash"></i>Delete</span> --}}

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
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                       
                                                                        <td class="text-gray-800">{{  $user_detail->extracurricular ?? '' }}</td>
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
                            
                                <form id="kk_specialization_extracaricular_form" class="form d-none"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Extracurricular Activities</span>
                                            </label>
                                            <!--end::Label-->
                                            <textarea  class="form-control form-control-solid h-100px"  name="extracurricular" placeholder="Extracurricular Activities">{{ $user_detail->extracurricular ?? '' }}</textarea>
                                              
                                            <div class="help-block with-errors extracurricular-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-start mb-5">
                                        <button type="submit" id="kk_extracurricular_submit" class="btn btn-primary me-3 btn-sm">
                                            <span class="indicator-label ">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="reset" id="kk_extracurricular_cancel" class="btn btn-light btn-sm btn-active-color-danger me-3">Close</button>
                                        
                                    </div>
                                    <!--end::Actions-->
                                    
                                </form>
                                <!--- end::extracaricular --->
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5" aria-expanded="false" aria-controls="kt_accordion_1_body_5">
                                Language Proficency
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_5" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body language">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 language_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 language_data_body" >
                                        @foreach($languages as $language)
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2 edit_language" data-id="{{ $language->id }}" ><i class="fas fa-edit"></i>Edit</span>
                                            <span class="btn btn-active-color-danger btn-sm btn-light delete_language" data-id="{{ $language->id }}" ><i class="fas fa-trash"></i>Delete</span>
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
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Language</td>
                                                                        <td class="text-gray-800">{{  $language->language ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Reading</td>
                                                                        <td class="text-gray-800">{{ $language->reading ?? ''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Writting</td>
                                                                        <td class="text-gray-800">{{ $language->writting ?? ''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Speaking</td>
                                                                        <td class="text-gray-800">{{ $language->speaking ?? '' }}</td>
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
                                            <div class="separator separator-dashed mb-2"></div>
                                            
                                        </div>
                                        <!--end::Options-->
                                        @endforeach
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin:Form-->
                                    
                                </div>

                                <div class="d-flex justify-content-start">
                                    <span class="btn btn-primary btn-sm " id="add_language"><i class="fas fa-plus"></i>Add language</span>
                                </div>

                                <!--begin:Form-->
                                <form id="kk_language_proficency_form" class="form d-none px-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <span class="btn btn-active-color-danger btn-sm btn-light " id="cancel_edit_language"><i class="fas fa-times"></i>Cancel</span>
                                    </div>
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-4 mb-5">Language</div>
                                    </div>
                                    <!--end::Heading-->

                                    {{-- hidden  --}}
                                    <input type="hidden" name="language_id">

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Language</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter language"
                                                    name="language" />
                                                <div class="help-block with-errors language-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Reading</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="reading">
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                                
                                            </select>
                                            <div class="help-block with-errors reading-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                           
                                            <label class="required fs-6 fw-bold mb-2">Writting</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="writting">
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                                
                                            </select>
                                            <div class="help-block with-errors writting-error"></div>    
                                            
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Speaking</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="speaking">
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                                
                                            </select>
                                            <div class="help-block with-errors speaking-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                  
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_language_proficency_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_language_proficency_submit" class="btn btn-primary">
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
                                References
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body references">

                                <div class="card card-flush pt-3 mb-5 mb-lg-10 references_data" data-kt-subscriptions-form="pricing">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        @foreach($references as $reference)
                                        <div class="d-flex justify-content-end">
                                            <span class="btn btn-active-color-primary btn-sm btn-light me-2 edit_references" data-id="{{ $reference->id }}"><i class="fas fa-edit"></i>Edit</span>
                                            <span class="btn btn-active-color-danger btn-sm btn-light delete_reference" data-id="{{ $reference->id }}" ><i class="fas fa-trash"></i>Delete</span>
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
                                                                        <td class="text-muted min-w-125px w-130px">Name</td>
                                                                        <td class="text-gray-800">{{ $reference->name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Designation</td>
                                                                        <td class="text-gray-800">{{ $reference->designation ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Organization</td>
                                                                        <td class="text-gray-800">{{ $reference->organization ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Address</td>
                                                                        <td class="text-gray-800">{{ $reference->address ?? '' }}</td>
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
                                                                        <td class="text-muted min-w-125px w-130px">Phone (Res)</td>
                                                                        <td class="text-gray-800">{{ $reference->phone_res ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Phone (off)</td>
                                                                        <td class="text-gray-800">{{ $reference->phone_off ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Email</td>
                                                                        <td class="text-gray-800">{{ $reference->email ?? '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-130px">Relation</td>
                                                                        <td class="text-gray-800">{{ $reference->relation ?? '' }} </td>
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
                                    <span class="btn btn-sm btn-primary " id="add_reference"><i class="fas fa-plus"></i>Add New</span>
                                </div>

                                <!--begin:Form-->
                                <form id="kk_references_form" class="form d-none px-5" enctype="multipart/form-data">
                                    @csrf

                                    <div class="d-flex justify-content-end">
                                        <span class="btn btn-active-color-danger btn-sm btn-light " id="cancel_edit_references"><i class="fas fa-times"></i>Cancel</span>
                                    </div>

                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-4 mb-5">Reference</div>
                                    </div>
                                    <!--end::Heading-->
                                    {{-- hidden  --}}
                                    <input type="hidden" name="reference_id">
                                   
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Name </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter name"
                                                    name="name" />
                                                    
                                                <div class="help-block with-errors name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                         <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Designation</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter designation"
                                                    name="designation" />
                                                   
                                                <div class="help-block with-errors designation-error"></div>
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
                                                    <span class="">Organization </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter organization"
                                                    name="organization" />
                                                    
                                                <div class="help-block with-errors organization-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Email</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter email"
                                                    name="email" />
                                                   
                                                <div class="help-block with-errors email-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                       
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                         <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-6 fw-bold mb-2">Relation</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="relation">
                                                <option value="relative">Relative</option>
                                                <option value="friend" >Family Friend</option>
                                                <option value="academic" >Academic</option>
                                                <option value="professional" >Professional</option>
                                                
                                            </select>
                                            <div class="help-block with-errors relation-error"></div>    
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Mobile</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter mobile no."
                                                    name="mobile" />
                                                   
                                                <div class="help-block with-errors mobile-error"></div>
                                            </div>
                                          
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Phone (Res.)</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter mobile no."
                                                    name="phone_res" />
                                                   
                                                <div class="help-block with-errors phone_res-error"></div>
                                            </div>
                                          
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Phone (office)</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter mobile no."
                                                    name="phone_off" />
                                                   
                                                <div class="help-block with-errors phone_off-error"></div>
                                            </div>
                                          
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-9">
                                        <!--begin::Label-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="">Address</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter location/address"
                                                name="address" />
                                                
                                            <div class="help-block with-errors address-error"></div>
                                        </div>
                                        
                                    </div>
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_references_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_references_submit" class="btn btn-primary">
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

    //savespecialization skill
    $('#kk_specialization_skill_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        
        var formData = new FormData(this);
     
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/specialization-skill/store')}}",
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

    //save description information
    $('#kk_specialization_description_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
       
        var formData = new FormData(this);
      
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/description/store')}}",
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


    //save extracaricular information
    $('#kk_specialization_extracaricular_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
       
        var formData = new FormData(this);
     
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/extracaricular/store')}}",
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


    //save language proficency information
    $('#kk_language_proficency_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
      
        var formData = new FormData(this);
       
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/language-proficency/store')}}",
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


    //save kk_references_form
    $('#kk_references_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
     
        var formData = new FormData(this);
      
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/references/store')}}",
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

    /*########### Edit ##############*/
    //edit skill
    $('.edit_skill').on('click', function(){
        var id = $(this).data('id');
        var thisbtn = $(this);
        $.ajax({
            url:"{{ route('resume.get_skill') }}",
            type:"GET",
            data:{
                'skill_id': id
            },
            success:function (data) {
                $('input[name="skill_id"]').val(data.id);
                $('input[name="skill_name"]').val(data.skill);
                if($('input[name="self"]').val() == data.learning_media['self']){
                    $('input[name="self"]').prop( "checked", true );
                }
                if($('input[name="job"]').val() == data.learning_media['job']){
                    $('input[name="job"]').prop( "checked", true );
                }
                if($('input[name="education"]').val() == data.learning_media['education']){
                    $('input[name="education"]').prop( "checked", true );
                }
                if($('input[name="training"]').val() == data.learning_media['training']){
                    $('input[name="training"]').prop( "checked", true );
                }
                thisbtn.parents(".specialization").find('div.skill_data_body').addClass('d-none');
                $('#kk_specialization_skill_update_form').removeClass('d-none');
            }
        })
        // end of ajax call
          
    })

    $('#kk_skill_update_cancel').on('click', function(){
        $('#kk_specialization_skill_update_form').addClass('d-none');
        $('.skill_data_body').removeClass('d-none');
    })

    //updatespecialization skill
    $('#kk_specialization_skill_update_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        
        var formData = new FormData(this);
     
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_04/specialization-skill/update')}}",
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


    /*########### Edit ##############*/
    //language profiency
    $('.edit_language').on('click', function(){
        var id = $(this).data('id');
        var thisbtn = $(this);
        $.ajax({
            url:"{{ route('resume.get_language') }}",
            type:"GET",
            data:{
                'id': id
            },
            success:function (data) {
                
                $('input[name="language_id"]').val(data.id);
                $('input[name="language"]').val(data.language);
                $('select[name="reading"]').val(data.reading).change();
                $('select[name="writting"]').val(data.writting).change();
                $('select[name="speaking"]').val(data.speaking).change();
                thisbtn.parents(".language").find('div.language_data').addClass('d-none');
                $("#add_language").hide();
                $('#kk_language_proficency_form').removeClass('d-none');
            }
        })
        // end of ajax call
          
    })

    /*########### Edit ##############*/
    //Reference
    $('.edit_references').on('click', function(){
        var id = $(this).data('id');
        var thisbtn = $(this);
        $.ajax({
            url:"{{ route('resume.get_references') }}",
            type:"GET",
            data:{
                'id': id
            },
            success:function (data) {
                
                $('input[name="reference_id"]').val(data.id);
                $('input[name="name"]').val(data.name);
                $('input[name="designation"]').val(data.designation);
                $('input[name="organization"]').val(data.organization);
                $('input[name="email"]').val(data.email);
                $('input[name="mobile"]').val(data.mobile);
                $('input[name="phone_off"]').val(data.phone_off);
                $('input[name="phone_res"]').val(data.phone_res);
                $('input[name="relation"]').val(data.relation);
                $('input[name="address"]').val(data.address);
                thisbtn.parents(".references").find('div.references_data').addClass('d-none');
                $("#add_reference").hide();
                $('#kk_references_form').removeClass('d-none');
            }
        })
        // end of ajax call
          
    })


    /*########### From Hide show ##############*/
    $(document).ready(function(){

        //start:: Skill  Section
        //add button
        $("#add_skill").on('click', function(){
            $(this).hide();
            // $(this).parents(".specialization").find('div.skill_data').addClass('d-none');
            $(this).parents(".specialization").find('form#kk_specialization_skill_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_skill").on('click', function(){
            $(this).parents(".specialization").find('form#kk_specialization_skill_form').addClass('d-none');
            $(this).parents(".specialization").find('div.skill_data').removeClass('d-none');
            $('#add_skill').show();
        })
        $("#kk_skill_cancel").on('click', function(){
            $(this).parents(".specialization").find('form#kk_specialization_skill_form').addClass('d-none');
            $(this).parents(".specialization").find('div.skill_data').removeClass('d-none');
            $('#add_skill').show();
        })
        // Skill  Section :: end

        // description Activities Section :: start 
        //edit button
        $("#edit_description").on('click', function(){
            $(this).parents(".specialization").find('div.description_data').addClass('d-none');
            $(this).parents(".specialization").find('form#kk_specialization_description_form').removeClass('d-none');
        })
      
        //cancel button
        $("#kk_description_cancel").on('click', function(){
            $(this).parents(".specialization").find('form#kk_specialization_description_form').addClass('d-none');
            $(this).parents(".specialization").find('div.description_data').removeClass('d-none');
        })
        // description Activities Section :: end

        // Extracurricular Activities Section :: start 
        //edit button
        $("#edit_extracurricular").on('click', function(){
            $(this).parents(".specialization").find('div.extracurricular_data').addClass('d-none');
            $(this).parents(".specialization").find('form#kk_specialization_extracaricular_form').removeClass('d-none');
        })
       
        //cancel button
        $("#kk_extracurricular_cancel").on('click', function(){
            $(this).parents(".specialization").find('form#kk_specialization_extracaricular_form').addClass('d-none');
            $(this).parents(".specialization").find('div.extracurricular_data').removeClass('d-none');
        })
        // Extracurricular Activities Section :: end

        //start:: language information  form show hide
        //add button
        $("#add_language").on('click', function(){
            $(this).hide();
            $('input[name="language_id"]').val('');
            // $(this).parents(".language").find('div.language_data').addClass('d-none');
            $(this).parents(".language").find('form#kk_language_proficency_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_language").on('click', function(){

            $(this).parents(".language").find('form#kk_language_proficency_form').addClass('d-none');
            $(this).parents(".language").find('div.language_data').removeClass('d-none');
            $('#add_language').show();
        })
        $("#kk_language_proficency_cancel").on('click', function(){
            $(this).parents(".language").find('form#kk_language_proficency_form').addClass('d-none');
            $(this).parents(".language").find('div.language_data').removeClass('d-none');
            $('#add_language').show();
        })
        // language information  Section :: end

        //start:: References  form show hide
        //add button
        $("#add_reference").on('click', function(){
            $(this).hide();
            $('input[name="reference_id"]').val();
            // $(this).parents(".references").find('div.references_data').addClass('d-none');
            $(this).parents(".references").find('form#kk_references_form').removeClass('d-none');
        })
        //cancel button
        $("#cancel_edit_references").on('click', function(){

            $(this).parents(".references").find('form#kk_references_form').addClass('d-none');
            $(this).parents(".references").find('div.references_data').removeClass('d-none');
            $('#add_reference').show();
        })
        $("#kk_references_cancel").on('click', function(){
            $(this).parents(".references").find('form#kk_references_form').addClass('d-none');
            $(this).parents(".references").find('div.references_data').removeClass('d-none');
            $('#add_reference').show();
        })
        // References  Section :: end
    })

    //Delete Skill
    $('.delete_skill').on('click', function(){
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
                    url: "{{ url('resume/step_4/delete-skill') }}"+'/'+id,
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

    //Delete Description
    $('.delete_description').on('click', function(){
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
                    url: "{{ url('resume/step_4/delete-description') }}"+'/'+id,
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

    //Extracurricular delete
    $('.delete_extracurricular').on('click', function(){
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
                    url: "{{ url('resume/step_4/delete-extracurricular') }}"+'/'+id,
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

    //delete_reference 
    $('.delete_reference').on('click', function(){
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
                    url: "{{ url('resume/step_4/delete-reference') }}"+'/'+id,
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

    //delete language
    $('.delete_language').on('click', function(){
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
                    url: "{{ url('resume/step_4/delete-language') }}"+'/'+id,
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

    </script>
@endpush

