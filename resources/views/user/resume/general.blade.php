<!--begin::Products-->
<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Title-->
            <h2>General Information</h2>
            <!--end::Title-->
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Form-->
        <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('user.resume.general-info.store') }}" method="POST">
            @csrf
            <!--begin::Input group-->
            <div class="row fv-row mb-7 fv-plugins-icon-container">
                <div class="col-md-3 text-md-end">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">Full Name</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the title of the store for SEO." aria-label="Set the title of the store for SEO."></i>
                    </label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
                    <!--begin::Input-->
                    <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror"  value="{{ $resume_info->name ?? old('name') }}" placeholder="Enter your full name">
                    <!--end::Input-->
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <div class="fv-plugins-message-container invalid-feedback"></div> --}}
                </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <div class="col-md-3 text-md-end">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">Email</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the description of the store for SEO." aria-label="Set the description of the store for SEO."></i>
                    </label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
                    <!--begin::Input-->
                    <input type="text" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror"  value="{{ $resume_info->email ?? old('email') }}" placeholder="Enter your email">
                    <!--end::Input-->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <div class="col-md-3 text-md-end">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">Contact</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set keywords for the store separated by a comma." aria-label="Set keywords for the store separated by a comma."></i>
                    </label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid @error('contact') is-invalid @enderror" name="contact" value="{{  $resume_info->contact ?? old('contact') }}" placeholder="Enter your phone no.">
                    <!--end::Input-->
                    @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <div class="col-md-3 text-md-end">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">Address</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set theme style for the store." aria-label="Set theme style for the store."></i>
                    </label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
                    <div class="w-100">
                        <!--begin::input-->
                        <input type="text" class="form-control form-control-solid @error('address') is-invalid @enderror" name="address" value="{{ $resume_info->address ?? old('address') }}" placeholder="Enter your address">
                        <!--end::input-->
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
                        {{-- <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancel</button> --}}
                        <!--end::Button-->
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
        <div></div></form>
        <!--end::Form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Products-->