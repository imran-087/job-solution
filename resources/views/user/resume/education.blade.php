<!--begin::Form-->

<!--begin::Accordion-->
<div class="accordion" id="kt_accordion_1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_1">
            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                Academic Information
            </button>
        </h2>
        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                <!--begin::Products-->
                <div class="card card-flush mb-5">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Title-->
                            <h2>Academic Information</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form method="POST" id="kt_ecommerce_settings_general_store" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('user.resume.educational-info.store') }}">
                        @csrf
                        <!--hidden::Input -->
                        <input type="hidden" value="academic" name="academic">
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">School Name</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the name of the store" aria-label="Set the name of the store"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid @error('school_name') is-invalid @enderror" name="school_name" value="{{  $resume_info->school_name ?? old('school_name') }}" placeholder="Enter your school name">
                                <!--end::Input-->
                                @error('school_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <div class="fv-plugins-message-container invalid-feedback"></div> --}}
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Exam name</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid @error('s_exam_name') is-invalid @enderror" name="s_exam_name" value="{{  $resume_info->s_exam_name ?? old('s_exam_name') }}" placeholder="Enter your Exam Name">
                                <!--end::Input-->
                                @error('s_exam_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Select Group</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-9">
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid @error('s_group') is-invalid @enderror" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select Group"  name="s_group" value="{{  $resume_info->s_group ?? old('s_group') }}" placeholder="Enter your group">
                                        <option value="">Choose ...</option>
                                        <option value="science" @if($resume_info->s_group == 'science') selected @endif>Science</option>
                                        <option value="arts" @if($resume_info->s_group == 'arts') selected @endif>Arts</option>
                                        <option value="commerce" @if($resume_info->s_group == 'commerce') selected @endif>Commerce</option>
                                    </select>
                                    @error('s_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Passing Year</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store's full address." aria-label="Set the store's full address."></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid @error('s_pass_year') is-invalid @enderror" name="s_pass_year" value="{{  $resume_info->s_pass_year ?? old('s_pass_year') }}" placeholder="Enter your passing year">
                                <!--end::Input-->
                                @error('s_pass_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <div class="col-md-3 text-md-end">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>GPA</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the store geocode manually (optional)" aria-label="Enter the store geocode manually (optional)"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid @error('s_gpa') is-invalid @enderror" name="s_gpa" value="{{  $resume_info->s_gpa ?? old('s_gpa') }}" placeholder="Enter your Gpa">
                                <!--end::Input-->
                                @error('s_gpa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--end::Input group-->
                            
                        <!--begin::Action buttons-->
                        <div class="row">
                            <div class="col-md-9 offset-md-3">
                                <!--begin::Separator-->
                                <div class="separator mb-6"></div>
                                <!--end::Separator-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Save Changes</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                            </div>
                        </div>
                        <!--end::Action buttons--> 
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_2">
            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
            College Information
            </button>
        </h2>
        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                <!--begin::Products-->
                <div class="card card-flush mt-5">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Title-->
                            <h2>College Information</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Form-->
                        <form method="POST" id="kt_ecommerce_settings_general_store" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('user.resume.educational-info.store') }}">
                        @csrf 
                            <!--hidden::Input -->
                            <input type="hidden" value="college" name="college">                           
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">College Name</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the name of the store" aria-label="Set the name of the store"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('college_name') is-invalid @enderror" name="college_name" value="{{  $resume_info->college_name ?? old('college_name') }}" placeholder="Enter your college name">
                                    <!--end::Input-->
                                    @error('college_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Exam name</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('c_exam_name') is-invalid @enderror" name="c_exam_name" value="{{  $resume_info->c_exam_name ?? old('c_exam_name') }}" placeholder="Enter your exam name">
                                    <!--end::Input-->
                                    @error('c_exam_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Select Group</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Select2-->
                                        <select class="form-select form-select-solid @error('c_group') is-invalid @enderror" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select Group"  name="c_group"  placeholder="Enter your group" >
                                            <option value="">Choose ...</option>
                                            <option value="science" @if($resume_info->c_group == 'science') selected @endif>Science</option>
                                        <option value="arts" @if($resume_info->c_group == 'arts') selected @endif>Arts</option>
                                        <option value="commerce" @if($resume_info->c_group == 'commerce') selected @endif>Commerce</option>
                                        </select>
                                        @error('c_group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Passing Year</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store's full address." aria-label="Set the store's full address."></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid  @error('c_pass_year') is-invalid @enderror" name="c_pass_year" value="{{  $resume_info->c_pass_year ?? old('c_pass_year') }}" placeholder="Enter your passing year">
                                    <!--end::Input-->
                                    @error('c_pass_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>GPA</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the store geocode manually (optional)" aria-label="Enter the store geocode manually (optional)"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('c_gpa') is-invalid @enderror" name="c_gpa" value="{{  $resume_info->c_gpa ?? old('c_gpa') }}" placeholder="Enter your exam name">
                                    <!--end::Input-->
                                    @error('c_gpa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                        
                            <!--begin::Action buttons-->
                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <!--begin::Separator-->
                                    <div class="separator mb-6"></div>
                                    <!--end::Separator-->
                                    <div class="d-flex justify-content-end">
                                        
                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                           
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
                    
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_3">
            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false" aria-controls="kt_accordion_1_body_3">
            University Information
            </button>
        </h2>
        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                <!--begin::Products-->
                <div class="card card-flush mt-5">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Title-->
                            <h2>University Information</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Form-->
                        <form method="POST" id="kt_ecommerce_settings_general_store" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('user.resume.educational-info.store') }}">
                        @csrf
                            <!--hidden::Input -->
                            <input type="hidden" value="versity" name="versity">
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Institue Name</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the name of the store" aria-label="Set the name of the store"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('versity_name') is-invalid @enderror" name="versity_name" value="{{  $resume_info->versity_name ?? old('versity_name') }}" placeholder="Enter your university name">
                                    <!--end::Input-->
                                    @error('versity_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Degree</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('degree') is-invalid @enderror" name="degree" value="{{  $resume_info->degree ?? old('degree') }}" placeholder="Enter your Degree">
                                    <!--end::Input-->
                                    @error('degree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Subject Name</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store owner's name" aria-label="Set the store owner's name"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('subject') is-invalid @enderror" name="subject" value="{{  $resume_info->subject ?? old('subject') }}" placeholder="Enter your subject name">
                                    <!--end::Input-->
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Passing Year</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the store's full address." aria-label="Set the store's full address."></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('v_pass_year') is-invalid @enderror" name="v_pass_year" value="{{  $resume_info->v_pass_year ?? old('v_pass_year') }}" placeholder="Enter your passing year">
                                    <!--end::Input-->
                                    @error('v_pass_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>CGPA</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the store geocode manually (optional)" aria-label="Enter the store geocode manually (optional)"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid @error('v_cgpa') is-invalid @enderror" name="v_cgpa" value="{{  $resume_info->v_cgpa ?? old('v_cgpa') }}" placeholder="Enter your CGPA">
                                    <!--end::Input-->
                                    @error('v_cgpa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                        
                            <!--begin::Action buttons-->
                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <!--begin::Separator-->
                                    <div class="separator mb-6"></div>
                                    <!--end::Separator-->
                                    <div class="d-flex justify-content-end">
                                     
                                        <!--begin::Button-->
                                        <button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
        </div>
    </div>
</div>
<!--end::Accordion-->
    
