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
            <form id="kk_modal_question_update_form" class="form" enctype="multipart/form-data">
                <div class="messages"></div>
                {{-- csrf token  --}}
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Question</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Please correct the error and update</div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <input type="hidden" name="question_id" value="{{ $question->id }}">
               
                <!--begin::Input group-->
                <div class="d-flex flex-column fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Question</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                        name="question" value="{{ $question->question }}"/>
                    <div class="help-block with-errors question-error"></div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column fv-row">
                    <div class="row">
                        @if( $question->question_option->option_1 != '' )
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 1</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="option_1" value="{{ $question->question_option->option_1 }}"/>
                            <div class="help-block with-errors option_1-error"></div>
                        </div>
                        @endif
                        @if( $question->question_option->option_2 != '')
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 2</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="option_2" value="{{ $question->question_option->option_2 }}" />
                            <div class="help-block with-errors option_2-error"></div>
                        </div>
                        @endif
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column fv-row">
                    <div class="row">
                        @if( $question->question_option->option_3 != '')
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 3</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="option_3" value="{{ $question->question_option->option_3 }}"/>
                            <div class="help-block with-errors option_3-error"></div>
                        </div>
                        @endif
                        @if( $question->question_option->option_4 != '')
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 4</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="option_4" value="{{ $question->question_option->option_4 }}" />
                            <div class="help-block with-errors option_4-error"></div>
                        </div>
                        @endif
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column fv-row mb-8">
                    <div class="row">
                        @if( $question->question_option->option_5 != '')
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option 5</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                                name="option_5" value="{{ $question->question_option->option_5 }}"/>
                            <div class="help-block with-errors option_5-error"></div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Answer</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                name="answer">
                                <option value="1" {{ $question->question_option->answer == 1 ? 'selected' : ''}}>1</option>
                                <option value="2" {{ $question->question_option->answer == 2 ? 'selected' : ''}}>2</option>
                                <option value="3" {{ $question->question_option->answer == 3 ? 'selected' : ''}}>3</option>
                                @isset($question->question_option->option_4)
                                <option value="4" {{ $question->question_option->answer == 4 ? 'selected' : ''}}>4</option>
                                @endisset
                                @isset($question->question_option->option_5)
                                <option value="5" {{ $question->question_option->answer == 1 ? 'selected' : ''}}>5</option>
                                @endisset
                            </select>
                            <div class="help-block with-errors answer-error"></div>
                        </div>
                        
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Close</button>
                    <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
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