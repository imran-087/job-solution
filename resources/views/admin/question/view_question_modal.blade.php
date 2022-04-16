
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-850px">
    <!--begin::Modal content-->
    <div class="modal-content rounded">
        <!--begin::Modal header-->
        <div class="modal-header pb-0 border-0 justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                            transform="rotate(-45 6 17.3137)" fill="black" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form id="kk_modal_new_passage_form" class="form" enctype="multipart/form-data">
                <div class="messages"></div>
                {{-- csrf token  --}}
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edited Question</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Please Check, "then accept or deny"
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Question</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                        name="title" value="{{ $editedQuestion->question }}"/>
                    <div class="help-block with-errors title-error"></div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <div class="row">
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 1</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->option_1 }}"/>
                            <div class="help-block with-errors title-error"></div>
                        </div>
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 2</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->option_2 }}" />
                            <div class="help-block with-errors title-error"></div>
                        </div>
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <div class="row">
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 3</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->option_3 }}"/>
                            <div class="help-block with-errors title-error"></div>
                        </div>
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 4</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->option_4 }}" />
                            <div class="help-block with-errors title-error"></div>
                        </div>
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <div class="row">
                        @if( $editedQuestion->option_5 )
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 5</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->option_5 }}"/>
                            <div class="help-block with-errors title-error"></div>
                        </div>
                        @endif
                        <div class="col-md-2" style="color: green; font-weight:bold">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Answer</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="title" value="{{ $editedQuestion->answer }}" />
                            <div class="help-block with-errors title-error"></div>
                        </div>
                    </div>
                </div>
                <!--end::Input group-->
                
                <!--begin::Actions-->
                <div class="text-center">
                    <a href="javascript:;" onclick="reject({{ $editedQuestion->id }})" class="btn btn-danger">
                        <span class="indicator-label">Reject</span>
                    </a>
                    <a href="javascript:;" onclick="accept({{ $editedQuestion->id }})" class="btn btn-primary">
                        <span class="indicator-label">Accept</span>
                    </a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end:Form-->
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
<!--end::Modal dialog-->
